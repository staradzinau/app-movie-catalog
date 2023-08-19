<?php
declare(strict_types=1);

namespace App\Jobs\Movie\TrendingList;

use App\ThirdParty\Tmdb\Trending\Movie\TimeWindow as TmdbTrendingMovieTimeWindowEnum;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Services\Movie\TrendingList as MovieTrendingListService;
use Illuminate\Support\Facades\App;

class Update implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private TmdbTrendingMovieTimeWindowEnum $timeWindow
    ) {
    }

    /**
     * Performs the update of movie trending list for the given time window value
     * @return void
     */
    public function handle(): void
    {
        $movieTrendingListService = App::make(MovieTrendingListService::class);
        $movieTrendingListService->resetFlag($this->timeWindow);
        $movieTrendingListService->updateList($this->timeWindow);
    }
}
