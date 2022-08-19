@props(['source'])

<button type="button" data-modal-target="#modal"
    class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none 
                            focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-10 py-2.5 
                            text-center mr-2 mb-2"><i
        class="fa-solid fa-play mr-2"></i>Play Trailer</button>

<div id="modal"
    class="bg-white w-9/12 h-[44rem] z-10 fixed -translate-x-1/2 -translate-y-1/2 
    left-1/2 top-1/2 scale-0 ease-in-out duration-200 mb-2 modal">
    <div id="modal-header" class="bg-black  p-3 flex justify-between">
        <div class="text-white text-3xl"> Trailer</div>
        <button data-close-button class="text-white text-3xl">&times;</button>
    </div>
    <iframe id="video" class="w-full h-full hidden" src="https://youtube.com/embed/{{ $source['key'] }}"
        frameborder="0" allowfullscreen>
    </iframe>

</div>
<div id="overlay" class=" inset-0 bg-neutral-900 opacity-75 active:pointer-events-none ease-in-out duration-200">
</div>
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
    integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
<script>
    const openModal = document.querySelectorAll('[data-modal-target]')
    const closeModal = document.querySelectorAll('[data-close-button]')
    const overlay = document.getElementById('overlay')



    function stopVideo() {
        $("#video")[0].pause();

    }


    openModal.forEach(button => {
        button.addEventListener('click', () => {
            const modal = document.querySelector(button.dataset.modalTarget)
            openModalFunction(modal)
        })
    })

    closeModal.forEach(button => {
        button.addEventListener('click', () => {
            const modal = button.closest('.modal')
            closeModalFunction(modal)
        })
    })

    const openModalFunction = (modal) => {
        modal.classList.add('fixed')
        modal.classList.remove('scale-0')
        overlay.classList.add('fixed')
        modal.classList.add('scale-200')
        video.classList.remove('hidden')
        video.classList.add('block')
    }
    const closeModalFunction = (modal) => {
        modal.classList.remove('fixed')
        modal.classList.add('scale-0')
        overlay.classList.remove('fixed')
        modal.classList.remove('scale-200')
        video.classList.add('hidden')
        video.classList.remove('block')
        $("iframe").each(function() {
            var src = $(this).attr('src');
            $(this).attr('src', src);
        });
    }
</script>
