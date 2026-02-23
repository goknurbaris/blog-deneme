<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Laravel Blog')</title>

    <script src="https://cdn.tailwindcss.com?plugins=typography"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f3f4f6; }
        /* Editörün yüksekliğini ayarlıyoruz */
        .ck-editor__editable_inline { min-height: 250px; }
    </style>
</head>
<body class="text-gray-800 antialiased flex flex-col min-h-screen">

    <nav class="bg-white shadow-sm border-b border-gray-100 mb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('blog.index') }}" class="text-xl font-bold text-indigo-600 hover:text-indigo-800 transition">
                        🚀 Blog Projem
                    </a>
                </div>

                <div class="flex items-center space-x-4">
                    <a href="{{ route('blog.index') }}" class="text-gray-600 hover:text-gray-900 font-medium">Ana Sayfa</a>

                    @guest
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900 font-medium">Giriş Yap</a>
                        @endif
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-indigo-700 transition shadow-sm">Kayıt Ol</a>
                        @endif
                    @else
                        <a href="{{ route('blog.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-indigo-700 transition shadow-sm">
                            + Yeni Yazı Ekle
                        </a>
                        <span class="text-gray-500 font-medium ml-4">👤 {{ Auth::user()->name }}</span>

                        <form action="{{ route('logout') }}" method="POST" class="inline ml-2">
                            @csrf
                            <button type="submit" class="text-red-500 hover:text-red-700 font-medium text-sm transition">Çıkış</button>
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12 flex-grow w-full">
        @if(session('basari'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm">
                <p>{{ session('basari') }}</p>
            </div>
        @endif

        @yield('content')
    </main>

    @yield('scripts')
</body>
</html>
