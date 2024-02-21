<nav class="fixed top-0 left-0 w-full z-30">
    <div class="bg-zinc-950/80 backdrop-blur-md h-[50px]">
        <ul class="justify-between items-center hidden md:flex h-[50px] mx-5 lg:mx-52">
            <li class="py-2 pr-4"><a class="flex justify-center items-center" href="/">
                <img class="w-12 mr-2" src="/img/koscraft.png" alt="Koscraft">
                <span class="text-white font-inter text-lg font-semibold">Koscraft</span></a></li>
            <li class="px-4 py-2"><a class="font-inter text-md text-zinc-400 hover:text-white" href="/">Inicio</a></li>
            <li class="px-4 py-2"><a class="font-inter text-md text-zinc-400 hover:text-white" href="/premios">Premios</a></li>
            <li class="px-4 py-2"><a class="font-inter text-md text-zinc-400 hover:text-white" href="/puntos">Puntos</a></li>
            <li class="px-4 py-2"><a class="font-inter text-md text-zinc-400 hover:text-white" href="https://tienda.koscraft.es">Tienda</a></li>
            <li class="px-4 py-2"><a class="font-inter text-md text-zinc-400 hover:text-white" href="https://discord.gg/KFB3ukCQCB">Discord</a></li>

            @auth
                <li>
                    <a class="flex" href="/perfil/{{auth()->user()->nickname}}">
                        <img class="w-6 hover:scale-125 rounded-md mr-3" src="https://mc-heads.net/avatar/{{auth()->user()->nickname}}/40" alt="{{auth()->user()->nickname}}">
                        <p class="text-white font-semibold  text-lg font-inter">Perfil</p>
                    </a>
                </li>
            @endauth
            @guest
            <li class="px-4 py-2"><a class="hover:scale-150 font-inter text-sm bg-sky-800/75 hover:bg-sky-700 px-4 py-1.5 rounded-3xl text-white cursor-pointer" onclick="mostrarLogin()">Entrar</a></li>
            @endguest
        </ul>
        <div class="md:hidden mx-5 flex justify-between px-4 py-2"><a class="flex justify-center items-center group" href="/"><img class="w-7 mr-2" src="/img/koscraft.png" alt="Koscraft"><span class="text-white text-lg font-inter font-bold">Koscraft</span></a><button onclick="mostrarMenu()" aria-label="Show menu" id="mostrar-menu"><svg xmlns="http://www.w3.org/2000/svg" class="fill-zinc-400 hover:fill-zinc-200" height="1em" viewBox="0 0 448 512">
            <path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z">
            </path>
            </svg></button><button onclick="amagarMenu()" aria-label="Hide menu" id="amagar-menu" class="hidden"><svg xmlns="http://www.w3.org/2000/svg" class="fill-zinc-400 hover:fill-zinc-200" height="1em" viewBox="0 0 384 512">
            <path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z">
            </path>
            </svg></button></div>
    </div>
    <div id="menu-mobil" class="hidden min-h-[100vh] backdrop-blur-sm">
        <div class="bg-zinc-950/80 backdrop-blur-md">
        <ul class="mx-5 py-4">
            <a class="" href="/">
                <li class="text-white font-inter px-4 py-2 text-lg">Inicio</li>
            </a>
            <a class="" href="/premios">
                <li class="text-white font-inter px-4 py-2 text-lg">Premios</li>
            </a>
            <a class="" href="/puntos">
                <li class="text-white font-inter px-4 py-2 text-lg">Puntos</li>
            </a>
            <a class="" href="https://tienda.koscraft.es">
                <li class="text-white font-inter px-4 py-2 text-lg">Tienda</li>
            </a>
            <a class="" href="https://discord.gg/KFB3ukCQCB">
                <li class="text-white font-inter px-4 py-2 text-lg">Discord</li>
            </a>
            @auth
            <a class="" href="/perfil/{{auth()->user()->nickname}}">
                <li class="text-white font-inter font-bold px-4 py-2 text-lg">Perfil</li>
            </a>
            @endauth
            @guest
                <li onclick="mostrarLogin()" class="text-white font-inter px-4 py-2 text-lg">Entrar</li>
            @endguest
        </ul>
        </div>
    </div>
</nav>

<div id="login-menu" class="pb-24 z-30 backdrop-blur w-full h-[100vh] fixed flex items-center justify-center hidden">

<div class="bg-zinc-800/60 flex flex-col rounded-3xl h-[] w-full lg:w-[30vw] p-5 lg:p-5 lg:mx-52">

    <div class="flex z-40 justify-between w-full">
        <div></div>
        <button onclick="amagarLogin()">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-orange-800 mr-1" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
        </button>
    </div>

    <div class="w-auto h-[14vw] py-24 flex justify-center items-center mt-6 mb-10">
        <form action="{{route('user.login')}}" method="POST">
            @csrf
            <div id="pre-login" class="flex flex-col items-center justify-center">
                <h2 class="text-center text-white font-inter text-3xl font-extrabold mb-4">Inicia sesión</h2>
                <input type="text" class="py-3 px-5 rounded-xl font-inter" name="nickname" id="nickname" placeholder="Nombre de usuario">
                <p id="boton-enviar" class="hover:scale-110 mt-5 bg-sky-700 cursor-pointer text-white rounded-xl px-5 py-2 font-inter text-center" onclick="loginSeguent()" type="button">Siguiente</p>
            </div>
            <div id="post-login" class="flex flex-col items-center justify-center hidden">
                <img class="hover:scale-110 w-20 rounded-xl" id="user-login-image" src="">
                <p class="my-5 font-inter px-2 py-1 bg-zinc-200/10 text-md text-center rounded-xl">Usa el comando <code class="font-minecraft text-lime-600">/entrar</code> en el servidor para conseguir el token</p>
                <input type="text" class="hover:scale-110 py-3 px-5 rounded-xl font-inter" name="token" id="token" placeholder="Token">
                <input type="submit" class="hover:scale-110 mt-5 bg-sky-700 cursor-pointer text-white rounded-xl px-5 py-2 font-inter text-center" value="Entrar">
                <p onclick="loginEnrere()" class="text-xs text-white flex justify-center font-inter items-center hover:underline mt-2 mr-1 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-white w-1.5 mr-1 mb-0.5 " viewBox="0 0 320 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"/></svg>
                    Volver atrás
                </p>
            </div>
        </form>

    </div>

</div>

</div>

@auth
<div class="fixed bottom-0 right-0">
    <a href="/cerrar" class="hover:scale-110 bg-red-700 rounded-xl text-white flex justify-center items-center font-inter font-bold text-md m-5 px-5 py-2">
        Cerrar sesión
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-white ml-3" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/></svg>
    </a>
</div>
@endauth