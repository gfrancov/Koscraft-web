@include('includes.header')
<body class="bg-zinc-900 min-h-[90vh]">

    @include('includes.nav')

    <section class="text-center flex justify-center flex-col items-center mt-12 pt-24 mx-5 lg:mx-52">
        
        <h2 class="font-inter text-white font-bold text-3xl mb-3">Premios disponibles</h2>
        <div class="w-[680px] flex justify-center items-center flex-col w-full mt-10">
            @foreach($premios as $premio)

                <div class="bg-zinc-950 px-5 py-2 rounded-xl mb-2 w-full flex justify-between">
                    <p class="text-zinc-300 font-inter text-lg font-light"> <span class="font-bold text-white">{{$premio->titulo}}</span> ( {{$premio->descripcion}} )</p>
                    <div class="flex justify-center items-center">
                        <a class="cursor-pointer" onclick="confirmarBorrar({{$premio->id}})">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-white mr-3" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"/></svg>
                        </a>
                    </div>
                </div>

            @endforeach
        </div>

    </section>

    <section class="mt-12 pt-10 mb-12 mx-5 lg:mx-52">
        
        <form action="{{route('puntos.crearPremio')}}" method="POST">
            @csrf
            <h2 class="font-inter text-white font-bold text-3xl mb-3">Crear nuevo premio</h2>
            <div class="flex flex-col">
                <input class="mb-2 bg-zinc-900 text-white border-2 rounded-xl border-zinc-700 font-inter px-4 py-1" type="text" id="imageURL" name="imageURL" placeholder="URL de imagen">
                <input class="mb-2 bg-zinc-900 text-white border-2 rounded-xl border-zinc-700 font-inter px-4 py-1" type="text" id="titulo" name="titulo" placeholder="Titulo">
                <input class="mb-2 bg-zinc-900 text-white border-2 rounded-xl border-zinc-700 font-inter px-4 py-1" type="number" id="precio" name="precio" placeholder="Precio">
                <input class="mb-2 bg-zinc-900 text-white border-2 rounded-xl border-zinc-700 font-inter px-4 py-1" type="text" id="descripcion" name="descripcion" placeholder="Descripción (qué contiene el premio?)">
                <input class="mb-2 bg-zinc-900 text-white border-2 rounded-xl border-zinc-700 font-inter px-4 py-1" type="text" id="permisoLP" name="permisoLP" placeholder="Permiso">
            </div>
            <input value="Crear" class="px-4 py-2 bg-sky-700 text-white font-inter font-bold rounded-xl" type="submit">

        </form>

    </section>

    <div id="confirmation-erase" class="z-70 top-0 backdrop-blur w-full h-[100vh] fixed flex items-center justify-center hidden">

        <div class="bg-zinc-800/60 flex flex-col rounded-3xl h-[] w-full lg:w-[30vw] p-5 lg:mx-52">
        
            <div class="flex z-40 justify-between w-full">
                <div></div>
                <button onclick="amagarConfirmacion()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-black" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
                </button>
            </div>
        
            <div class="w-auto h-[14vw] flex justify-center items-center mt-6 mb-10">
                <form action="{{route('puntos.borrarPremio')}}" method="POST">
                    @csrf
                    <input type="hidden" value="" id="premio-borrar" name="premio-borrar">
                    <div class="flex justify-center items-center flex-col">
                        <p class="text-white font-inter text-xl text-center font-semibold mb-5">¿Seguro que quieres borrarlo?</p>
                        <input type="submit" class="bg-red-600 px-6 py-2 rounded-xl text-white text-lg font-semibold cursor-pointer" value="Confirmar">
                    </div>
                </form>
        
            </div>
        
        </div>
        
    </div>
        

    <script>

        function confirmarBorrar(getIdBorrar) {
            document.getElementById("confirmation-erase").style.display = "flex";
            document.getElementById('premio-borrar').value = getIdBorrar;
        }
    
        function amagarConfirmacion() {
            document.getElementById("confirmation-erase").style.display = "none";
        }
    
    </script>
@include('includes.footer')