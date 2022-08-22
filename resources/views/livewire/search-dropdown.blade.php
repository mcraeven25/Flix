<div class="w-full  flex justify-center md:justify-end relative">
    <form action="" class=" ">
        <div class="relative ">
            <input wire:model.debounce.500ms="search" type="text"
                class="bg-white rounded-full md:w-[32-rem] sm:w-52 w-80 px-2 pl-8 py-1" placeholder="Search">
            <div class="absolute top-0">
                <i class="fa-solid fa-magnifying-glass mt-2 ml-2"></i>
            </div>
        </div>
    </form>
    @if (strlen($search) > 2)
        <div class="absolute bg-gray-900 w-80 mt-10 rounded z-20  md:w-[32-rem] sm:w-52 ">
            @if ($searchResults->count() > 0)
                <ul class="text-white">
                    @foreach ($searchResults as $result)
                        @if ($result['media_type'] === 'movie')
                            <a href="/movies/{{ $result['id'] }}">
                                <li class="border-b border-gray-700 p-3 hover:bg-gray-600 flex items-center">
                                    <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $result['poster_path'] }}"
                                        alt="" class="w-24">
                                    <span class="ml-2">{{ $result['title'] }}</span>
                                </li>
                            </a>
                        @elseif($result['media_type'] === 'tv')
                            <a href="/tv/{{ $result['id'] }}">
                                <li class="border-b border-gray-700 p-3 hover:bg-gray-600">
                                    {{ $result['name'] }}

                                </li>
                            </a>
                        @endif
                    @endforeach
                </ul>
            @else
                <div class="px-3 py-3">No Results</div>
            @endif

        </div>
    @endif


</div>
