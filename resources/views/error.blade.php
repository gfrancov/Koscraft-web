@include('includes.header')
<body class="bg-black flex flex-col justify-center items-center min-h-[100vh]">

    @include('includes.nav')

    <section class="mb-10 pt-24 py-24 bg-black min-h-[85vh]">

        <div class="mx-5 pt-32 lg:mx-52 flex justify-center items-center flex-col">
            <img class="w-24 mb-12" src="/img/icon-sad.webp" alt="Triste">
            <h2 class="text-white font-bold text-4xl font-inter mb-2"> {{$titulo}} </h2>
            <p style="text-wrap:balance;" class="lg:max-w-[50vw] text-center text-white font-regular font-inter text-lg mb-8"> {{$mensaje}} </p>
            <a class="text-lg font-inter font-semibold text-white px-10 py-3 bg-red-600 hover:bg-red-800 rounded-3xl" href="{{$link}}">Volver</a>
        </div>

    </section>


@include('includes.footer')