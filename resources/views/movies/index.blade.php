@php
$showing = 'Now Showing';
$popularmovies = 'Most Popular';
$toprated = 'Top Rated Movies';
$trendingmovie = 'Trending Today';
$upcomingmovies = 'Upcoming Movies';
$title = 'title';
$release = 'release_date';
$link = 'movies';
@endphp

<x-layout>
    <div class=" px-2 md:px-32  py-[20px]">
        <h2 class="text-third text-4xl mb-4 md:text-center">Movies</h2>
        <div class="px-10">
            <x-cards :name='$toprated' :movies='$top' :genres='$genres' class="mt-10" :file='$title'
                :date="$release" :link='$link' />
            <x-cards :name='$showing' :movies='$showingMovies' :genres='$genres' :file='$title' :date="$release"
                :link='$link' />
            <x-cards :name='$popularmovies' :movies='$popularMovies' :genres='$genres' class="mt-10" :file='$title'
                :date="$release" :link='$link' />
            <x-cards :name='$upcomingmovies' :movies='$upcoming' :genres='$genres' class="mt-10" :file='$title'
                :date="$release" :link='$link' />
            <x-cards :name='$trendingmovie' :movies='$trending' :genres='$genres' class="mt-10" :file='$title'
                :date="$release" :link='$link' />
        </div>


    </div>
</x-layout>
