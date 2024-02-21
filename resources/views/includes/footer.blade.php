<footer class="flex mb-12 flex-col gap-2 sm:flex-row py-6 w-full shrink-0 lg:items-center px-4 md:px-6 border-t border-zinc-700">
    <div>
        <p class="text-xs flex items-center font-inter text-gray-400">Developed with <span class="h-4 mx-1 w-4 bg-cover" style="background-image: url('https://gabi.work/assets/img/icons/heart.webp');"></span> by&nbsp;<a href="https://gabi.work/" target="_blank" class="hover:underline">Gabi</a>. A&nbsp;<a class="hover:underline" target="_blank" href="https://nebula.cat/">Nebula</a>'s project.</p>
        <p class="text-xs text-zinc-500 font-inter font-regular lg:text-center">Koscraft no es un sitio oficial de Minecraft aprovado por Mojang o Microsoft.</p>
    </div>
    </p>
    <nav class="sm:ml-auto flex gap-4 sm:gap-6">
      <a class="text-xs text-zinc-500 font-inter font-regular hover:underline underline-offset-4" href="#">
        Términos y condiciones
      </a>
      <a class="text-xs text-zinc-500 font-inter font-regular hover:underline underline-offset-4" href="#">
        Política de Privacidad
      </a>
    </nav>
  </footer>

<script>
    function mostrarMenu() {
        document.getElementById("menu-mobil").style.display = "block";
        document.getElementById("mostrar-menu").style.display = "none";
        document.getElementById("amagar-menu").style.display = "block";
    }

    function amagarMenu() {
        document.getElementById("menu-mobil").style.display = "none";
        document.getElementById("mostrar-menu").style.display = "block";
        document.getElementById("amagar-menu").style.display = "none";
    }

    function mostrarLogin() {
        document.getElementById("login-menu").style.display = "flex";
    }

    function amagarLogin() {
        document.getElementById("login-menu").style.display = "none";
    }

    function loginEnrere() {
        document.getElementById("pre-login").style.display = "flex";
        document.getElementById("post-login").style.display = "none";
    }

    function loginSeguent() {
        document.getElementById("pre-login").style.display = "none";
        document.getElementById("post-login").style.display = "flex";
        const nickname = document.getElementById("nickname").value;
        var imageLink = `https://mc-heads.net/avatar/${nickname}/200`;
        document.getElementById("user-login-image").src = imageLink;
    }

</script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
</body>
</html>