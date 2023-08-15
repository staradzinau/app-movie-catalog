<?php
declare(strict_types=1);

namespace App\ThirdParty\Tmdb\Trending\Movie;

use Tmdb\Api\AbstractApi as TmdbAbstractApi;
use App\ThirdParty\Tmdb\Trending\Movie\TimeWindow as TmdbTrendingMovieTimeWindowEnum;

class Api extends TmdbAbstractApi
{
    /**
     * Retrieve the data for the trending movie list for the given time window
     *
     * @param TmdbTrendingMovieTimeWindowEnum $timeWindow
     * @param array $parameters
     * @param array $headers
     * @return array
     */
    public function getList(
        TmdbTrendingMovieTimeWindowEnum $timeWindow,
        array $parameters = [],
        array $headers = []
    ): array {
        return $this->get('trending/movie/' . $timeWindow->value, $parameters, $headers);
    }
}
