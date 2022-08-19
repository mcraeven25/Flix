@props(['details'])

<div class="swiper mySwiper h-[32rem] relative hidden md:block">
    <div class="swiper-wrapper">
        @foreach ($details['credits']['cast'] as $crew)
            @if ($loop->index < 12 && !empty($crew['profile_path']))
                <div class="rounded-lg swiper-slide w-[32rem] flex flex-col items-center">
                    <a href="/actors/{{ $crew['id'] }}">
                        <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $crew['profile_path'] }}" alt=""
                            class="rounded-t-lg w-full hover:shadow-sm hover:shadow-second ">
                    </a>
                    <div class="  text-second rounded-b-lg h-36 w-full p-2">
                        <a href="/actors/{{ $crew['id'] }}">
                            <span class="font-bold">{{ $crew['name'] }}</span><br>
                        </a>
                        <span class=" ">{{ $crew['character'] }}</span>
                    </div>
                </div>
            @endif
        @endforeach

    </div>
    <div class="next-arrow top-[150px] absolute z-10 md:right-[25px] right-0"><i
            class="fa-solid fa-chevron-right text-7xl text-second  opacity-75 hover:opacity-100"></i>
    </div>
    <div class="back-arrow top-[150px] absolute z-10 left-0"><i
            class="fa-solid fa-chevron-left text-7xl text-second  opacity-75 hover:opacity-100"></i></div>
    <div class="swiper-pagination mt-10"></div>
</div>
<div class="grid grid-cols-2 gap-2 md:hidden">
    @foreach ($details['credits']['cast'] as $crew)
        @if ($loop->index < 12 && !empty($crew['profile_path']))
            <div class="rounded-lg swiper-slide w-[32rem] flex flex-col items-center">
                <a href="/actors/{{ $crew['id'] }}">
                    <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $crew['profile_path'] }}" alt=""
                        class="rounded-t-lg w-full hover:shadow-sm hover:shadow-second ">
                </a>
                <div class="  text-second rounded-b-lg md:h-36 w-full p-2">
                    <a href="/actors/{{ $crew['id'] }}">
                        <span class="font-bold">{{ $crew['name'] }}</span><br>
                    </a>
                    <a href="/actors/{{ $crew['id'] }}">
                        <span class=" ">{{ $crew['character'] }}</span>
                    </a>
                </div>
            </div>
        @endif
    @endforeach
</div>


<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 6,
        spaceBetween: 50,
        slidesPerGroup: 6,
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
