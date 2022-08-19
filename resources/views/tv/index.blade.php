@php
$toprated = 'Top Rated Shows';
$origname = 'name';
$air = 'first_air_date';
$linktv = 'tv';
$populartv = 'Popular TV Shows';
$airingtoday = 'Airing Today';
@endphp
<x-layout>
    <div class=" px-2 md:px-32  py-[20px]">
        <h2 class="text-third text-4xl mb-4 md:text-center">TV Shows</h2>
        <div class="px-10">
            <x-cards :name='$toprated' :movies='$top' :genres='$genresTv' :file='$origname' :date="$air"
                :link='$linktv' />
            <x-cards :name='$populartv' :movies='$popular' :genres='$genresTv' class="mt-10" :file='$origname'
                :date="$air" :link='$linktv' />
            <x-cards :name='$airingtoday' :movies='$airing' :genres='$genresTv' class="mt-10" :file='$origname'
                :date="$air" :link='$linktv' />
        </div>
    </div>
</x-layout>
