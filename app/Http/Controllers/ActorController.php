<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;



class ActorController extends Controller
{
    public function index()
    {
        $actors1 = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/person/popular')
            ->json()['results'];

        $actors2 = Http::get('https://api.themoviedb.org/3/person/popular?api_key=' . config('services.tmdb.key') . '&page=2')
            ->json()['results'];
        $actors3 = Http::get('https://api.themoviedb.org/3/person/popular?api_key=' . config('services.tmdb.key') . '&page=3')
            ->json()['results'];


        $actors = array_merge($actors1, $actors2, $actors3);


        return view('actors.index', [
            'actors' => $actors,
            'actors2' => $actors2
        ]);
    }
    public function show($id)
    {
        $actor = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/person/' . $id)
            ->json();
        $movies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/person/' . $id . '/movie_credits')
            ->json()['cast'];
        $tv = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/person/' . $id . '/tv_credits')
            ->json()['cast'];


        return view('actors.show', [
            'actor' => $actor,
            'movies' => $movies,
            'tv' => $tv,

        ]);
    }
}
