@include('includes.header')
<body class="bg-zinc-900 min-h-[90vh]">

    @include('includes.nav')

    <section class="mt-12 py-5 bg-green-700">
        <div class="mx-5 lg:mx-52 flex justify-between items-center">
            <div class="font-inter flex justify-center items-center text-white font-semibold text-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-white mr-3" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/></svg>
                <p>{{$hours}} horas jugadas</p>
            </div>
            <div class="font-inter flex justify-center items-center text-white font-semibold text-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-white mr-3" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M512 80c0 18-14.3 34.6-38.4 48c-29.1 16.1-72.5 27.5-122.3 30.9c-3.7-1.8-7.4-3.5-11.3-5C300.6 137.4 248.2 128 192 128c-8.3 0-16.4 .2-24.5 .6l-1.1-.6C142.3 114.6 128 98 128 80c0-44.2 86-80 192-80S512 35.8 512 80zM160.7 161.1c10.2-.7 20.7-1.1 31.3-1.1c62.2 0 117.4 12.3 152.5 31.4C369.3 204.9 384 221.7 384 240c0 4-.7 7.9-2.1 11.7c-4.6 13.2-17 25.3-35 35.5c0 0 0 0 0 0c-.1 .1-.3 .1-.4 .2l0 0 0 0c-.3 .2-.6 .3-.9 .5c-35 19.4-90.8 32-153.6 32c-59.6 0-112.9-11.3-148.2-29.1c-1.9-.9-3.7-1.9-5.5-2.9C14.3 274.6 0 258 0 240c0-34.8 53.4-64.5 128-75.4c10.5-1.5 21.4-2.7 32.7-3.5zM416 240c0-21.9-10.6-39.9-24.1-53.4c28.3-4.4 54.2-11.4 76.2-20.5c16.3-6.8 31.5-15.2 43.9-25.5V176c0 19.3-16.5 37.1-43.8 50.9c-14.6 7.4-32.4 13.7-52.4 18.5c.1-1.8 .2-3.5 .2-5.3zm-32 96c0 18-14.3 34.6-38.4 48c-1.8 1-3.6 1.9-5.5 2.9C304.9 404.7 251.6 416 192 416c-62.8 0-118.6-12.6-153.6-32C14.3 370.6 0 354 0 336V300.6c12.5 10.3 27.6 18.7 43.9 25.5C83.4 342.6 135.8 352 192 352s108.6-9.4 148.1-25.9c7.8-3.2 15.3-6.9 22.4-10.9c6.1-3.4 11.8-7.2 17.2-11.2c1.5-1.1 2.9-2.3 4.3-3.4V304v5.7V336zm32 0V304 278.1c19-4.2 36.5-9.5 52.1-16c16.3-6.8 31.5-15.2 43.9-25.5V272c0 10.5-5 21-14.9 30.9c-16.3 16.3-45 29.7-81.3 38.4c.1-1.7 .2-3.5 .2-5.3zM192 448c56.2 0 108.6-9.4 148.1-25.9c16.3-6.8 31.5-15.2 43.9-25.5V432c0 44.2-86 80-192 80S0 476.2 0 432V396.6c12.5 10.3 27.6 18.7 43.9 25.5C83.4 438.6 135.8 448 192 448z"/></svg>
                {{ auth()->user()->points }} puntos
            </div>
        </div>
    </section>

    <section class="mb-10 py-16 bg-black min-h-[80vh]">

        <div class="mx-5 lg:mx-52 flex justify-center items-center flex-col">
            <h2 class="text-white font-bold text-5xl font-inter mb-5">Puntos</h2>
            <p style="text-wrap:balance;" class="text-white font-inter font-regular leading-5 text-lg text-center lg:w-[680px]">Aquí puedes canjear puntos por las horas de juego, con los que podrás conseguir premios para el Survival</p>
            <div class="mt-10 grid grid-cols-1 lg:grid-cols-4 gap-6">
                @foreach ($canjeos as $canjeo)

                    <a href="/reclamar/{{$canjeo->id}}" class=" flex justify-center items-center flex-col  hover:scale-110 bg-zinc-800 rounded-3xl p-5">

                        <img src="{{$canjeo->imageURL}}" class="rounded-3xl w-52 " alt="">
                        <div class="text-left mt-4">
                            <h2 class="text-white font-inter font-semibold text-3xl">{{$canjeo->nombre}}</h2>
                            <p class="text-zinc-500 font-inter text-xl text-light">Horas necesarias: <span class="font-bold">{{$canjeo->horas}}h</span></p>
                            <p class="text-zinc-500 font-inter text-xl text-light">Puntos: <span class="font-bold">{{$canjeo->cantidad}}</span></p>
                        </div>

                    </a>
                    
                @endforeach
            </div>
        </div>

    </section>


@include('includes.footer')