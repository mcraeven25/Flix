<?php

namespace App\Http\Controllers;

use Illuminate\Auth\GenericUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IndexController extends Controller
{


    public function index()
    {
        $showingMovies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/now_playing')
            ->json()['results'];
        $popularMovies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3//movie/popular')
            ->json()['results'];

        $genresArr = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/genre/movie/list')
            ->json()['genres'];

        $genres = collect($genresArr)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
        $genresArrTV = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/genre/tv/list')
            ->json()['genres'];

        $genresTv = collect($genresArrTV)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
        $top = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/tv/top_rated')
            ->json()['results'];
        $popular = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/tv/popular')
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
