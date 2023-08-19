<?php
declare(strict_types=1);

namespace App\Console\Commands\Movie\TrendingList;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Enum as EnumValidationRule;
use App\ThirdParty\Tmdb\Trending\Movie\TimeWindow as TmdbTrendingMovieTimeWindowEnum;
use App\Jobs\Movie\TrendingList\Update as MovieTrendingListUpdateJob;

class Update extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:movie:trending-list:update {time-window : Time interval for statistics: daily or weekly}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Performs actualization of the movie trending list for the given time window';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $timeWindow = $this->argument('time-window');

        $validator = Validator::make(
            [
                'timeWindow' => $timeWindow
            ],
            [
                'timeWindow' => [new EnumValidationRule(TmdbTrendingMovieTimeWindowEnum::class)],
            ]
        );

        if ($validator->fails()) {
            $this->info("Input is invalid. Check `time-window` argument value");
            return 1;
        }

        MovieTrendingListUpdateJob::dispatch(TmdbTrendingMovieTimeWindowEnum::from($timeWindow))
            ->onQueue('api-interaction');

        return 1;
    }
}
