@include('includes.header')
<body class="bg-zinc-900 min-h-[90vh]">

    @include('includes.nav')

    <section class="lg:mx-52 mb-12 min-h-[90vh]">

        <div class="mx-4 lg:mx-0 pt-24 mb-12 grid grid-cols-1 lg:grid-cols-3 gap-6">

            <div class="lg:col-span-3 bg-black px-10 py-8 text-white flex justify-between lg:items-center flex-col lg:flex-row rounded-3xl">
                <div>
                    <h2 class="font-inter text-3xl text-white font-bold">¿Quieres entrar al servidor?</h2>
                    <p class="font-inter text-xl text-zinc-400 font-bold">¡Copia la IP y entra al servidor de Minecraft!</p>
                </div>
                <div class="lg:mt-0 mt-6">
                    <p onclick="navigator.clipboard.writeText('mc.koscraft.es')" class="cursor-pointer hover:scale-110 font-inter text-3xl lg:text-5xl text-yellow-500 font-bold">mc.koscraft.es</p>
                </div>
            </div>

            <div class="lg:col-span-2 h-[40vh] lg:h-auto row-span-2 p-6 bg-[url('/img/spawn.png')] bg-cover rounded-3xl bg-center">
                &nbsp;
            </div>
            
            <div class="rounded-3xl px-10 py-6 bg-black text-white">
                <h1 class="text-white font-inter mb-5 font-bold text-2xl">Top jugadores</h1>
                @foreach ($users as $user)
                    <a href="/perfil/{{$user->nickname}}" class="flex mb-4">
                        <img src="https://mc-heads.net/head/{{$user->nickname}}/50">
                        <div class="flex flex-col justify-center ml-4">
                            <p class="text-md font-inter text-white font-bold">{{$user->nickname}}</p>
                            <p class="text-sm font-inter font-light text-zinc-200">{{$user->points}} puntos</p>
                        </div>
                    </a>
                @endforeach

            </div>

            @foreach($posts as $post)

            <a href="/articulo/{{$post->id}}">
                <div class="rounded-3xl p-5 mb-2 flex bg-cover bg-center py-6 h-[20vh] lg:h-[35vh] hover:scale-105" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.6)), url('{{$post->imageURL}}');"> 
                    <h3 class="font-inter text-white font-bold text-2xl lg:text-4xl">{{$post->titulo}}</h3>
                </div>
            </a>

        @endforeach



        </div>
        

    </section>

   {{--  <section class="h-[100vh] w-full flex justify-center items-center bg-cover bg-center bg-[url('/img/spawn.png')]">

        <h1 class="text-white font-inter font-bold text-6xl">KosCraft</h1>

    </section> --}}

{{--     <section class="mt-12 pt-24 flex justify-center flex-col items-center">

        <h2 class="text-white font-bold text-4xl font-inter">Últimas noticias</h2>

        <div class="w-[100vw] lg:w-[70vw] grid grid-cols-1 lg:grid-cols-3 gap-3 w-full mt-10">
            @foreach($posts as $post)

                <a href="/articulo/{{$post->id}}">
                    <div class="rounded-3xl p-5 mb-2 flex justify-center items-center bg-cover bg-center py-6 lg:h-[35vh] hover:scale-105" style="background-image: linear-gradient(to top, rgba(0, 0, 0, 1), rgba(0, 0, 0, 0.6)), url('{{$post->imageURL}}');"> 
                        <h3 class="text-white text-center font-bold text-2xl">{{$post->titulo}}</h3>
                    </div>
                </a>

            @endforeach
        </div>

    </section> --}}

{{--     <section class="my-10 py-16 bg-black">

        <div class="mx-5 lg:mx-52 flex justify-center items-center flex-col">
            <h2 class="text-white font-bold text-3xl font-inter mb-2">Top 3 jugadores</h2>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                @foreach ($users as $user)
                    <a href="/perfil/{{$user->nickname}}" class="shadow-[0_0px_25px_-15px_rgba(255,185,0,1)] hover:scale-110 w-full p-5 flex flex-col justify-center items-center rounded-3xl bg-zinc-800/75">
                        <p class="w-full font-inter text-white text-3xl font-extrabold text-left -mb-2">#{{$loop->index + 1}}</p>
                        <img src="https://mc-heads.net/head/{{$user->nickname}}/120" alt="Cabeza de {{$user->nickname}}">
                        <p class="mt-2 text-white text-xl font-inter font-semibold">{{$user->nickname}} <span class="text-m text-zinc-400 font-light">({{$user->points}} puntos)</span></p>
                        <p class="text-sm font-inter text-zinc-400 font-light">{{$user->timeplayed}}</p>
                    </a>
                @endforeach
            </div>
        </div>

    </section>
 --}}

@include('includes.footer')