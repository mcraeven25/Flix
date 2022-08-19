<x-layout>
    <div class="md:px-32 py-10 px-5">
        <h2 class="text-3xl text-third mb-5">Popular People</h2>
        <div class="grid md:grid-cols-5 grid-cols-2 gap-5">

            @foreach ($actors as $actor)
                @if (!empty($actor['profile_path']))
                    <div class="">
                        <a href="actors/{{ $actor['id'] }}">
                            <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $actor['profile_path'] }}" alt=""
                                class=" w hover:shadow-sm hover:shadow-second ">
                        </a>
                        <div class="  text-second rounded-b-lg  p-2">
                            <span class="font-bold">{{ $actor['name'] }}</span><br>

                        </div>
                    </div>
                @endif
            @endforeach

        </div>
    </div>
</x-layout>
