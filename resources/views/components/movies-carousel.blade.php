@props(['movies', 'genres', 'file', 'date', 'link'])

<div class="swiper mySwiper h-[28rem] relative">
    <div class="swiper-wrapper">
        @foreach ($movies as $movie)
            <div class="swiper-slide flex flex-col items-center md:block">
                <div class="relative ">
                    <div class="mt-10">
                        <a href="{{ $link }}/{{ $movie['id'] }}">
                            <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'] }}" alt=""
                                class="h-64 hover:shadow hover:shadow-second">
                        </a>
                    </div>
                    <div class="absolute bottom-[-25px] left-1 w-[50px] h-[50px] bg-neutral-900 rounded-full">
                        <svg class="relative w-[50px] h-[50px]">
                            <circle
                                class="w-[50px] h-[50px] stroke-[2] stroke-neutral-500 fill-[none] translate-y-[5px] translate-x-[5px]"
                                cx="20" cy="20" r="20" stroke-dasharray="125"
                                stroke-dashoffset="0">
                            </circle>
                            @php
                                $average = $movie['vote_average'] * 10;
                                $values = 125 - (125 * $average) / 100;
                                $value = floor($values);
                            @endphp
                            <circle
                                class="w-[50px] h-[50px] stroke-[3] stroke-second fill-[none] translate-y-[5px] translate-x-[5px]"
                                cx="20" cy="20" r="20" stroke-dasharray="125"
                                stroke-dashoffset="{{ $value }}" stroke-linecap="round">
                            </circle>
                        </svg>
                        <div class="absolute top-0 left-0 w-full h-full flex justify-center items-center ">
                            <h2 class="text-sm text-white">{{ $movie['vote_average'] * 10 }}<span
                                    class="text-xs">%</span></h2>
                        </div>
                    </div>

                </div>
                <div class="mt-2 relative top-5 text-second flex flex-col ">
                    <a href="{{ $link }}/{{ $movie['id'] }}">
                        <span class="text-second leading-6 hover:text-third">{{ $movie[$file] }}</span>
                    </a>
                    <span class="text-sm leading-6">{{ Carbon\Carbon::parse($movie[$date])->format('M d, Y') }}</span>
                    <div class="text-xs leading-6">
                        @foreach ($movie['genre_ids'] as $genre)
                            @if (!$loop->last)
                                <span>
                                    {{ $genres->get($genre) }},&nbsp;
                                </span>
                            @else
                                <span>
                                    {{ $genres->get($genre) }}
                                </span>
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>
        @endforeach

    </div>
    <div class="next-arrow top-[150px] absolute z-10 md:right-[25px] right-0"><i
            class="fa-solid fa-chevron-right text-7xl text-second  opacity-75 hover:opacity-100"></i>
    </div>
    <div class="back-arrow top-[150px] absolute z-10 left-0"><i
            class="fa-solid fa-chevron-left text-7xl text-second  opacity-75 hover:opacity-100"></i></div>
    <div class="swiper-pagination "></div>
</div>


<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 5,
        spaceBetween: 50,
        slidesPerGroup: 5,
        loop: true,
        loopFillGroupWithBlank: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },

        navigation: {
            nextEl: ".next-arrow",
            prevEl: ".back-arrow",
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
                slidesPerGroup: 1,

            },
            520: {
                slidesPerView: 3,
                slidesPerGroup: 3,
            },
            900: {
                slidesPerView: 5,
                slidesPerGroup: 5,
            }
        }
    });
</script>
