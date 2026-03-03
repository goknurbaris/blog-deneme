<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BlogPro</title>

    <script src="https://cdn.tailwindcss.com?plugins=typography,forms"></script>
    <script>
        tailwind.config = { darkMode: 'class', }
    </script>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>

    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>
<body class="min-h-screen flex flex-col bg-[#f8fafc] text-slate-800 dark:bg-slate-900 dark:text-white transition-colors duration-300">

    <nav class="sticky top-0 z-50 bg-white/80 dark:bg-slate-900/80 backdrop-blur-md border-b border-slate-200 dark:border-slate-800 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 h-20 flex justify-between items-center">

            <a href="{{ route('blog.index') }}" class="text-xl sm:text-2xl font-black text-indigo-600 dark:text-indigo-400 tracking-tighter">
                BLOGPRO.
            </a>

            <div class="flex items-center gap-3 sm:gap-6">
                <button id="theme-toggle" type="button" class="text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 focus:outline-none rounded-lg text-lg sm:text-xl p-2 transition-colors">
                    <span id="theme-toggle-dark-icon" class="hidden">🌙</span>
                    <span id="theme-toggle-light-icon" class="hidden">☀️</span>
                </button>

                @auth
                    <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 pl-2 sm:pl-4 border-l border-slate-200 dark:border-slate-700 hover:opacity-80 transition-opacity">
                        <div class="w-8 h-8 bg-indigo-100 dark:bg-indigo-900/50 text-indigo-600 dark:text-indigo-400 rounded-full flex items-center justify-center text-xs font-black uppercase shadow-inner overflow-hidden">
                            @if(auth()->user()->avatar)
                                <img src="{{ asset('storage/' . auth()->user()->avatar) }}" class="w-full h-full object-cover">
                            @else
                                {{ substr(auth()->user()->name, 0, 1) }}
                            @endif
                        </div>
                        <span class="hidden md:block text-sm font-bold text-slate-700 dark:text-slate-200">
                            {{ auth()->user()->name }}
                        </span>
                    </a>

                    <a href="{{ route('dashboard') }}" class="hidden md:block text-sm font-bold text-slate-600 dark:text-slate-300 hover:text-indigo-600 dark:hover:text-indigo-400 transition">Panelim</a>

                    <a href="{{ route('blog.create') }}" class="bg-indigo-600 text-white px-3 sm:px-5 py-2 sm:py-2.5 rounded-full text-sm font-bold hover:bg-indigo-700 transition shadow-lg shadow-indigo-100 dark:shadow-none flex items-center gap-1">
                        <span class="text-lg leading-none">+</span>
                        <span class="hidden sm:inline">Yazı Yaz</span>
                    </a>

                    <form action="{{ route('logout') }}" method="POST" class="inline flex items-center">
                        @csrf
                        <button type="submit" class="text-rose-500 dark:text-rose-400 hover:text-rose-700 dark:hover:text-rose-300 transition-colors p-1" title="Çıkış Yap">
                            <span class="hidden sm:inline text-xs font-bold uppercase">Çıkış</span>
                            <svg class="w-5 h-5 sm:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-bold text-slate-600 dark:text-slate-300">Giriş Yap</a>
                    <a href="{{ route('register') }}" class="bg-slate-900 dark:bg-white text-white dark:text-slate-900 px-5 py-2 sm:py-2.5 rounded-full text-sm font-bold">Kayıt Ol</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="flex-grow py-8 sm:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            @yield('content')
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();

        var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
        }

        var themeToggleBtn = document.getElementById('theme-toggle');

        themeToggleBtn.addEventListener('click', function() {
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }
            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            }
        });
    </script>
</body>
</html>
