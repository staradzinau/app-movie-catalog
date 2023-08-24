<?php
declare(strict_types=1);

namespace App\View\Components\Movie\TrendingList\Grid;

use App\ThirdParty\Tmdb\Trending\Movie\TimeWindow as TmdbTrendingMovieTimeWindowEnum;
use Illuminate\Support\Facades\View as ViewFacade;
use Illuminate\View\Component;
use Illuminate\View\View;
use Illuminate\Support\Facades\URL;

class TimeWindow extends Component
{
    public function __construct(
        private TmdbTrendingMovieTimeWindowEnum $currentTimeWindow
    ) {}

    /**
     * Render the time window selector component for trending movies list
     */
    public function render(): View
    {
        return ViewFacade::make('components.movie.trending-list.grid.time-window');
    }

    /**
     *
     * Retrieve value of the time window applied
     *
     * @return TmdbTrendingMovieTimeWindowEnum
     */
    public function getCurrentTimeWindow(): TmdbTrendingMovieTimeWindowEnum
    {
        return $this->currentTimeWindow;
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

    /**
     * Check, if the given option is equal to the already applied one
     *
     * @param TmdbTrendingMovieTimeWindowEnum $timeWindowOption
     * @return bool
     */
    public function isOptionAlreadyApplied(TmdbTrendingMovieTimeWindowEnum $timeWindowOption): bool
    {
        return $this->getCurrentTimeWindow() === $timeWindowOption;
    }

    /**
     * Retrieve the type of the button for the given option
     *
     * @param TmdbTrendingMovieTimeWindowEnum $timeWindowOption
     * @return string
     */
    public function getButtonType(TmdbTrendingMovieTimeWindowEnum $timeWindowOption): string
    {
          return $this->isOptionAlreadyApplied($timeWindowOption)
            ? 'primary'
            : 'secondary';
    }

    /**
     * Retrieve URL to apply the given time window option
     *
     * @param TmdbTrendingMovieTimeWindowEnum $timeWindowOption
     * @return string
     */
    public function getUrlToApplyOption(TmdbTrendingMovieTimeWindowEnum $timeWindowOption): string
    {
        return URL::route(
            'movie.trending-list.view',
            [
                'timeWindow' => $timeWindowOption
            ]
        );
    }
}
