<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'Meu Blog')</title>

        @vite(['resources/css/web/templates/default/app.css', 'resources/js/web/default/app.js'])
    </head>

    <body class="bg-white text-gray-900">

        @include('web.templates.default.components.menu')

        @include('web.templates.default.components.header')

        <main class="px-4 py-6 md:px-8">
            @yield('content')
        </main>

        @include('web.templates.default.components.footer')

    </body>

</html>
