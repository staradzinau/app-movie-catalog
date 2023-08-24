<?php
declare(strict_types=1);

namespace App\Services\Movie;

use App\Models\Movie\TrendingList\Item as MovieTrendingListItem;
use App\ThirdParty\Tmdb\Trending\Movie\TimeWindow as TmdbTrendingMovieTimeWindowEnum;
use App\ThirdParty\Tmdb\Trending\Movie\Repository as TmdbTrendingMovieRepository;
use App\ThirdParty\Tmdb\Trending\Movie\Model as TmdbTrendingMovieModel;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

class TrendingList
{
    /**
     * Mapping between value of time window parameter
     * and corresponding flag column in the database
     */
    private const TIME_WINDOW_FLAG_MAP = [
        TmdbTrendingMovieTimeWindowEnum::DAY->value => MovieTrendingListItem::IS_TRENDING_DAILY,
        TmdbTrendingMovieTimeWindowEnum::WEEK->value => MovieTrendingListItem::IS_TRENDING_WEEKLY,
    ];

    public function __construct(
        private TmdbTrendingMovieRepository $tmdbTrendingMovieRepository
    ) {
    }

    /**
     * For the given time window value,
     * reset corresponding trending flag to false
     * for all stored movies
     *
     * @param TmdbTrendingMovieTimeWindowEnum $timeWindow
     * @return int
     */
    public function resetFlag(TmdbTrendingMovieTimeWindowEnum $timeWindow): int
    {
        $flagNameToReset = self::TIME_WINDOW_FLAG_MAP[$timeWindow->value];

        return MovieTrendingListItem::where($flagNameToReset, true)
            ->update([$flagNameToReset => false]);
    }

    /**
     * For the given time window value,
     * update the list of trending movies (upsert format) with the data from API
     * Returns the amount of updated list items
     *
     * @param TmdbTrendingMovieTimeWindowEnum $timeWindow
     * @return int
     */
    public function updateList(TmdbTrendingMovieTimeWindowEnum $timeWindow): int
    {
        $updatedItemsCount = 0;
        $tmdbTrendingMovieList = $this->tmdbTrendingMovieRepository->loadList($timeWindow);

        $flagNameToSet = self::TIME_WINDOW_FLAG_MAP[$timeWindow->value];
        /** @var TmdbTrendingMovieModel $tmdbTrendingMovie */
        foreach ($tmdbTrendingMovieList as $tmdbTrendingMovie) {
            $movieId = $tmdbTrendingMovie->getId();
            MovieTrendingListItem::updateOrCreate(
                [MovieTrendingListItem::MOVIE_ID => $movieId],
                [$flagNameToSet => true]
            );
            $updatedItemsCount++;
        }

        return $updatedItemsCount;
    }

    /**
     * Retrieve the movie trending list collection for the given time window
     *
     * @param TmdbTrendingMovieTimeWindowEnum $timeWindow
     * @return EloquentBuilder
     */
    public function getList(TmdbTrendingMovieTimeWindowEnum $timeWindow): EloquentBuilder
    {
        $flagName = self::TIME_WINDOW_FLAG_MAP[$timeWindow->value];
        return MovieTrendingListItem::where($flagName, '=' ,true);
    }
}
