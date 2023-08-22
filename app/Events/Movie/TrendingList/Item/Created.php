<?php
declare(strict_types=1);

namespace App\Events\Movie\TrendingList\Item;

use App\Models\Movie\TrendingList\Item as MovieTrendingListItem;

class Created
{
    public function __construct(
        private MovieTrendingListItem $createdItem
    ) {}

    /**
     * Retrieve the newly created movie trending list item
     *
     * @return MovieTrendingListItem
     */
    public function getCreatedItem(): MovieTrendingListItem
    {
        return $this->createdItem;
    }
}
