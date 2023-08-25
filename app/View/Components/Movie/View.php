<?php
declare(strict_types=1);

namespace App\View\Components\Movie;

use Illuminate\Support\Facades\View as ViewFacade;
use Illuminate\View\Component;
use Illuminate\View\View as ViewComponent;
use App\Models\Movie;
use Illuminate\Support\Facades\URL;
use Tmdb\Helper\ImageHelper as TmdbImageHelper;

class View extends Component
{
    public function __construct(
        private Movie $movie,
        private TmdbImageHelper $tmdbImageHelper,
    ) {}

    /**
     * Render the component to represent movie details
     */
    public function render(): ViewComponent
    {
        return ViewFacade::make('components.movie.view');
    }

    /**
     * Returns the current movie to render movie details for
     *
     * @return Movie
     */
    public function getMovie(): Movie
    {
        return $this->movie;
    }

    /**
     * Retrieve the URL of the page to return
     *
     * @return string
     */
    public function getBackUrl(): string
    {
        return URL::previous();
    }

    /**
     * For the current movie , fetch the URL of the image for the view page
     *
     * @return string
     */
    public function getImageUrl(): string
    {
        return $this->tmdbImageHelper->getUrl($this->getMovie()->getPosterPath(), 'w185');
    }
}
