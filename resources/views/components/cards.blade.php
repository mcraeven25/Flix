@props(['name', 'movies', 'genres', 'file', 'date', 'link'])

<div {{ $attributes->merge(['class' => '']) }}>
    <span class="text-third text-2xl font-semibold ">{{ $name }}
    </span>
    <x-movies-carousel :movies="$movies" :genres="$genres" :file="$file" :date="$date" :link="$link" />
</div>
<script></script>
