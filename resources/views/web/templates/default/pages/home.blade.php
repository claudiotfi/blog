@extends('web.templates.default.app')

@section('title', 'Histórias que vivem além da imaginação')
@section('tagline', ' Um universo de contos fictícios e narrativas que desafiam a realidade ')

@section('content')
    <main class="max-w-7xl mx-auto px-4 py-16">

        <h2 class="text-3xl font-bold mb-10">Últimos Contos</h2>

        <!-- GRID DE POSTS -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

            <!-- CARD -->
            <article class="group bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden cursor-pointer">
                <img src="https://picsum.photos/600/400?random=1" alt="" class="w-full h-48 object-cover">

                <div class="px-6">
                    <a href="#" class="text-sm text-rose-800 font-semibold block mt-6 mb-3">Fantasia</a>
                    <h3 class="text-xl font-bold leading-snug group-hover:text-rose-800 transition">
                        <a href="#">
                            O Reino Esquecido do Norte
                        </a>
                    </h3>
                    <a href="#" class="flex items-start justify-between gap-4 mt-2 mb-3">
                        <span class="text-gray-600">
                            Uma jornada épica por terras congeladas onde lendas ainda respiram.
                        </span>
                        <span class="mt-1 text-rose-800 transform transition group-hover:translate-x-1">
                            →
                        </span>
                    </a>

                </div>
            </article>


            <!-- CARD -->
            <article class="group bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden cursor-pointer">
                <img src="https://picsum.photos/600/400?random=2" alt="" class="w-full h-48 object-cover">

                <div class="px-6">
                    <a href="#" class="text-sm text-rose-800 font-semibold block mt-6 mb-3">Fantasia</a>
                    <h3 class="text-xl font-bold leading-snug group-hover:text-rose-800 transition">
                        <a href="#">
                            O Reino Esquecido do Norte
                        </a>
                    </h3>
                    <a href="#" class="flex items-start justify-between gap-4 mt-2 mb-3">
                        <span class="text-gray-600">
                            Uma jornada épica por terras congeladas onde lendas ainda respiram.
                        </span>
                        <span class="mt-1 text-rose-800 transform transition group-hover:translate-x-1">
                            →
                        </span>
                    </a>

                </div>
            </article>

            <!-- CARD -->
            <article class="group bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden cursor-pointer">
                <img src="https://picsum.photos/600/400?random=3" alt="" class="w-full h-48 object-cover">

                <div class="px-6">
                    <a href="#" class="text-sm text-rose-800 font-semibold block mt-6 mb-3">Fantasia</a>
                    <h3 class="text-xl font-bold leading-snug group-hover:text-rose-800 transition">
                        <a href="#">
                            O Reino Esquecido do Norte
                        </a>
                    </h3>
                    <a href="#" class="flex items-start justify-between gap-4 mt-2 mb-3">
                        <span class="text-gray-600">
                            Uma jornada épica por terras congeladas onde lendas ainda respiram.
                        </span>
                        <span class="mt-1 text-rose-800 transform transition group-hover:translate-x-1">
                            →
                        </span>
                    </a>

                </div>
            </article>

        </div>
    </main>
@endsection
