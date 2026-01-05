<header class="relative border-b border-zinc-200">

    <div class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between">

        {{-- LOGO / NOME DO BLOG --}}
        <div class="flex items-center gap-4">
            <a href="{{ route('home') }}" class="text-xl md:text-2xl font-serif font-semibold tracking-wide">
                Meu Blog
            </a>

            {{-- Detalhe editorial (desktop) --}}
            <span class="hidden md:inline text-xs uppercase tracking-widest text-zinc-400">
                Leituras & Ideias
            </span>
        </div>

        {{-- BOTÃO HAMBURGUER --}}
        <button id="menuBtn" class="relative w-9 h-9 flex items-center justify-center md:hidden" aria-label="Abrir menu">
            <span class="absolute w-6 h-px bg-zinc-800 transition-all duration-300 -translate-y-2"></span>
            <span class="absolute w-6 h-px bg-zinc-800 transition-all duration-300"></span>
            <span class="absolute w-6 h-px bg-zinc-800 transition-all duration-300 translate-y-2"></span>
        </button>

        {{-- MENU --}}
        <nav id="mainMenu"
            class="
                absolute md:static
                top-full left-0 w-full md:w-auto
                bg-[#f5f1e8] md:bg-transparent
                border-t md:border-0 border-zinc-200
                hidden md:flex
                flex-col md:flex-row
                gap-4 md:gap-8
                px-4 md:px-0
                py-6 md:py-0
                text-sm font-medium
            ">
            <a href="#" class="hover:text-zinc-600 transition">Início</a>
            <a href="#" class="hover:text-zinc-600 transition">Posts</a>
            <a href="#" class="hover:text-zinc-600 transition">Categorias</a>
            <a href="#" class="hover:text-zinc-600 transition">Tags</a>
        </nav>

    </div>
</header>
