@extends('layouts.app')

@section('title', 'Contato - Contos de Medo')

@section('content')
    <div class="container mx-auto px-4 py-8 lg:py-16 max-w-5xl">
        <!-- Header -->
        <header class="text-center mb-12 lg:mb-16">
            <h1 class="text-4xl lg:text-6xl font-black text-gray-100 mb-4 leading-tight">
                Entre em <span class="text-red-600 glow-red">Contato</span>
            </h1>
            <p class="text-xl text-gray-400 max-w-2xl mx-auto">
                Tem uma história para contar? Sugestões? Ou apenas quer conversar sobre terror? Estamos aqui!
            </p>
        </header>

        <!-- Success Message -->
        @if (session('success'))
            <div class="max-w-2xl mx-auto mb-8 bg-green-900/20 border border-green-700 text-green-400 px-6 py-4 rounded-lg">
                <div class="flex items-center space-x-3">
                    <svg class="w-6 h-6 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                    </svg>
                    <p class="font-semibold">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="max-w-2xl mx-auto mb-8 bg-red-900/20 border border-red-700 text-red-400 px-6 py-4 rounded-lg">
                <div class="flex items-start space-x-3">
                    <svg class="w-6 h-6 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z" />
                    </svg>
                    <div>
                        <p class="font-semibold mb-2">Ops! Algo deu errado:</p>
                        <ul class="list-disc list-inside space-y-1 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <div class="grid lg:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div class="bg-gray-800 rounded-lg p-6 lg:p-8 border border-gray-700">
                <h2 class="text-2xl font-bold text-gray-100 mb-6">Envie sua Mensagem</h2>

                <form action="{{ route('contact.send') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-gray-300 font-semibold mb-2">
                            Nome Completo <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required
                            class="w-full px-4 py-3 bg-gray-900 text-gray-200 border border-gray-700 rounded-lg focus:outline-none focus:border-red-600 transition-colors @error('name') border-red-500 @enderror"
                            placeholder="Seu nome completo">
                        @error('name')
                            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-gray-300 font-semibold mb-2">
                            E-mail <span class="text-red-500">*</span>
                        </label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required
                            class="w-full px-4 py-3 bg-gray-900 text-gray-200 border border-gray-700 rounded-lg focus:outline-none focus:border-red-600 transition-colors @error('email') border-red-500 @enderror"
                            placeholder="seu@email.com">
                        @error('email')
                            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Subject -->
                    <div>
                        <label for="subject" class="block text-gray-300 font-semibold mb-2">
                            Assunto <span class="text-red-500">*</span>
                        </label>
                        <select id="subject" name="subject" required
                            class="w-full px-4 py-3 bg-gray-900 text-gray-200 border border-gray-700 rounded-lg focus:outline-none focus:border-red-600 transition-colors @error('subject') border-red-500 @enderror">
                            <option value="">Selecione um assunto</option>
                            <option value="submission" {{ old('subject') == 'submission' ? 'selected' : '' }}>Submissão de
                                História</option>
                            <option value="feedback" {{ old('subject') == 'feedback' ? 'selected' : '' }}>Feedback/Sugestão
                            </option>
                            <option value="partnership" {{ old('subject') == 'partnership' ? 'selected' : '' }}>Parceria
                            </option>
                            <option value="technical" {{ old('subject') == 'technical' ? 'selected' : '' }}>Problema
                                Técnico</option>
                            <option value="other" {{ old('subject') == 'other' ? 'selected' : '' }}>Outro Assunto</option>
                        </select>
                        @error('subject')
                            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Message -->
                    <div>
                        <label for="message" class="block text-gray-300 font-semibold mb-2">
                            Mensagem <span class="text-red-500">*</span>
                        </label>
                        <textarea id="message" name="message" rows="6" required
                            class="w-full px-4 py-3 bg-gray-900 text-gray-200 border border-gray-700 rounded-lg focus:outline-none focus:border-red-600 transition-colors resize-none @error('message') border-red-500 @enderror"
                            placeholder="Digite sua mensagem aqui...">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Privacy Policy -->
                    <div class="flex items-start space-x-3">
                        <input type="checkbox" id="privacy" name="privacy" required
                            class="mt-1 w-4 h-4 bg-gray-900 border-gray-700 rounded focus:ring-red-600 text-red-600">
                        <label for="privacy" class="text-sm text-gray-400">
                            Concordo com a <a href="#" class="text-red-500 hover:text-red-400 underline">política de
                                privacidade</a> e autorizo o uso dos meus dados para resposta. <span
                                class="text-red-500">*</span>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full px-6 py-4 bg-red-600 text-white font-bold text-lg rounded-lg hover:bg-red-700 transition-colors shadow-lg hover:shadow-xl">
                        Enviar Mensagem
                    </button>
                </form>
            </div>

            <!-- Contact Info & FAQ -->
            <div class="space-y-8">
                <!-- Contact Cards -->
                <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                    <h3 class="text-xl font-bold text-gray-100 mb-4">Outras Formas de Contato</h3>

                    <div class="space-y-4">
                        <!-- Email -->
                        <div class="flex items-start space-x-4">
                            <div class="w-10 h-10 bg-red-900 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-gray-100 font-semibold mb-1">E-mail</h4>
                                <a href="mailto:contato@contosdemedo.com" class="text-red-500 hover:text-red-400 text-sm">
                                    contato@contosdemedo.com
                                </a>
                            </div>
                        </div>

                        <!-- Social Media -->
                        <div class="flex items-start space-x-4">
                            <div class="w-10 h-10 bg-red-900 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12 2C6.477 2 2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.879V14.89h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.989C18.343 21.129 22 16.99 22 12c0-5.523-4.477-10-10-10z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-gray-100 font-semibold mb-1">Redes Sociais</h4>
                                <div class="flex space-x-3 text-sm">
                                    <a href="#" class="text-red-500 hover:text-red-400">Facebook</a>
                                    <span class="text-gray-600">•</span>
                                    <a href="#" class="text-red-500 hover:text-red-400">Twitter</a>
                                    <span class="text-gray-600">•</span>
                                    <a href="#" class="text-red-500 hover:text-red-400">Instagram</a>
                                </div>
                            </div>
                        </div>

                        <!-- Response Time -->
                        <div class="flex items-start space-x-4">
                            <div class="w-10 h-10 bg-red-900 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-gray-100 font-semibold mb-1">Tempo de Resposta</h4>
                                <p class="text-gray-400 text-sm">
                                    Respondemos em até 48 horas úteis
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FAQ -->
                <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                    <h3 class="text-xl font-bold text-gray-100 mb-4">Perguntas Frequentes</h3>

                    <div class="space-y-4">
                        <div>
                            <h4 class="text-gray-100 font-semibold mb-2 flex items-center">
                                <span class="w-2 h-2 bg-red-600 rounded-full mr-2"></span>
                                Como submeter uma história?
                            </h4>
                            <p class="text-gray-400 text-sm ml-4">
                                Envie sua história através do formulário selecionando "Submissão de História" como assunto.
                                Inclua o texto completo ou um link.
                            </p>
                        </div>

                        <div>
                            <h4 class="text-gray-100 font-semibold mb-2 flex items-center">
                                <span class="w-2 h-2 bg-red-600 rounded-full mr-2"></span>
                                Aceitam histórias de autores iniciantes?
                            </h4>
                            <p class="text-gray-400 text-sm ml-4">
                                Sim! Valorizamos a qualidade da história, não a experiência do autor. Todos são bem-vindos.
                            </p>
                        </div>

                        <div>
                            <h4 class="text-gray-100 font-semibold mb-2 flex items-center">
                                <span class="w-2 h-2 bg-red-600 rounded-full mr-2"></span>
                                Posso sugerir temas para contos?
                            </h4>
                            <p class="text-gray-400 text-sm ml-4">
                                Claro! Adoramos ouvir sugestões da nossa comunidade. Use o formulário com o assunto
                                "Feedback/Sugestão".
                            </p>
                        </div>

                        <div>
                            <h4 class="text-gray-100 font-semibold mb-2 flex items-center">
                                <span class="w-2 h-2 bg-red-600 rounded-full mr-2"></span>
                                Como funciona a newsletter?
                            </h4>
                            <p class="text-gray-400 text-sm ml-4">
                                Enviamos um e-mail semanal com nossa história mais recente. Você pode cancelar a qualquer
                                momento.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-lg p-6 border border-red-900/30">
                    <h3 class="text-lg font-bold text-gray-100 mb-4 text-center">Nossa Equipe</h3>
                    <div class="grid grid-cols-3 gap-4 text-center">
                        <div>
                            <div class="text-2xl font-black text-red-600 mb-1">24h</div>
                            <div class="text-gray-400 text-xs">Tempo Médio</div>
                        </div>
                        <div>
                            <div class="text-2xl font-black text-red-600 mb-1">98%</div>
                            <div class="text-gray-400 text-xs">Satisfação</div>
                        </div>
                        <div>
                            <div class="text-2xl font-black text-red-600 mb-1">5+</div>
                            <div class="text-gray-400 text-xs">Anos Online</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
