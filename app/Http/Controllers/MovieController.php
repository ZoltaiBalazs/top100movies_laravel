<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    public function index() {
        $movies = DB::table('movies')
            ->leftJoin('movie_genres', 'movies.id', '=', 'movie_genres.movie_id')
            ->select('movies.*', DB::raw('GROUP_CONCAT(movie_genres.genre) as Genres'))
            ->groupBy('movies.id')
            ->get();

        return view('movies.index', [
            'movies' => $movies,
            'isDeatils' => false]);
    }

    public function show($id) {
        $movies = DB::table('movies')
            ->leftJoin('movie_genres', 'movies.id', '=', 'movie_genres.movie_id')
            ->select('movies.*', DB::raw('GROUP_CONCAT(movie_genres.genre) as Genres'))
            ->groupBy('movies.id')
            ->get();

        $movieToDisplay = $movies[$id];

        return view('movies.index', ['movies' => $movies, 'movie' => $movieToDisplay, 'isDeatils' => true]);
    }
}
