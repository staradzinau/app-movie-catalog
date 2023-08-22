<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Movie;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(
            Movie::MAIN_TABLE_NAME,
            function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->string(Movie::HOMEPAGE);
                $table->string(Movie::BACKDROP_PATH);
                $table->string(Movie::IMDB_ID);
                $table->string(Movie::ORIGINAL_TITLE);
                $table->string(Movie::ORIGINAL_LANGUAGE);
                $table->text(Movie::OVERVIEW);
                $table->float(Movie::POPULARITY);
                $table->string(Movie::POSTER_PATH);
                $table->date(Movie::RELEASE_DATE);
                $table->string(Movie::STATUS);
                $table->string(Movie::TAGLINE);
                $table->float(Movie::VOTE_AVERAGE);
                $table->integer(Movie::VOTE_COUNT)->unsigned();
            })
        ;
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Movie::MAIN_TABLE_NAME);
    }
};
