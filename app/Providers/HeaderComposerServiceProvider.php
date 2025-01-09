<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class HeaderComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('components.header', function ($view) {
            $moviesCount = DB::table('movies')
            ->leftJoin('movie_genres', 'movies.id', '=', 'movie_genres.movie_id')
            ->select('movies.*', DB::raw('GROUP_CONCAT(movie_genres.genre) as Genres'))
            ->groupBy('movies.id')
            ->get()->count();
            $view->with('moviesCount', $moviesCount);
        });
    }
}
