<?php
declare(strict_types=1);

namespace App\Console;

use App\ThirdParty\Tmdb\Trending\Movie\TimeWindow as TmdbTrendingMovieTimeWindowEnum;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Commands\Movie\TrendingList\Update as MovieTrendingListUpdateCommand;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule
            ->command(
                MovieTrendingListUpdateCommand::class,
                [TmdbTrendingMovieTimeWindowEnum::DAY]
            )->dailyAt('00:00')
        ;
        $schedule
            ->command(
                MovieTrendingListUpdateCommand::class,
                [TmdbTrendingMovieTimeWindowEnum::WEEK]
            )->weekly()
        ;
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
