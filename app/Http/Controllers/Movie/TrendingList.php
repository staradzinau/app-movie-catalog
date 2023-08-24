<?php
declare(strict_types=1);

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View as ViewFacade;
use Illuminate\Contracts\View\View;

class TrendingList extends Controller
{
    /**
     * Renders the trending list view page
     *
     * @return View
     */
    public function view(): View
    {
        return ViewFacade::make('movie.trending-list.view');
    }
}
