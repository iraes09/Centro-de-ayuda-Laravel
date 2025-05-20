<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
        <div class="flex justify-end p-4">
    <button id="theme-toggle" class="flex items-center p-2 text-gray-700 dark:text-gray-200 space-x-2" aria-label="Cambiar modo">
        <svg id="icon-sun" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2m0 14v2m9-9h-2M5 12H3m15.364 6.364l-1.414-1.414M7.05 7.05L5.636 5.636m12.728 0l-1.414 1.414M7.05 16.95l-1.414 1.414M12 8a4 4 0 100 8 4 4 0 000-8z" />
        </svg>
        <svg id="icon-moon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hidden" fill="currentColor" viewBox="0 0 24 24" stroke="none">
            <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" />
        </svg>
        <span>Cambiar Modo</span>
    </button>
</div>

<script>
    const themeToggle = document.getElementById("theme-toggle");
    const iconSun = document.getElementById("icon-sun");
    const iconMoon = document.getElementById("icon-moon");

    // Al cargar la página, recuperar el modo guardado en localStorage y ajustar iconos
    function updateIcons() {
        if (document.documentElement.classList.contains('dark')) {
            iconSun.classList.add('hidden');
            iconMoon.classList.remove('hidden');
        } else {
            iconSun.classList.remove('hidden');
            iconMoon.classList.add('hidden');
        }
    }

    const currentTheme = localStorage.getItem('theme');
    if (currentTheme === 'dark') {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
    updateIcons();

    // Cambiar modo y iconos al hacer click
    themeToggle.addEventListener("click", () => {
        document.documentElement.classList.toggle("dark");
        updateIcons();

        if (document.documentElement.classList.contains('dark')) {
            localStorage.setItem('theme', 'dark');
        } else {
            localStorage.setItem('theme', 'light');
        }
    });
</script>


        <x-banner />

        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
        <script>
            const themeToggle = document.getElementById("theme-toggle");

            // Al cargar la página, recuperar el modo guardado en localStorage
            const currentTheme = localStorage.getItem('theme');
            if (currentTheme === 'dark') {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }

            // Cambiar entre modo claro y oscuro al hacer click en el botón
            themeToggle.addEventListener("click", () => {
                document.documentElement.classList.toggle("dark");

                // Guardar la preferencia del tema en localStorage
                if (document.documentElement.classList.contains('dark')) {
                    localStorage.setItem('theme', 'dark');
                } else {
                    localStorage.setItem('theme', 'light');
                }
            });
        </script>
    </body>
</html>
