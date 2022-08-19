@props(['images'])
<div class="md:h-[40rem] h-fit">
    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
        class="swiper mySwiper2 md:h-[80%] w-96 md:w-full h-fit">
        <div class="swiper-wrapper md:h-[80%] md:w-full">
            @foreach ($images as $image)
                @if ($loop->index < 20 && !empty($image['file_path']))
                    <div class="swiper-slide w-full ">
                        <img src="{{ 'https://image.tmdb.org/t/p/original/' . $image['file_path'] }}" alt=""
                            class="md:w-full  md:h-full w-96 h-fit">
                    </div>
                @endif
            @endforeach
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
    <div thumbsSlider="" class="swiper mySwiper1 hidden md:block  h-[20%]">
        <div class="swiper-wrapper">
            @foreach ($images as $image)
                @if ($loop->index < 20 && !empty($image['file_path']))
                    <div class="swiper-slide">
                        <img src="{{ 'https://image.tmdb.org/t/p/original/' . $image['file_path'] }}" alt=""
                            class="h-full w-full">
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper1", {
        loop: true,
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
    });
    var swiper2 = new Swiper(".mySwiper2", {
        loop: true,
        spaceBetween: 10,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        thumbs: {
            swiper: swiper,
        },
    });
</script>
</body>

</html>
