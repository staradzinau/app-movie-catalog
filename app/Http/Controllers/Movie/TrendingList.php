<?php
declare(strict_types=1);

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View as ViewFacade;
use Illuminate\Contracts\View\View;
use App\ThirdParty\Tmdb\Trending\Movie\TimeWindow as TmdbTrendingMovieTimeWindowEnum;

class TrendingList extends Controller
{
    /**
     * Renders the trending list view page
     *
     * @param TmdbTrendingMovieTimeWindowEnum $timeWindow
     * @return View
     */
    public function view(TmdbTrendingMovieTimeWindowEnum $timeWindow = TmdbTrendingMovieTimeWindowEnum::DAY): View
    {
        return ViewFacade::make(
            'movie.trending-list.view',
            [
                'currentTimeWindow' => $timeWindow,
            ]
        );
    }
}
