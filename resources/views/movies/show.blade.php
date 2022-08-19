@php
$minutes = $details['runtime'];
$hours = floor($minutes / 60) . 'h' . ' ' . ($minutes - floor($minutes / 60) * 60) . 'm';
$movie = 'movies';
$title = 'title';
@endphp
<x-layout>
    <div class="md:p-10 px-2">
        <x-banner :details="$details" :genres="$genres" :videos="$videos" />
        <h2 class="text-third text-4xl font-bold mt-[60rem] md:mt-10 mb-4">Cast</h2>
        <x-cast :details="$details" />
        <h2 class="text-third text-4xl font-bold mt-10 mb-4">Images</h2>
        <x-images :images="$images" />
        @if (!empty($recommendation))
            {
            <h2 class="text-third text-4xl font-bold mt-10 mb-4">Recommendations</h2>
            <x-recommendation :recommendations="$recommendation" :type="$movie" :name='$title' />
            }
        @endif
    </div>

</x-layout>
