<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'Meu Blog')</title>
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Arizonia&family=Comforter+Brush&family=Italianno&display=swap"
            rel="stylesheet">
        <style>
            .logo-font {
                font-family: "Arizonia", cursive;
                font-weight: 400;
                font-style: normal;
            }
        </style>

        @vite(['resources/css/web/templates/default/app.css', 'resources/js/web/default/app.js'])
    </head>

    <body class="bg-gray-50 text-gray-800">

        <!-- HEADER -->
        <header class="bg-black text-gray-200 shadow-sm sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between gap-4">

                <!-- LOGO -->
                <div class="flex items-center gap-3">
                    <a href="{{ url('/') }}" class="flex items-center gap-3">
                        <img src="{{ asset('storage/contos-de-medo.png') }}" alt="Logo" class="h-10 w-auto">
                        <span class="text-4xl font-bold tracking-tight logo-font text-white opacity-75">Contos de
                            Medo</span>
                    </a>
                </div>

                <!-- SEARCH -->
                <div class="relative hidden md:block opacity-50">
                    <input type="text" placeholder="Pesquisar contos..."
                        class="pl-10 pr-4 py-2 rounded-2xl bg-transparent border border-white text-white placeholder-white placeholder-opacity-100 focus:outline-none focus:ring-2 focus:ring-white">
                    <svg class="w-5 h-5 absolute left-3 top-2.5 text-white" fill="none" stroke="currentColor"
                        stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
                    </svg>
                </div>
            </div>
        </header>

        <!-- HERO -->
        <section class="bg-gradient-to-r from-rose-950 via-rose-700 to-rose-950 text-white">
            <div class="max-w-7xl mx-auto px-4 py-20">
                <h1 class="text-4xl md:text-5xl font-extrabold mb-6 @yield('hero-align', 'text-start')">
                    @yield('title', 'Contos de Medo')
                </h1>

                @if (View::hasSection('tagline'))
                    <p class="text-lg max-w-7xl opacity-90 @yield('hero-align', 'text-start')">
                        @yield('tagline')
                    </p>
                @endif
            </div>
        </section>

        <!-- CONTEÚDO -->
        @yield('content')

        <!-- FOOTER -->
        <footer class="bg-gray-900 text-gray-300">
            <div class="max-w-7xl mx-auto px-4 py-16 grid grid-cols-1 md:grid-cols-4 gap-10">

                <!-- SOBRE -->
                <div>
                    <h4 class="text-white font-bold text-xl mb-4">Contos de Medo</h4>
                    <p class="text-sm leading-relaxed">
                        Um espaço dedicado à criação e publicação de fábulas fictícias, contos e universos
                        imaginários.
                    </p>
                </div>

                <!-- CATEGORIAS -->
                <div>
                    <h4 class="text-white text-xl font-bold mb-4">Categorias</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ url('fantasia') }}" class="hover:text-white">Fantasia</a></li>
                        <li><a href="{{ url('ficcao') }}" class="hover:text-white">Ficção</a></li>
                        <li><a href="{{ url('misterio') }}" class="hover:text-white">Mistério</a></li>
                        <li><a href="{{ url('terror') }}" class="hover:text-white">Terror</a></li>
                    </ul>
                </div>

                <!-- INSTITUCIONAL -->
                <div>
                    <h4 class="text-white text-xl font-bold mb-4">Institucional</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ url('sobre') }}" class="hover:text-white">Sobre o Site</a></li>
                        <li><a href="{{ url('autor') }}" class="hover:text-white">Sobre o Autor</a></li>
                        <li><a href="{{ url('politica-de-privacidade') }}" class="hover:text-white">Política de
                                Privacidade</a></li>
                        <li><a href="{{ url('contato') }}" class="hover:text-white">Contato</a></li>
                    </ul>
                </div>

                <!-- REDES SOCIAIS -->
                <div>
                    <h4 class="text-white text-xl font-bold mb-4">Siga-nos</h4>
                    <div class="flex gap-4">
                        <a href="#" class="hover:text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M22 12a10 10 0 10-11.5 9.9v-7h-2v-3h2v-2.3c0-2 1.2-3.1 3-3.1.9 0 1.8.1 1.8.1v2h-1c-1 0-1.3.6-1.3 1.2V12h2.2l-.4 3h-1.8v7A10 10 0 0022 12z" />
                            </svg>
                        </a>
                        <a href="#" class="hover:text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M23 3a10.9 10.9 0 01-3.1.9A5.4 5.4 0 0022.4.4a10.8 10.8 0 01-3.4 1.3A5.4 5.4 0 0016.6 0c-3 0-5.4 2.4-5.4 5.4 0 .4 0 .8.1 1.1A15.3 15.3 0 011.6.8a5.4 5.4 0 001.7 7.2 5.3 5.3 0 01-2.4-.7v.1c0 2.6 1.9 4.8 4.4 5.3a5.4 5.4 0 01-2.4.1c.7 2.1 2.7 3.6 5.1 3.7A10.8 10.8 0 010 21.5 15.3 15.3 0 008.3 24c10 0 15.5-8.3 15.5-15.5v-.7A11 11 0 0023 3z" />
                            </svg>
                        </a>
                    </div>
                </div>

            </div>

            <div class="text-center text-sm border-t border-gray-700 py-6">
                © Contos de Medo. Todos os direitos reservados.
            </div>
        </footer>

    </body>

</html>
