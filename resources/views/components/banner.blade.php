@php
$minutes = $details['runtime'];
$hours = floor($minutes / 60) . 'h' . ' ' . ($minutes - floor($minutes / 60) * 60) . 'm';
@endphp
@props(['details', 'genres', 'videos'])
<div class="h-[40rem] w-full relative ">
    <img src="https://image.tmdb.org/t/p/original{{ $details['backdrop_path'] }}" alt=""
        class="w-full h-full bg-cover opacity-75 relative hidden md:block">
    <div class="absolute inset-0 bg-neutral-900 opacity-50"></div>
    <div class="absolute top-0 w-full flex p-5 flex-col md:flex-row">
        <img src="https://image.tmdb.org/t/p/w500{{ $details['poster_path'] }}" alt=""
            class="h-[32rem] shadow-2xl rounded-md mr-6">
        <div class="flex flex-col gap-y-5">
            <div class="flex  flex-col">
                <span class="text-5xl font-bold text-white">{{ $details['title'] }}
                    ({{ Carbon\Carbon::parse($details['release_date'])->format('Y') }})</span>
                <div class="flex gap-3 mt-1 px-2   md:flex-row flex-col">
                    <span class="text-lg text-white ">
                        {{ Carbon\Carbon::parse($details['release_date'])->format('M d, Y') }}
                    </span>
                    <span class="text-lg text-white hidden md:block">&#8226;</span>
                    <div class="flex md:flex-row flex-col">
                        @foreach ($genres as $genre)
                            @if (!$loop->last)
                                <span class="text-white text-lg"> {{ $genre }},&nbsp;
                                </span>
                            @else
                                <span class="text-white text-lg"> {{ $genre }}
                                </span>
                            @endif
                        @endforeach
                    </div>
                    <span class="text-lg text-white hidden md:block">&#8226;</span>
                    <span class="text-lg text-white">{{ $hours }}</span>
                </div>
            </div>
            <div class="flex items-center px-2">
                <div class="w-[70px] h-[70px] bg-neutral-900  rounded-full relative">
                    <svg class="relative w-[70px] h-[70px]">
                        <circle
                            class="w-[70px] h-[70px] stroke-[4] stroke-neutral-500 fill-[none] translate-y-[5px] translate-x-[5px]"
                            cx="30" cy="30" r="30" stroke-dasharray="190" stroke-dashoffset="0">
                        </circle>
                        @php
                            $average = $details['vote_average'] * 10;
                            $value = 190 - (190 * $average) / 100;
                        @endphp
                        <circle
                            class="w-[70px] h-[70px] stroke-[4] stroke-second fill-[none] translate-y-[5px] translate-x-[5px]"
                            cx="30" cy="30" r="30" stroke-dasharray="190"
                            stroke-dashoffset="{{ $value }}" stroke-linecap="round">
                        </circle>
                    </svg>
                    <div class=" absolute top-0 w-full h-full flex justify-center items-center ">
                        <h2 class="text-sm text-white">{{ $details['vote_average'] * 10 }}<span class="text-xs">%</span>
                        </h2>
                    </div>
                </div>
                <span class="text-white text-lg font-bold ml-1">User<br> Score</span>
            </div>
            <span class="text-xl text-white px-2">{{ $details['tagline'] }}</span>
            <div class="px-2">
                <h2 class="font-bold text-xl text-white">Sypnosis</h2>
                <p class=" text-lg text-white">{{ $details['overview'] }}</p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 px-2 text-lg text-white gap-y-2">
                <?php $count = 0; ?>
                @foreach ($details['credits']['crew'] as $crew)
                    <?php if ($count == 6) {
                        break;
                    } ?>
                    @if ($crew['job'] === 'Director' or $crew['job'] === 'Producer' or $crew['job'] === 'Screenplay')
                        <div class="flex flex-col">
                            <span>{{ $crew['name'] }}</span>
                            <span>{{ $crew['job'] }}</span>
                        </div>
                        <?php $count++; ?>
                    @endif
                @endforeach
            </div>
            <div class="px-2">
                <?php $count2 = 0; ?>
                @foreach ($videos as $video)
                    <?php if ($count2 == 1) {
                        break;
                    } ?>
                    @if ($video['type'] === 'Trailer')
                        <x-modals :source='$video' />
                        <?php $count2++; ?>
                    @endif
                @endforeach

            </div>
        </div>
    </div>
</div>
