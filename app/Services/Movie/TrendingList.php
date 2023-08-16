<?php
declare(strict_types=1);

namespace App\Services\Movie;

use App\Models\Movie\TrendingList\Item as MovieTrendingListItem;
use App\ThirdParty\Tmdb\Trending\Movie\TimeWindow as TmdbTrendingMovieTimeWindowEnum;

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

    /**
     * For the given time window value,
     * reset corresponding trending flag to false
     * for all stored movies
     *
     * @param TmdbTrendingMovieTimeWindowEnum $timeWindow
     * @return int
     */
    public function resetFlag(TmdbTrendingMovieTimeWindowEnum $timeWindow)
    {
        $flagNameToReset = self::TIME_WINDOW_FLAG_MAP[$timeWindow->value];

        return MovieTrendingListItem::where($flagNameToReset, true)
            ->update([$flagNameToReset => false]);
    }

    //TODO: add method to fetch data from API
}
