<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{
    public function show($id)
    {
        $details = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/' . $id . '?append_to_response=credits')
            ->json();
        $genresArray = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/' . $id)
            ->json()['genres'];
        $genres = collect($genresArray)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
        $videos = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/' . $id . '/videos')
            ->json()['results'];

        $images = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/' . $id . '/images')
            ->json()['backdrops'];
        $recommendation = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/' . $id . '/recommendations')
            ->json()['results'];

        return view('movies.show', [
            'details' => $details,
            'genres' => $genres,
            'videos' => $videos,
            'images' => $images,
            'recommendation' => $recommendation,

        ]);
    }
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
        $upcoming = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/upcoming')
            ->json()['results'];
        $top = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/top_rated')
            ->json()['results'];
        $trending = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/trending/movie/day')
            ->json()['results'];



        return view('movies.index', [
            'showingMovies' => $showingMovies,
            'popularMovies' => $popularMovies,
            'genres' => $genres,
            'top' => $top,
            'trending' => $trending,
            'upcoming' => $upcoming,

        ]);
    }
}
