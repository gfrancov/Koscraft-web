@include('includes.header')
<body class="flex justify-center items-center bg-zinc-900 min-h-[90vh]">

    <section class="bg-zinc-200/10 rounded-3xl py-24 px-32 lg:mx-52 mt-16">

        <div class="w-auto">
    

            <form action="{{route('user.login')}}" method="POST">
                @csrf
                <div class="flex flex-col items-center justify-center">
                    <input type="hidden" name="nickname" id="nickname" value="{{$username}}">
                    <img class="hover:scale-110 w-28 rounded-xl" src="https://mc-heads.net/avatar/{{$username}}/200" alt="{{$username}}">
                    <p class="my-5 font-inter px-2 py-1 bg-zinc-200/10 rounded-xl">Usa el comando <code class="font-minecraft text-lime-600">/entrar</code> en el servidor para conseguir el token</p>
                    <input type="text" class="hover:scale-110 py-3 px-5 rounded-xl font-inter" name="token" id="token" placeholder="Token">
                    @isset($errors)
                        <p class="text-red-500 text-sm">{{$errors}}</p>
                    @endisset
                    <input class="hover:scale-110 mt-5 bg-sky-700 cursor-pointer text-white rounded-xl px-5 py-2 font-inter" type="submit" value="Entrar">
                </div>
            </form>

        </div>

    </section>

</body>
</html>