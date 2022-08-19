<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TvController extends Controller
{
    public function show($id)
    {
        $details = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/tv/' . $id . '?append_to_response=credits')
            ->json();
        $genresArray = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/tv/' . $id)
            ->json()['genres'];
        $genres = collect($genresArray)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });

        $videos = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/tv/' . $id . '/videos')
            ->json()['results'];

        $images = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/tv/' . $id . '/images')
            ->json()['backdrops'];

        $recommendation = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/tv/' . $id . '/recommendations')
            ->json()['results'];


        $airing = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/tv/airing_today')
            ->json()['results'];


        return view('tv.show', [
            'details' => $details,
            'genres' => $genres,
            'videos' => $videos,
            'images' => $images,
            'recommendation' => $recommendation,
        ]);
    }
    public function index()
    {
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
        $airing = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/tv/airing_today')
            ->json()['results'];

        return view('tv.index', [
            'genresTv' => $genresTv,
            'top' => $top,
            'popular' => $popular,
            'airing' => $airing,
        ]);
    }
}
