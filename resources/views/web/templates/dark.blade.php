<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'Contos de Medo - Blog de Terror')</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Crimson+Text:ital,wght@0,400;0,600;1,400&family=Playfair+Display:wght@700;900&display=swap');

            body {
                font-family: 'Crimson Text', serif;
            }

            h1,
            h2,
            h3 {
                font-family: 'Playfair Display', serif;
            }

            .featured-shadow {
                box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            }

            .article-card:hover {
                transform: translateY(-4px);
                transition: all 0.3s ease;
                box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
            }

            .nav-link {
                position: relative;
            }

            .nav-link::after {
                content: '';
                position: absolute;
                width: 0;
                height: 2px;
                bottom: -4px;
                left: 50%;
                background-color: #dc2626;
                transition: all 0.3s ease;
                transform: translateX(-50%);
            }

            .nav-link:hover::after {
                width: 100%;
            }

            .dark-overlay {
                background: linear-gradient(135deg, rgba(0, 0, 0, 0.5) 0%, rgba(20, 0, 0, 0.6) 100%);
            }

            .glow-red {
                text-shadow: 0 0 20px rgba(220, 38, 38, 0.3);
            }

            .mobile-menu {
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.3s ease-in-out;
            }

            .mobile-menu.open {
                max-height: 500px;
            }

            .hamburger span {
                display: block;
                width: 100%;
                height: 2px;
                background-color: #f3f4f6;
                transition: all 0.3s ease;
            }

            .hamburger.open span:nth-child(1) {
                transform: rotate(45deg) translate(5px, 5px);
            }

            .hamburger.open span:nth-child(2) {
                opacity: 0;
            }

            .hamburger.open span:nth-child(3) {
                transform: rotate(-45deg) translate(7px, -6px);
            }
        </style>
        @stack('styles')
    </head>

    <body class="bg-gray-900 text-gray-100">
        <!-- Header -->
        <header class="bg-gray-900 border-b border-red-900/30 sticky top-0 z-50 shadow-2xl">
            <div class="container mx-auto px-4 py-4 lg:py-6">
                <div class="flex items-center justify-between">
                    <!-- Logo -->
                    <div class="flex items-center space-x-3">
                        <svg class="w-8 h-8 lg:w-10 lg:h-10 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-5-9h10v2H7z" />
                        </svg>
                        <a href="{{ route('home') }}"
                            class="text-xl lg:text-3xl font-black text-gray-100 tracking-tight">
                            Contos de <span class="text-red-600 glow-red">Medo</span>
                        </a>
                    </div>

                    <!-- Desktop Navigation -->
                    <nav class="hidden lg:block">
                        <ul class="flex items-center space-x-8">
                            <li><a href="{{ route('home') }}"
                                    class="nav-link text-lg font-semibold {{ request()->routeIs('home') ? 'text-red-500' : 'text-gray-300' }} hover:text-red-400">Home</a>
                            </li>
                            <li><a href="{{ route('about') }}"
                                    class="nav-link text-lg font-semibold {{ request()->routeIs('about') ? 'text-red-500' : 'text-gray-300' }} hover:text-red-400">Sobre</a>
                            </li>
                            <li><a href="{{ route('contact') }}"
                                    class="nav-link text-lg font-semibold {{ request()->routeIs('contact') ? 'text-red-500' : 'text-gray-300' }} hover:text-red-400">Contato</a>
                            </li>
                        </ul>
                    </nav>

                    <!-- Mobile Menu Button -->
                    <button id="mobile-menu-btn"
                        class="lg:hidden hamburger w-8 h-6 flex flex-col justify-between items-center focus:outline-none">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>

                <!-- Mobile Navigation -->
                <nav id="mobile-menu" class="mobile-menu lg:hidden">
                    <ul class="pt-4 pb-2 space-y-2">
                        <li><a href="{{ route('home') }}"
                                class="block py-2 text-base font-semibold {{ request()->routeIs('home') ? 'text-red-500' : 'text-gray-300' }} hover:text-red-400">Home</a>
                        </li>
                        <li><a href="{{ route('about') }}"
                                class="block py-2 text-base font-semibold {{ request()->routeIs('about') ? 'text-red-500' : 'text-gray-300' }} hover:text-red-400">Sobre</a>
                        </li>
                        <li><a href="{{ route('contact') }}"
                                class="block py-2 text-base font-semibold {{ request()->routeIs('contact') ? 'text-red-500' : 'text-gray-300' }} hover:text-red-400">Contato</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>

        <!-- Main Content -->
        <main>
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-gray-900 text-gray-300 mt-16 lg:mt-24 border-t border-red-900/30">
            <div class="container mx-auto px-4 py-8 lg:py-12">
                <div class="grid md:grid-cols-3 gap-8 mb-8">
                    <div>
                        <h4 class="text-white font-bold text-lg mb-4">Contos de Medo</h4>
                        <p class="text-sm leading-relaxed">
                            Explorando os cantos mais sombrios da imaginação humana, uma história de terror por vez.
                        </p>
                    </div>
                    <div>
                        <h4 class="text-white font-bold text-lg mb-4">Categorias</h4>
                        <ul class="space-y-2 text-sm">
                            <li><a href="#" class="hover:text-red-400 transition-colors">Terror Psicológico</a>
                            </li>
                            <li><a href="#" class="hover:text-red-400 transition-colors">Sobrenatural</a></li>
                            <li><a href="#" class="hover:text-red-400 transition-colors">Suspense</a></li>
                            <li><a href="#" class="hover:text-red-400 transition-colors">Folclore</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-white font-bold text-lg mb-4">Newsletter</h4>
                        <p class="text-sm mb-4">Receba novos contos diretamente no seu e-mail.</p>
                        <form action="{{ route('newsletter.subscribe') }}" method="POST" class="flex">
                            @csrf
                            <input type="email" name="email" placeholder="Seu e-mail" required
                                class="flex-1 px-4 py-2 rounded-l-lg bg-gray-800 text-gray-200 border border-gray-700 text-sm focus:outline-none focus:border-red-600">
                            <button type="submit"
                                class="bg-red-600 px-4 py-2 rounded-r-lg hover:bg-red-700 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="border-t border-gray-800 pt-6 text-center text-sm">
                    <p>&copy; {{ date('Y') }} Contos de Medo. Todos os direitos reservados.</p>
                </div>
            </div>
        </footer>

        <script>
            // Mobile Menu Toggle
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');

            mobileMenuBtn.addEventListener('click', function() {
                this.classList.toggle('open');
                mobileMenu.classList.toggle('open');
            });

            // Close mobile menu when clicking outside
            document.addEventListener('click', function(event) {
                const isClickInside = mobileMenuBtn.contains(event.target) || mobileMenu.contains(event.target);

                if (!isClickInside && mobileMenu.classList.contains('open')) {
                    mobileMenuBtn.classList.remove('open');
                    mobileMenu.classList.remove('open');
                }
            });
        </script>

        @stack('scripts')
    </body>

</html>
