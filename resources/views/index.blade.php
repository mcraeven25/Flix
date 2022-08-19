@php
$showing = 'Now Showing';
$popularmovies = 'Most Popular';
$toprated = 'Top Rated Shows';
$title = 'title';
$origname = 'name';
$release = 'release_date';
$air = 'first_air_date';
$linktv = 'tv';
$link = 'movies';
@endphp

<x-layout>
    <div class=" px-2 md:px-32  py-[20px]">
        <h2 class="text-third text-4xl mb-4">Movies</h2>
        <div class="px-10">
            <x-cards :name='$showing' :movies='$showingMovies' :genres='$genres' :file='$title' :date="$release"
                :link='$link' />
            <x-cards :name='$popularmovies' :movies='$popularMovies' :genres='$genres' class="mt-10" :file='$title'
                :date="$release" :link='$link' />
        </div>
        <h2 class="text-third text-4xl mb-4">TV Shows</h2>
        <div class="px-10">
            <x-cards :name='$toprated' :movies='$top' :genres='$genresTv' :file='$origname' :date="$air"
                :link='$linktv' />
            <x-cards :name='$popularmovies' :movies='$popular' :genres='$genresTv' class="mt-10" :file='$origname'
                :date="$air" :link='$linktv' />
        </div>
    </div>
</x-layout>
