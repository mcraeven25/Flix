@php
$tv = 'tv';
$title = 'name';
@endphp
<x-layout>
    <div class="md:p-10 px-2">
        <x-tv-banner :details="$details" :genres="$genres" :videos="$videos" />
        <h2 class="text-third text-4xl font-bold mt-[70rem] md:mt-10 mb-4">Cast</h2>
        <x-cast :details="$details" />
        @if (!empty($recommendation))
            <h2 class="text-third text-4xl font-bold mt-10 mb-4">Images</h2>
            <x-images :images="$images" />
        @endif
        @if (!empty($recommendation))
            <h2 class="text-third text-4xl font-bold mt-10 mb-4">Recommendations</h2>
            <x-recommendation :recommendations="$recommendation" :type="$tv" :name='$title' />
        @endif

    </div>

</x-layout>
