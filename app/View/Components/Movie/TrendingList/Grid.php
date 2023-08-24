<?php
declare(strict_types=1);

namespace App\View\Components\Movie\TrendingList;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;
use Illuminate\View\View;
use Illuminate\Support\Facades\View as ViewFacade;
use App\Models\Movie\TrendingList\Item as MovieTrendingListItem;
use Tmdb\Helper\ImageHelper as TmdbImageHelper;

class Grid extends Component
{
    private const PAGE_SIZE = 5;

    public function __construct(
        private TmdbImageHelper $tmdbImageHelper
    ) {}

    /**
     * Render the grid for trending movies list
     */
    public function render(): View
    {
        return ViewFacade::make('components.movie.trending-list.grid');
    }

    /**
     * Retrieve the paginated list of trending movies
     *
     * @return LengthAwarePaginator
     */
    public function getMovieTrendingListPaginated(): LengthAwarePaginator
    {
        //TODO: join trending list + filtration
        return MovieTrendingListItem::whereIsTrendingDaily(true)
            ->paginate(self::PAGE_SIZE);
    }

    /**
     * For the given movie trending list item, fetch the URL of the image for the grid preview
     *
     * @param MovieTrendingListItem $movieTrendingListItem
     * @return string
     */
    public function getImageUrl(MovieTrendingListItem $movieTrendingListItem): string
    {
        return $this->tmdbImageHelper->getUrl($movieTrendingListItem->movie->getPosterPath(), 'w185');
    }
}
