<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Movie\TrendingList\Item as MovieTrendingListItem;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(
            MovieTrendingListItem::MAIN_TABLE_NAME,
            function (Blueprint $table) {
                $table->id(MovieTrendingListItem::ID);
                $table->timestamps();
                $table->unsignedInteger(MovieTrendingListItem::MOVIE_ID)->unique();
                $table->boolean(MovieTrendingListItem::IS_TRENDING_DAILY);
                $table->boolean(MovieTrendingListItem::IS_TRENDING_WEEKLY);
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(MovieTrendingListItem::MAIN_TABLE_NAME);
    }
};
