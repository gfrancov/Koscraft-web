@include('includes.header')
<body class="bg-zinc-900 min-h-[90vh]">

    @include('includes.nav')

    <section class="mx-5 mt-24 flex justify-center items-center pt-24">

        <div class="w-[680px]">

            <div class="w-full flex justify-between flex-col lg:flex-row items-center">
                <img src="https://mc-heads.net/head/{{$usuario->nickname}}" alt="{{$usuario->nickname}}">
                <div class="text-right">
                    <h1 class=" flex justify-center items-center text-white text-4xl font-semibold font-inter">
                        @switch($usuario->rank)
                        @case('admin')
                            <span class="text-red-700 font-extrabold mr-5 text-3xl">ADMIN</span>
                            @break
                    
                        @case('developer')
                            <span class="text-green-500 font-extrabold mr-5 text-3xl">DEV</span>
                            @break
                    
                        @default
                            <p></p> 
                    @endswitch
                        {{$usuario->nickname}}
                    </h1>
                    <p class="mt-2 text-xs font-regular font-inter text-zinc-400">Último inicio de sesión: {{$usuario->lastLogin}} </p>
                </div>
            </div>

        </div>

    </section>

    <section class="mx-5 flex justify-center items-center pt-12 lg:mb-40">

        <div class="w-[680px] grid grid-cols-1 lg:grid-cols-2 gap-4">

            <ul class="bg-zinc-950 min-h-[30vh] rounded-3xl p-5">
                <li class="mb-5">
                    <h2 class="text-xl text-white font-semibold font-inter">Datos:</h2>
                </li>
                <li class="text-zinc-500 font-extrabold font-inter capitalize">{{$usuario->timeplayed}}</li>
                <li class="text-zinc-500 font-extrabold font-inter capitalize">{{$usuario->points}} Puntos canjeables</li>
                <li class="text-zinc-500 font-extrabold font-inter capitalize">{{$usuario->premiosReclamados}} Premios reclamados</li>
            </ul>

            <ul class="bg-zinc-950 min-h-[30vh] rounded-3xl p-5">
                <li class="mb-5">
                    <h2 class="text-xl text-white font-semibold font-inter">Estadísticas:</h2>
                </li>
                <li class="text-zinc-500 font-extrabold font-inter capitalize">{{$usuario->stats['kills']}} Kills</li>
                <li class="text-zinc-500 font-extrabold font-inter capitalize">{{$usuario->stats['deaths']}} Muertes</li>
                <li class="text-zinc-500 font-extrabold font-inter capitalize">{{number_format( $usuario->stats['kdr'], 2, '.', '' )}} KDR</li>
            </ul>

        </div>

    </section>
        @if($rangoUsuarioLog !== null)
            @if ($rangoUsuarioLog == 'developer' || $rangoUsuarioLog == 'admin')
                
        <section class="mx-5 mb-12 flex justify-center items-center pt-12">
            
            <div class="w-[680px] flex justify-center flex-col items-center">
                <h1 class="text-3xl text-white font-bold font-inter mb-3">Panel de administración</h1>
                <div class="mt-5 flex">
                    <a class="text-xl font-inter px-10 py-3 bg-red-600 text-white rounded-3xl mx-3" href="/blog/lista">Editar artículos del blog</a>
                    <a class="text-xl font-inter px-10 py-3 bg-sky-600 text-white rounded-3xl mx-3" href="/gestion">Gestionar premios</a>
                </div>
            </div>

        </section>
            @endif
        @endif

@include('includes.footer')