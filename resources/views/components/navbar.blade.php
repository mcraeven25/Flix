</nav>
<nav class="flex flex-col items-center py-3 md:flex-row lg:px-32 md:px-20">
    <ul class="flex items-center">
        <li class="h-10 md:h-10 md:w-10">
            <a href="/">
                <img class=" h-10 md:h-10 " src="/images/popcorn.svg" alt="popcorn">
            </a>
        </li>
        <li>
            <a href="/">
                <h1 class="text-third text-4xl font-semibold">Flix
                </h1>
            </a>
        </li>
    </ul>
    <ul class="flex gap-x-1 ml-2 text-second w-full items-center mt-2 justify-center md:justify-start">
        <li class="mx-1 my-4 md:my-0">
            <a href="/movies" class="hover:text-third text-xl duration-400 font-bold active:text-third">Movies</a>
        </li>
        <li class="mx-1 my-4 md:my-0">
            <a href="/tv" class="hover:text-third text-xl duration-400 font-bold">TV Shows
            </a>
        </li>
        <li class="mx-1 my-4 md:my-0">
            <a href="/actors" class="hover:text-third text-xl duration-400 font-bold">People</a>
        </li>
    </ul>
    <livewire:search-dropdown>
</nav>



<script>
    function Menu(e) {
        const list = document.querySelector('.items');

        if (e.classList.contains("fa-bars")) {
            e.classList.remove("fa-bars");
            e.classList.add("fa-close");


            list.classList.add('right-[0]');
            list.classList.add('opacity-100')
        } else {
            e.classList.add("fa-bars");
            e.classList.remove("fa-close");
            list.classList.remove('right-[0]');
            list.classList.remove('opacity-100')
            e.classList.remove("fixed");
            e.classList.remove("right-3");
        }

    }
</script>
