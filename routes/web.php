<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Movie\TrendingList as MovieTrendingListController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return Redirect::route('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::group(
        [
            'prefix' => 'movie',
            'as' => 'movie.'
        ],
        function () {
            Route::get(
                '/trending-list/view',
                [MovieTrendingListController::class, 'view']
            )->name('trending-list.view');
        }
    );
});

require __DIR__.'/auth.php';
