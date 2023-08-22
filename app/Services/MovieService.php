<?php
declare(strict_types=1);

namespace App\Services;

use Tmdb\Repository\MovieRepository as TmdbMovieRepository;
use App\Models\Movie;
use Tmdb\Model\Movie as TmdbMovieModel;
use Illuminate\Support\Carbon;

class MovieService
{
    public function __construct(
        private TmdbMovieRepository $tmdbMovieRepository
    ) {
    }

    /**
     * For the given movie ID, load data from the API and save in the database
     * as the new record
     *
     * @param int $movieId
     * @return bool
     */
    public function addMovie(int $movieId): bool
    {
        $movie = Movie::newModelInstance();
        /** @var TmdbMovieModel $tmdbMovie */
        $tmdbMovie = $this->tmdbMovieRepository->load($movieId);

        $dateOfRelease = ($tmdbMovie->getReleaseDate() === null)
            ? Carbon::now()
            : new Carbon($tmdbMovie->getReleaseDate())
        ;

        $movie
            ->setId($movieId)
            ->setHomepageUrl($tmdbMovie->getHomepage())
            ->setBackdropPath($tmdbMovie->getBackdropPath())
            ->setImdbId($tmdbMovie->getImdbId())
            ->setOriginalTitle($tmdbMovie->getOriginalTitle())
            ->setOriginalLanguageCode($tmdbMovie->getOriginalLanguage())
            ->setOverview($tmdbMovie->getOverview())
            ->setPopularityValue($tmdbMovie->getPopularity())
            ->setPosterPath($tmdbMovie->getPosterPath())
            ->setDateOfRelease($dateOfRelease)
            ->setStatus($tmdbMovie->getStatus())
            ->setTagline($tmdbMovie->getTagline())
            ->setVoteAverageValue($tmdbMovie->getVoteAverage())
            ->setVoteCount($tmdbMovie->getVoteCount())
        ;

        $movie->save();

        return true;
    }
}
