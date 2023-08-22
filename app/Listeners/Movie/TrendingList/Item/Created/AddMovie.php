<?php
declare(strict_types=1);

namespace App\Listeners\Movie\TrendingList\Item\Created;

use App\Events\Movie\TrendingList\Item\Created as MovieTrendingListItemCreatedEvent;
use App\Services\MovieService;
use Illuminate\Contracts\Queue\ShouldQueue;

class AddMovie implements ShouldQueue
{
    public function __construct(
        private MovieService $movieService
    ) {}

    /**
     * Handle the event.
     * For newly created list item, create corresponding movie record
     */
    public function handle(MovieTrendingListItemCreatedEvent $event): void
    {
        $this->movieService->addMovie($event->getCreatedItem()->getMovieId());
    }
}
