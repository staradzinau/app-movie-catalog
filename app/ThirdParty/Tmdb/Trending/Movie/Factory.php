<?php
declare(strict_types=1);

namespace App\ThirdParty\Tmdb\Trending\Movie;

use App\ThirdParty\Tmdb\Trending\Movie\Model as TmdbTrendingMovieModel;
use Tmdb\Factory\AbstractFactory as TmdbAbstractFactory;
use Tmdb\Model\Collection\ResultCollection;

class Factory extends TmdbAbstractFactory
{
    /**
     * Convert an array to an hydrated object
     *
     * @param array $data
     * @return TmdbTrendingMovieModel
     */
    public function create(array $data = []): TmdbTrendingMovieModel
    {
        return $this->hydrate(new TmdbTrendingMovieModel(), $data);
    }

    /**
     * Convert an array with an collection of items to an hydrated object collection
     *
     * @param array $data
     * @return ResultCollection
     */
    public function createCollection(array $data = []): ResultCollection
    {
        return $this->createResultCollection($data);
    }
}
