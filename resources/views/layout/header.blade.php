<header class="bg-gray-900 fixed top-0 w-full z-50 ">
    <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
        <div class="flex lg:flex-1">
            <a href="#" class="-m-1.5 p-1.5">
                <span class="sr-only">Your Company</span>
                <img class="h-8 w-auto" src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/19/Atlus_logo_%282014%29.svg/1200px-Atlus_logo_%282014%29.svg.png" alt="">
            </a>
        </div>
        <div class="flex lg:hidden">
            <button id="menu-button" type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-400">
                <span class="sr-only">Open main menu</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>
        <div class="hidden lg:flex lg:gap-x-12">
            <a href="/" class="text-sm font-semibold leading-6 text-white">Home</a>
            <a href="/films" class="text-sm font-semibold leading-6 text-white">Films</a>
            <a href="/games" class="text-sm font-semibold leading-6 text-white">Videogames</a>
        </div>
        <div class="hidden lg:flex lg:flex-1 lg:justify-end">
            <a href="#" class="text-sm font-semibold leading-6 text-white">Log in <span aria-hidden="true">&rarr;</span></a>
        </div>
    </nav>
    <!-- Mobile menu, show/hide based on menu open state. -->
    <div id="mobile-menu" class="hidden lg:hidden" role="dialog" aria-modal="true">
        <!-- Background backdrop, show/hide based on slide-over state. -->
        <div class="fixed inset-0 z-10"></div>
        <div class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-gray-900 px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-white/10">
            <div class="flex items-center justify-between">
                <a href="#" class="-m-1.5 p-1.5">
                    <span class="sr-only">Your Company</span>
                    <img class="h-8 w-auto" src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/19/Atlus_logo_%282014%29.svg/1200px-Atlus_logo_%282014%29.svg.png" alt="">
                </a>
                <button id="close-button" type="button" class="-m-2.5 rounded-md p-2.5 text-gray-400">
                    <span class="sr-only">Close menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="mt-6 flow-root">
                <div class="-my-6 divide-y divide-gray-500/25">
                    <div class="space-y-2 py-6">
                        <a href="/home" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-white hover:bg-gray-800">Home</a>
                        <a href="/films" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-white hover:bg-gray-800">Films</a>
                        <a href="/games" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-white hover:bg-gray-800">Videogames</a>
                    </div>
                    <div class="py-6">
                        <a href="#" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-white hover:bg-gray-800">Log in</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<script>
    // Selecciona el botó per obrir i tancar el menú
    const menuButton = document.querySelector('#menu-button');
    const mobileMenu = document.querySelector('#mobile-menu');
    const closeButton = document.querySelector('#close-button');

    // Funció per obrir el menú
    function openMenu() {
        mobileMenu.classList.remove('hidden'); // Elimina la classe 'hidden'
        mobileMenu.classList.add('flex');       // Afegeix la classe 'flex'
    }

    // Funció per tancar el menú
    function closeMenu() {
        mobileMenu.classList.add('hidden');      // Afegeix la classe 'hidden'
        mobileMenu.classList.remove('flex');     // Elimina la classe 'flex'
    }

    // Assigna l'esdeveniment de clic al botó d'obertura
    menuButton.addEventListener('click', openMenu);
    // Assigna l'esdeveniment de clic al botó de tancament
    closeButton.addEventListener('click', closeMenu);
</script>
