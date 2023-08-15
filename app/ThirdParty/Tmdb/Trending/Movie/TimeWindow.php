<?php
declare(strict_types=1);

namespace App\ThirdParty\Tmdb\Trending\Movie;

enum TimeWindow: string
{
    case DAY = 'day';
    case WEEK = 'week';
}
