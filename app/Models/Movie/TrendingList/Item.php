<?php
declare(strict_types=1);

namespace App\Models\Movie\TrendingList;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use App\Events\Movie\TrendingList\Item\Created as ItemCreatedEvent;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Item extends Model
{
    /**
     * Name of the DB table, used by the model
     */
    public const MAIN_TABLE_NAME = 'movies_trending_list';

    /**
     * Constants for the model fields
     */
    public const ID = 'id';
    public const MOVIE_ID = 'movie_id';
    public const IS_TRENDING_DAILY = 'is_trending_daily';
    public const IS_TRENDING_WEEKLY = 'is_trending_weekly';

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
        self::MOVIE_ID,
        self::IS_TRENDING_DAILY,
        self::IS_TRENDING_WEEKLY,
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        self::CREATED_AT => 'datetime',
        self::UPDATED_AT => 'datetime',
        self::IS_TRENDING_DAILY => 'bool',
        self::IS_TRENDING_WEEKLY => 'bool',
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        self::IS_TRENDING_DAILY => false,
        self::IS_TRENDING_WEEKLY => false,
    ];

    /**
     * The event map for the model.
     *
     * Allows for object-based events for native Eloquent events.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => ItemCreatedEvent::class,
    ];

    /**
     * Retrieve item id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->getAttribute(self::ID);
    }

    /**
     * Set item id
     *
     * @param int $id
     * @return $this
     */
    public function setId(int $id): Item
    {
        return $this->setAttribute(self::ID, $id);
    }

    /**
     * Retrieve movie id
     *
     * @return int
     */
    public function getMovieId(): int
    {
        return $this->getAttribute(self::MOVIE_ID);
    }

    /**
     * Set movie id
     *
     * @param int $movieId
     * @return $this
     */
    public function setMovieId(int $movieId): Item
    {
        return $this->setAttribute(self::MOVIE_ID, $movieId);
    }

    /**
     * Retrieve is trending daily flag
     *
     * @return bool
     */
    public function getIsTrendingDaily(): bool
    {
        return $this->getAttribute(self::IS_TRENDING_DAILY);
    }

    /**
     * Set is trending daily flag
     *
     * @param bool $isTrendingDaily
     * @return $this
     */
    public function setIsTrendingDaily(bool $isTrendingDaily): Item
    {
        return $this->setAttribute(self::IS_TRENDING_DAILY, $isTrendingDaily);
    }

    /**
     * Retrieve is trending weekly flag
     *
     * @return bool
     */
    public function getIsTrendingWeekly(): bool
    {
        return $this->getAttribute(self::IS_TRENDING_WEEKLY);
    }

    /**
     * Set is trending weekly flag
     *
     * @param bool $isTrendingWeekly
     * @return $this
     */
    public function setIsTrendingWeekly(bool $isTrendingWeekly): Item
    {
        return $this->setAttribute(self::IS_TRENDING_WEEKLY, $isTrendingWeekly);
    }

    /**
     * Retrieve datetime of list item creation
     *
     * @return Carbon|null
     */
    public function getDatetimeOfCreation(): ?Carbon
    {
        return $this->getAttribute(self::CREATED_AT);
    }

    /**
     * Set datetime of list item creation
     *
     * @param Carbon|null $datetimeOfCreation
     * @return $this
     */
    public function setDatetimeOfCreation(?Carbon $datetimeOfCreation): Item
    {
        return $this->setAttribute(self::CREATED_AT, $datetimeOfCreation);
    }

    /**
     * Retrieve datetime of list item last update
     *
     * @return Carbon|null
     */
    public function getDatetimeOfLastUpdate(): ?Carbon
    {
        return $this->getAttribute(self::UPDATED_AT);
    }

    /**
     * Set datetime of list item last update
     *
     * @param Carbon|null $datetimeOfLastUpdate
     * @return $this
     */
    public function setDatetimeOfLastUpdate(?Carbon $datetimeOfLastUpdate): Item
    {
        return $this->setAttribute(self::UPDATED_AT, $datetimeOfLastUpdate);
    }

    /**
     * Returns the model with details about corresponding movie
     *
     * @return HasOne
     */
    public function movie(): HasOne
    {
        return $this->hasOne(
            Movie::class,
            Movie::ID,
            self::MOVIE_ID
        );
    }
}
