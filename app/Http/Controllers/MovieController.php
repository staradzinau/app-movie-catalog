<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\View as ViewFacade;

class MovieController extends Controller
{
    /**
     * Renders the view page for the given movie
     *
     * @param Movie $movie
     * @return View
     */
    public function view(Movie $movie): View
    {
        return ViewFacade::make(
            'movie.view',
            [
                'movie' => $movie,
            ]
        );
    }
}
