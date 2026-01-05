@extends('layouts.app')

@section('title', $post->title . ' - Contos de Medo')

@section('content')
    <article class="container mx-auto px-4 py-8 lg:py-16 max-w-4xl">
        <!-- Post Header -->
        <header class="mb-8 lg:mb-12">
            <!-- Category & Date -->
            <div class="mb-4 flex items-center flex-wrap gap-2">
                <span class="text-red-500 text-sm font-semibold uppercase tracking-wide">
                    {{ $post->category->name ?? 'Terror' }}
                </span>
                <span class="text-gray-600">•</span>
                <span class="text-gray-400 text-sm">
                    {{ $post->published_at ? $post->published_at->format('d \d\e F, Y') : now()->format('d \d\e F, Y') }}
                </span>
                <span class="text-gray-600">•</span>
                <span class="text-gray-400 text-sm">
                    {{ $post->reading_time ?? '5' }} min de leitura
                </span>
            </div>

            <!-- Title -->
            <h1 class="text-3xl lg:text-5xl font-black text-gray-100 mb-6 leading-tight">
                {{ $post->title }}
            </h1>

            <!-- Author Info -->
            @if (isset($post->author))
                <div class="flex items-center space-x-3 mb-8">
                    <div class="w-12 h-12 rounded-full bg-gray-700 flex items-center justify-center">
                        @if ($post->author->avatar)
                            <img src="{{ asset('storage/' . $post->author->avatar) }}" alt="{{ $post->author->name }}"
                                class="w-full h-full rounded-full object-cover">
                        @else
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                            </svg>
                        @endif
                    </div>
                    <div>
                        <p class="text-gray-200 font-semibold">{{ $post->author->name }}</p>
                        <p class="text-gray-400 text-sm">Autor</p>
                    </div>
                </div>
            @endif

            <!-- Featured Image -->
            @if ($post->image)
                <div class="relative h-64 lg:h-96 rounded-lg overflow-hidden mb-8 shadow-2xl">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                        class="w-full h-full object-cover">
                    <div class="absolute inset-0 dark-overlay"></div>
                </div>
            @endif
        </header>

        <!-- Post Content -->
        <div class="prose prose-invert prose-lg max-w-none mb-12">
            <div class="text-gray-300 leading-relaxed space-y-6">
                {!! $post->content !!}
            </div>
        </div>

        <!-- Tags -->
        @if ($post->tags && count($post->tags) > 0)
            <div class="mb-12 pb-12 border-b border-gray-800">
                <h3 class="text-xl font-bold text-gray-100 mb-4">Tags</h3>
                <div class="flex flex-wrap gap-2">
                    @foreach ($post->tags as $tag)
                        <a href="{{ route('tags.show', $tag->slug) }}"
                            class="px-3 py-1 bg-gray-800 text-gray-300 rounded-full text-sm hover:bg-red-900 hover:text-white transition-colors border border-gray-700">
                            #{{ $tag->name }}
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Share Buttons -->
        <div class="mb-12 pb-12 border-b border-gray-800">
            <h3 class="text-xl font-bold text-gray-100 mb-4">Compartilhar</h3>
            <div class="flex space-x-4">
                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($post->title) }}"
                    target="_blank"
                    class="px-4 py-2 bg-gray-800 text-gray-300 rounded-lg hover:bg-blue-600 hover:text-white transition-colors border border-gray-700">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z" />
                    </svg>
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank"
                    class="px-4 py-2 bg-gray-800 text-gray-300 rounded-lg hover:bg-blue-700 hover:text-white transition-colors border border-gray-700">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                    </svg>
                </a>
                <a href="https://wa.me/?text={{ urlencode($post->title . ' ' . request()->url()) }}" target="_blank"
                    class="px-4 py-2 bg-gray-800 text-gray-300 rounded-lg hover:bg-green-600 hover:text-white transition-colors border border-gray-700">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Related Posts -->
        @if (isset($relatedPosts) && count($relatedPosts) > 0)
            <div class="mb-12">
                <h3 class="text-2xl font-bold text-gray-100 mb-6 flex items-center">
                    <span class="bg-red-600 w-1 h-8 mr-3"></span>
                    Você também pode gostar
                </h3>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($relatedPosts as $related)
                        <article
                            class="article-card bg-gray-800 rounded-lg overflow-hidden shadow-xl border border-gray-700/50 transition-all">
                            <div class="relative h-40 bg-gradient-to-br from-black via-gray-900 to-red-950">
                                @if ($related->image)
                                    <img src="{{ asset('storage/' . $related->image) }}" alt="{{ $related->title }}"
                                        class="absolute inset-0 w-full h-full object-cover">
                                @endif
                                <div class="absolute inset-0 dark-overlay flex items-center justify-center">
                                    @if (!$related->image)
                                        <svg class="w-12 h-12 text-red-900 opacity-30" fill="currentColor"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z" />
                                        </svg>
                                    @endif
                                </div>
                            </div>
                            <div class="p-4">
                                <h4 class="text-lg font-bold text-gray-100 mb-2 hover:text-red-500 transition-colors">
                                    <a href="{{ route('posts.show', $related->slug) }}">{{ $related->title }}</a>
                                </h4>
                                <p class="text-gray-400 text-sm">
                                    {{ Str::limit($related->excerpt, 80) }}
                                </p>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Comments Section -->
        <div class="bg-gray-800 rounded-lg p-6 lg:p-8 border border-gray-700">
            <h3 class="text-2xl font-bold text-gray-100 mb-6">Comentários</h3>

            @auth
                <form action="{{ route('comments.store', $post->slug) }}" method="POST" class="mb-8">
                    @csrf
                    <textarea name="comment" rows="4" placeholder="Compartilhe suas impressões sobre esta história..."
                        class="w-full px-4 py-3 bg-gray-900 text-gray-200 border border-gray-700 rounded-lg focus:outline-none focus:border-red-600 resize-none"
                        required></textarea>
                    <button type="submit"
                        class="mt-3 px-6 py-2 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition-colors">
                        Publicar Comentário
                    </button>
                </form>
            @else
                <div class="mb-8 p-4 bg-gray-900 border border-gray-700 rounded-lg">
                    <p class="text-gray-400">
                        <a href="{{ route('login') }}" class="text-red-500 hover:text-red-400 font-semibold">Faça login</a>
                        para comentar
                    </p>
                </div>
            @endauth

            <!-- Comments List -->
            @if (isset($post->comments) && count($post->comments) > 0)
                <div class="space-y-6">
                    @foreach ($post->comments as $comment)
                        <div class="flex space-x-4">
                            <div class="flex-shrink-0 w-10 h-10 rounded-full bg-gray-700 flex items-center justify-center">
                                @if ($comment->user->avatar)
                                    <img src="{{ asset('storage/' . $comment->user->avatar) }}"
                                        alt="{{ $comment->user->name }}" class="w-full h-full rounded-full object-cover">
                                @else
                                    <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                                    </svg>
                                @endif
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center space-x-2 mb-1">
                                    <span class="text-gray-200 font-semibold">{{ $comment->user->name }}</span>
                                    <span class="text-gray-500 text-sm">{{ $comment->created_at->diffForHumans() }}</span>
                                </div>
                                <p class="text-gray-300">{{ $comment->content }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-400 text-center py-8">Seja o primeiro a comentar esta história...</p>
            @endif
        </div>
    </article>
@endsection
