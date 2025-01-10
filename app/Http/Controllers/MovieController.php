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

    public function show(Request $request)
    {
        $query = $request->input('query', '');

        if ((int) $query === 0 && $query !== '0') {
            if ($query == "") {
                $this->index();
            }
            $movies = DB::table('movies')
            ->leftJoin('movie_genres', 'movies.id', '=', 'movie_genres.movie_id')
            ->where('Title', 'LIKE', '%' . $query . '%')
            ->select('movies.*', DB::raw('GROUP_CONCAT(movie_genres.genre) as Genres'))
            ->groupBy('movies.id')
            ->get();
            
            return view('movies.index', [
                'movies' => $movies,
                'isDeatils' => false]);
        }

        $movies = DB::table('movies')
                        ->leftJoin('movie_genres', 'movies.id', '=', 'movie_genres.movie_id')
                        ->select('movies.*', DB::raw('GROUP_CONCAT(movie_genres.genre) as Genres'))
                        ->groupBy('movies.id')
                        ->get();

        $movieToDisplay = $movies[(int) $query-1];

        return view('movies.index', ['movies' => $movies, 'movieToDisplay' => $movieToDisplay, 'isDeatils' => true]);
    
    
    }
}
