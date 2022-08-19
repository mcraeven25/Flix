@php
$movielink = 'movies';
$title = 'title';
$tvlink = 'tv';
$name = 'name';
@endphp
<x-layout>
    <div class="md:px-32 px-2 py-10">
        <div class="flex gap-10 md:flex-row flex-col">
            <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $actor['profile_path'] }}" alt=""
                class=" h-[32rem] ">
            <div>
                <h1 class="text-5xl text-third">{{ $actor['name'] }}</h1>
                <h2 class="text-third text-3xl pt-5">Biography</h2>
                <p class="text-second px-2 py-2 text-xl">{{ $actor['biography'] }}</p>
                <h2 class="text-third text-3xl pt-5">Personal Info</h2>
                <div class="text-second px-2 py-2 flex gap-20">
                    <div>
                        <span class="font-semibold text-2xl">Birthday</span><br>
                        <span class="text-xl">{{ Carbon\Carbon::parse($actor['birthday'])->format('M d, Y') }}</span>
                    </div>
                    <div>
                        <span class="font-semibold text-2xl">Place of Birth</span><br>
                        <span class="text-xl">{{ $actor['place_of_birth'] }}</span>
                    </div>
                </div>
            </div>
        </div>
        <h2 class="text-third text-3xl pt-10 pb-5">Movies</h2>
        <x-actor-shows :movies="$movies" :link="$movielink" :title="$title" />
        <h2 class="text-third text-3xl pt-10 pb-5">TV Shows</h2>
        <x-actor-shows :movies="$tv" :link="$tvlink" :title="$name" />
    </div>
</x-layout>
