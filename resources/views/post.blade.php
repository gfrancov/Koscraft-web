@include('includes.header')
<body class="bg-zinc-900 min-h-[90vh]">

    @include('includes.nav')

    <section class="mx-5 mt-24 pt-24 lg:mx-52 flex justify-center flex-col items-center">
        <h1 class="text-white font-inter text-5xl font-bold mb-4">{{$post->titulo}}</h1>
        <img class="w-[80vw] lg:w-[50vw] rounded-3xl" src="{{$post->imageURL}}" alt="">
        <div class="lg:w-[40vw] flex flex-col my-5">
            <a href="/perfil/{{$post->nicknameAuthor}}" class="flex items-center justify-items-start">
                <img class="rounded-xl mr-3 hover:scale-125" src="https://mc-heads.net/avatar/{{$post->nicknameAuthor}}/40" alt="">
                <div>
                    <p class="font-inter text-sm text-zinc-400 font-light leading-4 mb-0">Publicación escrita por:</p>
                    <p class="text-white font-inter text-xl font-semibold leading-5">{{$post->nicknameAuthor}}</p>
                </div>
            </a>
        </div>
        <div class="my-12 w-full font-inter text-white lg:w-[680px] prose-xl prose-invert">
            {!! $post->contenido !!}
        </div>
    </section>

@include('includes.footer')