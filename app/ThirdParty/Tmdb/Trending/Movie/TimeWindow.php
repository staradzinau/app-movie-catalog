<?php
declare(strict_types=1);

namespace App\ThirdParty\Tmdb\Trending\Movie;

enum TimeWindow: string
{
    case DAY = 'day';
    case WEEK = 'week';

    /**
     * Retrieve human-readable representation of the enum current value
     *
     * @return string
     */
    public function label(): string
    {
        return match($this) {
            self::DAY => 'Today',
            self::WEEK => 'This Week',
        };
    }
}
