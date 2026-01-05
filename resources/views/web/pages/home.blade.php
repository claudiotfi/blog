@extends('layouts.app')

@section('title', 'Home - Contos de Medo')

@section('content')
    <div class="container mx-auto px-4 py-8 lg:py-16">
        <!-- Featured Article -->
        <article class="bg-gray-800 rounded-lg featured-shadow overflow-hidden mb-12 lg:mb-20 border border-red-900/20">
            <div class="grid lg:grid-cols-2 gap-0">
                <!-- Image -->
                <div class="relative h-64 lg:h-auto bg-gradient-to-br from-black via-gray-900 to-red-950">
                    @if (isset($featuredPost) && $featuredPost->image)
                        <img src="{{ asset('storage/' . $featuredPost->image) }}" alt="{{ $featuredPost->title }}"
                            class="absolute inset-0 w-full h-full object-cover">
                    @endif
                    <div class="absolute inset-0 dark-overlay flex items-center justify-center">
                        @if (!isset($featuredPost) || !$featuredPost->image)
                            <svg class="w-20 h-20 text-red-900 opacity-40" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z" />
                            </svg>
                        @endif
                    </div>
                    <span
                        class="absolute top-4 left-4 bg-red-600 text-white px-3 py-1 rounded-full text-xs lg:text-sm font-semibold shadow-lg">
                        Mais Recente
                    </span>
                </div>

                <!-- Content -->
                <div class="p-6 lg:p-10 flex flex-col justify-center bg-gradient-to-br from-gray-800 to-gray-900">
                    <div class="mb-3 lg:mb-4">
                        <span class="text-red-500 text-xs lg:text-sm font-semibold uppercase tracking-wide">
                            {{ $featuredPost->category->name ?? 'Terror Psicológico' }}
                        </span>
                        <span class="hidden lg:inline text-gray-600 mx-2">•</span>
                        <span class="text-gray-400 text-xs lg:text-sm block lg:inline mt-1 lg:mt-0">
                            {{ $featuredPost->published_at ? $featuredPost->published_at->format('d \d\e F, Y') : now()->format('d \d\e F, Y') }}
                        </span>
                    </div>

                    <h2 class="text-2xl lg:text-4xl font-black text-gray-100 mb-3 lg:mb-4 leading-tight">
                        {{ $featuredPost->title ?? 'A Última Porta do Corredor' }}
                    </h2>

                    <p class="text-base lg:text-lg text-gray-300 mb-6 lg:mb-8 leading-relaxed">
                        {{ $featuredPost->excerpt ?? 'No fim do corredor escuro do antigo hotel, existe uma porta que ninguém ousa abrir. Dizem que quem a abre nunca mais é visto. Mas quando a curiosidade supera o medo, descobrimos que alguns mistérios deveriam permanecer enterrados para sempre...' }}
                    </p>

                    <div class="flex items-center justify-between">
                        <a href="{{ route('posts.show', $featuredPost->slug ?? '#') }}"
                            class="inline-flex items-center text-red-500 font-semibold text-sm lg:text-base hover:text-red-400 group">
                            Ler história completa
                            <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                        <span class="hidden lg:block text-gray-500 text-sm">
                            {{ $featuredPost->reading_time ?? '5' }} min de leitura
                        </span>
                    </div>
                </div>
            </div>
        </article>

        <!-- Articles Grid -->
        <div class="mb-12">
            <h3 class="text-2xl lg:text-3xl font-black text-gray-100 mb-6 lg:mb-10 flex items-center">
                <span class="bg-red-600 w-1 h-8 mr-3"></span>
                Histórias Anteriores
            </h3>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                @forelse($posts as $post)
                    <article
                        class="article-card bg-gray-800 rounded-lg overflow-hidden shadow-xl border border-gray-700/50 transition-all">
                        <div class="relative h-48 bg-gradient-to-br from-black via-gray-900 to-red-950">
                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                                    class="absolute inset-0 w-full h-full object-cover">
                            @endif
                            <div class="absolute inset-0 dark-overlay flex items-center justify-center">
                                @if (!$post->image)
                                    <svg class="w-16 h-16 text-red-900 opacity-30" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z" />
                                    </svg>
                                @endif
                            </div>
                        </div>
                        <div class="p-5">
                            <div class="mb-2">
                                <span class="text-red-500 text-xs font-semibold uppercase">
                                    {{ $post->category->name ?? 'Terror' }}
                                </span>
                                <span class="text-gray-600 mx-2 hidden lg:inline">•</span>
                                <span class="text-gray-400 text-xs block lg:inline mt-1 lg:mt-0">
                                    {{ $post->published_at ? $post->published_at->format('d \d\e F') : now()->format('d \d\e F') }}
                                </span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-100 mb-2 hover:text-red-500 transition-colors">
                                <a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a>
                            </h3>
                            <p class="text-gray-300 text-sm mb-4 leading-relaxed">
                                {{ Str::limit($post->excerpt, 120) }}
                            </p>
                            <a href="{{ route('posts.show', $post->slug) }}"
                                class="text-red-500 text-sm font-semibold hover:text-red-400 inline-flex items-center">
                                Continuar lendo
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </article>
                @empty
                    <div class="col-span-3 text-center py-12">
                        <p class="text-gray-400 text-lg">Nenhuma história encontrada ainda...</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Pagination -->
        @if ($posts->hasPages())
            <div class="flex justify-center items-center space-x-2">
                {{-- Previous Button --}}
                @if ($posts->onFirstPage())
                    <button
                        class="px-3 py-2 lg:px-4 lg:py-2 rounded-lg bg-gray-800 text-gray-600 cursor-not-allowed border border-gray-700"
                        disabled>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                @else
                    <a href="{{ $posts->previousPageUrl() }}"
                        class="px-3 py-2 lg:px-4 lg:py-2 rounded-lg bg-gray-800 text-gray-300 hover:bg-gray-700 border border-gray-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </a>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($posts->links()->elements[0] as $page => $url)
                    @if ($page == $posts->currentPage())
                        <button
                            class="px-3 py-2 lg:px-4 lg:py-2 rounded-lg bg-red-600 text-white font-semibold text-sm lg:text-base shadow-lg">
                            {{ $page }}
                        </button>
                    @else
                        <a href="{{ $url }}"
                            class="px-3 py-2 lg:px-4 lg:py-2 rounded-lg bg-gray-800 text-gray-300 font-semibold hover:bg-gray-700 text-sm lg:text-base border border-gray-700">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach

                {{-- Next Button --}}
                @if ($posts->hasMorePages())
                    <a href="{{ $posts->nextPageUrl() }}"
                        class="px-3 py-2 lg:px-4 lg:py-2 rounded-lg bg-gray-800 text-gray-300 hover:bg-gray-700 border border-gray-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                @else
                    <button
                        class="px-3 py-2 lg:px-4 lg:py-2 rounded-lg bg-gray-800 text-gray-600 cursor-not-allowed border border-gray-700"
                        disabled>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                @endif
            </div>
        @endif
    </div>
@endsection
