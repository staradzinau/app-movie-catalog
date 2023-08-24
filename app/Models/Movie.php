<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Movie\TrendingList\Item as MovieTrendingListItem;

class Movie extends Model
{
    /**
     * Name of the DB table, used by the model
     */
    public const MAIN_TABLE_NAME = 'movies';

    /**
     * Constants for the model fields
     */
    public const ID = 'id';
    public const HOMEPAGE = 'homepage';
    public const BACKDROP_PATH = 'backdrop_path';
    public const IMDB_ID = 'imdb_id';
    public const ORIGINAL_TITLE = 'original_title';
    public const ORIGINAL_LANGUAGE = 'original_language';
    public const OVERVIEW = 'overview';
    public const POPULARITY = 'popularity';
    public const POSTER_PATH = 'poster_path';
    public const RELEASE_DATE = 'release_date';
    public const STATUS = 'status';
    public const TAGLINE = 'tagline';
    public const VOTE_AVERAGE = 'vote_average';
    public const VOTE_COUNT = 'vote_count';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = self::MAIN_TABLE_NAME;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        self::HOMEPAGE,
        self::BACKDROP_PATH,
        self::IMDB_ID,
        self::ORIGINAL_TITLE,
        self::ORIGINAL_LANGUAGE,
        self::OVERVIEW,
        self::POPULARITY,
        self::POSTER_PATH,
        self::RELEASE_DATE,
        self::STATUS,
        self::TAGLINE,
        self::VOTE_AVERAGE,
        self::VOTE_COUNT,
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        self::CREATED_AT => 'datetime',
        self::UPDATED_AT => 'datetime',
        self::RELEASE_DATE => 'date',
        self::POPULARITY => 'float',
        self::VOTE_AVERAGE => 'float',
        self::VOTE_COUNT => 'int',
    ];

    /**
     * Retrieve movie id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->getAttribute(self::ID);
    }

    /**
     * Set movie id
     *
     * @param int $id
     * @return Movie
     */
    public function setId(int $id): Movie
    {
        return $this->setAttribute(self::ID, $id);
    }

    /**
     * Retrieve datetime of movie record creation
     *
     * @return Carbon|null
     */
    public function getDatetimeOfCreation(): ?Carbon
    {
        return $this->getAttribute(self::CREATED_AT);
    }

    /**
     * Set datetime of movie record creation
     *
     * @param Carbon|null $datetimeOfCreation
     * @return $this
     */
    public function setDatetimeOfCreation(?Carbon $datetimeOfCreation): Movie
    {
        return $this->setAttribute(self::CREATED_AT, $datetimeOfCreation);
    }

    /**
     * Retrieve datetime of movie record last update
     *
     * @return Carbon|null
     */
    public function getDatetimeOfLastUpdate(): ?Carbon
    {
        return $this->getAttribute(self::UPDATED_AT);
    }

    /**
     * Set datetime of movie record last update
     *
     * @param Carbon|null $datetimeOfLastUpdate
     * @return $this
     */
    public function setDatetimeOfLastUpdate(?Carbon $datetimeOfLastUpdate): Movie
    {
        return $this->setAttribute(self::UPDATED_AT, $datetimeOfLastUpdate);
    }

    /**
     * Retrieve date of movie release
     *
     * @return Carbon
     */
    public function getDateOfRelease(): Carbon
    {
        return $this->getAttribute(self::RELEASE_DATE);
    }

    /**
     * Set date of movie release
     *
     * @param Carbon $dateOfRelease
     * @return $this
     */
    public function setDateOfRelease(Carbon $dateOfRelease): Movie
    {
        return $this->setAttribute(self::RELEASE_DATE, $dateOfRelease);
    }

    /**
     * Retrieve movie homepage URL
     *
     * @return string
     */
    public function getHomepageUrl(): string
    {
        return $this->getAttribute(self::HOMEPAGE);
    }

    /**
     * Set movie homepage URL
     *
     * @param string $homepageUrl
     * @return Movie
     */
    public function setHomepageUrl(string $homepageUrl): Movie
    {
        return $this->setAttribute(self::HOMEPAGE, $homepageUrl);
    }

    /**
     * Retrieve backdrop path
     *
     * @return string
     */
    public function getBackdropPath(): string
    {
        return $this->getAttribute(self::BACKDROP_PATH);
    }

    /**
     * Set backdrop path
     *
     * @param string $backdropPath
     * @return Movie
     */
    public function setBackdropPath(string $backdropPath): Movie
    {
        return $this->setAttribute(self::BACKDROP_PATH, $backdropPath);
    }

    /**
     * Retrieve IMDB id
     *
     * @return string
     */
    public function getImdbId(): string
    {
        return $this->getAttribute(self::IMDB_ID);
    }

    /**
     * Set IMDB id
     *
     * @param string $imdbId
     * @return Movie
     */
    public function setImdbId(string $imdbId): Movie
    {
        return $this->setAttribute(self::IMDB_ID, $imdbId);
    }

    /**
     * Retrieve original title
     *
     * @return string
     */
    public function getOriginalTitle(): string
    {
        return $this->getAttribute(self::ORIGINAL_TITLE);
    }

    /**
     * Set original title
     *
     * @param string $originalTitle
     * @return Movie
     */
    public function setOriginalTitle(string $originalTitle): Movie
    {
        return $this->setAttribute(self::ORIGINAL_TITLE, $originalTitle);
    }

    /**
     * Retrieve original language code
     *
     * @return string
     */
    public function getOriginalLanguageCode(): string
    {
        return $this->getAttribute(self::ORIGINAL_LANGUAGE);
    }

    /**
     * Set original language code
     *
     * @param string $originalLanguageCode
     * @return Movie
     */
    public function setOriginalLanguageCode(string $originalLanguageCode): Movie
    {
        return $this->setAttribute(self::ORIGINAL_LANGUAGE, $originalLanguageCode);
    }

    /**
     * Retrieve overview
     *
     * @return string
     */
    public function getOverview(): string
    {
        return $this->getAttribute(self::OVERVIEW);
    }

    /**
     * Set overview
     *
     * @param string $overview
     * @return Movie
     */
    public function setOverview(string $overview): Movie
    {
        return $this->setAttribute(self::OVERVIEW, $overview);
    }

    /**
     * Retrieve popularity value
     *
     * @return float
     */
    public function getPopularityValue(): float
    {
        return $this->getAttribute(self::POPULARITY);
    }

    /**
     * Set popularity value
     *
     * @param float $popularityValue
     * @return Movie
     */
    public function setPopularityValue(float $popularityValue): Movie
    {
        return $this->setAttribute(self::POPULARITY, $popularityValue);
    }

    /**
     * Retrieve poster path
     *
     * @return string
     */
    public function getPosterPath(): string
    {
        return $this->getAttribute(self::POSTER_PATH);
    }

    /**
     * Set poster path
     *
     * @param string $posterPath
     * @return Movie
     */
    public function setPosterPath(string $posterPath): Movie
    {
        return $this->setAttribute(self::POSTER_PATH, $posterPath);
    }

    /**
     * Retrieve movie status
     *
     * @return string
     */
    public function getStatus(): string
    {
        return $this->getAttribute(self::STATUS);
    }

    /**
     * Set movie status
     *
     * @param string $status
     * @return Movie
     */
    public function setStatus(string $status): Movie
    {
        return $this->setAttribute(self::STATUS, $status);
    }

    /**
     * Retrieve movie tagline
     *
     * @return string
     */
    public function getTagline(): string
    {
        return $this->getAttribute(self::TAGLINE);
    }

    /**
     * Set movie tagline
     *
     * @param string $tagline
     * @return Movie
     */
    public function setTagline(string $tagline): Movie
    {
        return $this->setAttribute(self::TAGLINE, $tagline);
    }

    /**
     * Retrieve vote average value
     *
     * @return float
     */
    public function getVoteAverageValue(): float
    {
        return $this->getAttribute(self::VOTE_AVERAGE);
    }

    /**
     * Set vote average value
     *
     * @param float $voteAverageValue
     * @return Movie
     */
    public function setVoteAverageValue(float $voteAverageValue): Movie
    {
        return $this->setAttribute(self::VOTE_AVERAGE, $voteAverageValue);
    }

    /**
     * Retrieve vote count
     *
     * @return int
     */
    public function getVoteCount(): int
    {
        return $this->getAttribute(self::VOTE_COUNT);
    }

    /**
     * Set vote count
     *
     * @param int $voteCount
     * @return Movie
     */
    public function setVoteCount(int $voteCount): Movie
    {
        return $this->setAttribute(self::VOTE_COUNT, $voteCount);
    }

    /**
     * Returns the related item of movie trending list
     *
     * @return BelongsTo
     */
    public function trendingListItem(): BelongsTo
    {
        return $this->belongsTo(
            MovieTrendingListItem::class,
            self::ID,
            MovieTrendingListItem::MOVIE_ID,
        );
    }
}
