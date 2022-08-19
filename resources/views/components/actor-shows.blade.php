@props(['movies', 'link', 'title'])
<div class="swiper mySwiper h-fit relative">
    <div class="swiper-wrapper">
        @foreach ($movies as $recommendation)
            @if (!empty($recommendation['poster_path']))
                <div class="rounded-lg swiper-slide">
                    <a href="/{{ $link }}/{{ $recommendation['id'] }}">
                        <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $recommendation['poster_path'] }}"
                            alt="" class="rounded-t-lg w-full hover:shadow-sm hover:shadow-second ">
                        <div class="  text-second rounded-b-lg h-36 w-full p-2">
                    </a>
                    <a href="/{{ $link }}/{{ $recommendation['id'] }}"><span
                            class="font-bold">{{ $recommendation[$title] }}</span></a><br>
                    <span class="font-bold">{{ $recommendation['character'] }}</span><br>
                </div>
    </div>
    @endif
    @endforeach
</div>
<div class="next-arrow absolute top-[150px]  z-10 right-0"><i
        class="fa-solid fa-chevron-right text-7xl text-second  opacity-50 hover:opacity-100"></i>
</div>
<div class="back-arrow top-[150px] absolute z-10 left-0"><i
        class="fa-solid fa-chevron-left text-7xl text-second  opacity-50 hover:opacity-100"></i></div>
<div class="swiper-pagination"></div>
</div>


<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 6,
        spaceBetween: 20,
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
