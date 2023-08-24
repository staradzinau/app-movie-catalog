<?php
declare(strict_types=1);

namespace App\View\Components\Movie\TrendingList\Grid;

use App\ThirdParty\Tmdb\Trending\Movie\TimeWindow as TmdbTrendingMovieTimeWindowEnum;
use Illuminate\Support\Facades\View as ViewFacade;
use Illuminate\View\Component;
use Illuminate\View\View;

class TimeWindow extends Component
{
    /**
     * Render the time window selector component for trending movies list
     */
    public function render(): View
    {
        return ViewFacade::make('components.movie.trending-list.grid.time-window');
    }

    /**
     * Retrieve the list of possible values for time window options
     *
     * @return array
     */
    public function getTimeWindowOptionList(): array
    {
        return TmdbTrendingMovieTimeWindowEnum::cases();
    }
}
