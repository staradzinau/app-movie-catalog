<?php
declare(strict_types=1);

namespace App\View\Components\Movie\TrendingList;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;
use Illuminate\View\View;
use Illuminate\Support\Facades\View as ViewFacade;
use App\Models\Movie;

class Grid extends Component
{
    private const PAGE_SIZE = 5;

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
        return Movie::paginate(self::PAGE_SIZE);
    }
}
