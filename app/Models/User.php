<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Name of the DB table, used by the model
     */
    public const MAIN_TABLE_NAME = 'users';

    /**
     * Constants for the model fields
     */
    public const ID = 'id';
    public const NAME = 'name';
    public const EMAIL = 'email';
    public const EMAIL_VERIFIED_AT = 'email_verified_at';
    public const PASSWORD = 'password';
    public const REMEMBER_TOKEN = 'remember_token';

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
        self::NAME,
        self::EMAIL,
        self::PASSWORD,
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        self::PASSWORD,
        self::REMEMBER_TOKEN,
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        self::EMAIL_VERIFIED_AT => 'datetime',
        self::PASSWORD => 'hashed',
    ];

    /**
     * Retrieve user id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->getAttribute(self::ID);
    }

    /**
     * Set user id
     *
     * @param int $id
     * @return $this
     */
    public function setId(int $id): User
    {
        return $this->setAttribute(self::ID, $id);
    }

    /**
     * Retrieve name of user
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->getAttribute(self::NAME);
    }

    /**
     * Set name of user
     *
     * @param string $name
     * @return $this
     */
    public function setName(string $name): User
    {
        return $this->setAttribute(self::NAME, $name);
    }

    /**
     * Retrieve email address
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->getAttribute(self::EMAIL);
    }

    /**
     * Set email address
     *
     * @param string $email
     * @return $this
     */
    public function setEmail(string $email): User
    {
        return $this->setAttribute(self::EMAIL, $email);
    }

    /**
     * Retrieve email verification datetime
     *
     * @return Carbon|null
     */
    public function getEmailVerificationDatetime(): ?Carbon
    {
        return $this->getAttribute(self::EMAIL_VERIFIED_AT);
    }

    /**
     * Set email verification datetime
     *
     * @param Carbon|null $emailVerificationDatetime
     * @return $this
     */
    public function setEmailVerificationDatetime(?Carbon $emailVerificationDatetime): User
    {
        return $this->setAttribute(self::EMAIL_VERIFIED_AT, $emailVerificationDatetime);
    }

    /**
     * Retrieve password value
     *
     * @return string
     */
    public function getPassword(): string
    {
        return $this->getAttribute(self::PASSWORD);
    }

    /**
     * Set password value
     *
     * @param string $password
     * @return $this
     */
    public function setPassword(string $password): User
    {
        return $this->setAttribute(self::PASSWORD, $password);
    }

    /**
     * Retrieve 'remember me' token value
     *
     * @return string
     */
    public function getRememberMeTokenValue(): string
    {
        return $this->getAttribute(self::REMEMBER_TOKEN);
    }

    /**
     * Set 'remember me' token value
     *
     * @param string $rememberMeTokenValue
     * @return $this
     */
    public function setRememberMeTokenValue(string $rememberMeTokenValue): User
    {
        return $this->setAttribute(self::REMEMBER_TOKEN, $rememberMeTokenValue);
    }

    /**
     * Retrieve datetime of user creation
     *
     * @return Carbon|null
     */
    public function getDatetimeOfCreation(): ?Carbon
    {
        return $this->getAttribute(self::CREATED_AT);
    }

    /**
     * Set datetime of user creation
     *
     * @param Carbon|null $datetimeOfCreation
     * @return $this
     */
    public function setDatetimeOfCreation(?Carbon $datetimeOfCreation): User
    {
        return $this->setAttribute(self::CREATED_AT, $datetimeOfCreation);
    }

    /**
     * Retrieve datetime of user last update
     *
     * @return Carbon|null
     */
    public function getDatetimeOfLastUpdate(): ?Carbon
    {
        return $this->getAttribute(self::UPDATED_AT);
    }

    /**
     * Set datetime of user last update
     *
     * @param Carbon|null $datetimeOfLastUpdate
     * @return $this
     */
    public function setDatetimeOfLastUpdate(?Carbon $datetimeOfLastUpdate): User
    {
        return $this->setAttribute(self::UPDATED_AT, $datetimeOfLastUpdate);
    }
}
