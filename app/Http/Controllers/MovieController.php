<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieRequest;
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
            'isDeatils' => false,
            'isCreate' => false
        ]);
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
                'isDeatils' => false,
                'isCreate' => false
            ]);
        }

        $movies = DB::table('movies')
                        ->leftJoin('movie_genres', 'movies.id', '=', 'movie_genres.movie_id')
                        ->select('movies.*', DB::raw('GROUP_CONCAT(movie_genres.genre) as Genres'))
                        ->groupBy('movies.id')
                        ->get();

        $movieToDisplay = $movies[(int) $query-1];

        return view('movies.index', [
            'movies' => $movies, 
            'movieToDisplay' => $movieToDisplay, 
            'isDeatils' => true, 
            'isCreate' => false
        ]);
    
    
    }

    public function create() {

        $movieEmpty = (object) [
            'Title' => '',
            'Image' => '',
            'Runtime' => '',
            'Rated' => '',
            'Imdb_ID' => '',
            'Plot' => '',
            'Director' => '',
            'Actors' => '',
            'Imdb_rating' => '',
            'Writer' => '',
            'Genre' => '',
        ];

        $movies = DB::table('movies')
                        ->leftJoin('movie_genres', 'movies.id', '=', 'movie_genres.movie_id')
                        ->select('movies.*', DB::raw('GROUP_CONCAT(movie_genres.genre) as Genres'))
                        ->groupBy('movies.id')
                        ->get();

        return view('movies.index', [
            'movies' => $movies, 
            'movieEmpty' => $movieEmpty,
            'action' => 'movies',
            'method' => 'POST',
            'isDeatils' => false,
            'isCreate' => true
        ]);
    }

    public function store(MovieRequest $request) {

        $validatedData = $request->validated();
        
        dd($validatedData['title']);

        $runtime = $validatedData['runtimeHours'] . ' h ' . $validatedData['runtimeMinutes'] . ' min';
        $movieId = DB::table('movies')->insertGetId([
            'Title' => $validatedData['title'],
            'Image' => $validatedData['image'],
            'Runtime'  => $runtime,
            'Released' => $validatedData['releaseDate'],
            'Rated' => $validatedData['rating'],
            'Imdb_Id' => $validatedData['imdb_id'],
            'Plot' => $validatedData['plot'],
            'Director' => $validatedData['director'],
            'Actors' => $validatedData['actors'],
            'Imdb_rating ' => $validatedData['imdbRating'],
            'Writer' => $validatedData['writer']
        ]);

        DB::table('movie_genres')->insert([
                'genre' => $validatedData['genre'],
                'movie_id' => $movieId,
        ]);
        $this->index();

    }
    
    public function destroy($id) {
        $movies = DB::table('movies')->select('movies.*')->where('id','=',$id)->first();
        if ($movies) {
            DB::table('movies')
                ->join('movie_genres', 'movies.id', '=', 'movie_genres.movie_id')
                ->where('movies.id', $id)
                ->delete();            
            
            return redirect()->route('movies.index')->with('success','Updating the information of a movie was successfull!');
        }

    }
}
