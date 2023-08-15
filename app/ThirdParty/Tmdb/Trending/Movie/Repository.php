<?php
declare(strict_types=1);

namespace App\ThirdParty\Tmdb\Trending\Movie;

use App\ThirdParty\Tmdb\Trending\Movie\Api as TmdbTrendingMovieApi;
use Tmdb\Repository\AbstractRepository as TmdbAbstractRepository;
use App\ThirdParty\Tmdb\Trending\Movie\Factory as TmdbTrendingMovieFactory;
use App\ThirdParty\Tmdb\Trending\Movie\TimeWindow as TmdbTrendingMovieTimeWindowEnum;
use Tmdb\Model\Collection\ResultCollection as TmdbResultCollection;

class Repository extends TmdbAbstractRepository
{
    /**
     * Load the list of trending movies data for the given time window
     *
     * @param TmdbTrendingMovieTimeWindowEnum $timeWindow
     * @param array $parameters
     * @param array $headers
     * @return TmdbResultCollection
     */
    public function loadList(
        TmdbTrendingMovieTimeWindowEnum $timeWindow,
        array $parameters = [],
        array $headers = []
    ): TmdbResultCollection {
        $data = $this->getApi()->getList($timeWindow, $parameters, $headers);
        return $this->getFactory()->createCollection($data);
    }

    /**
     * Return the API Class
     *
     * @return TmdbTrendingMovieApi
     */
     public function getApi()
     {
         return new TmdbTrendingMovieApi($this->getClient());
     }

    /**
     * Return the Factory Class
     *
     * @return TmdbTrendingMovieFactory
     */
     public function getFactory(): TmdbTrendingMovieFactory
     {
         return new TmdbTrendingMovieFactory($this->getClient()->getHttpClient());
     }
}
