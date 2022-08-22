<?php

namespace App\Http\Controllers;

use Illuminate\Auth\GenericUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IndexController extends Controller
{


    public function index()
    {
        $showingMovies = Http::get('https://api.themoviedb.org/3/movie/now_playing?api_key=477b22beec14efc40a4349c4cf43fe2b')
            ->json()['results'];
        $popularMovies = Http::get('https://api.themoviedb.org/3/movie/popular?api_key=477b22beec14efc40a4349c4cf43fe2b')
            ->json()['results'];

        $genresArr = Http::get('https://api.themoviedb.org/3/genre/movie/list?api_key=477b22beec14efc40a4349c4cf43fe2b')
            ->json()['genres'];

        $genres = collect($genresArr)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
        $genresArrTV = Http::get('https://api.themoviedb.org/3/genre/tv/list?api_key=477b22beec14efc40a4349c4cf43fe2b')
            ->json()['genres'];

        $genresTv = collect($genresArrTV)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
        $top = Http::get('https://api.themoviedb.org/3/tv/top_rated?api_key=477b22beec14efc40a4349c4cf43fe2b')
            ->json()['results'];
        $popular = Http::get('https://api.themoviedb.org/3/tv/popular?api_key=477b22beec14efc40a4349c4cf43fe2b')
            ->json()['results'];

        return view('index', [
            'showingMovies' => $showingMovies,
            'popularMovies' => $popularMovies,
            'genres' => $genres,
            'genresTv' => $genresTv,
            'top' => $top,
            'popular' => $popular,
        ]);
    }
}
