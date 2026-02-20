<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blog Projem')</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f4f7f6; margin: 0; padding: 0; }
        nav { background: #333; padding: 15px; color: white; text-align: center; }
        nav a { color: white; margin: 0 15px; text-decoration: none; font-weight: bold; }
        .container { max-width: 900px; margin: 30px auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        footer { text-align: center; padding: 20px; color: #777; font-size: 14px; }
    </style>
</head>
<body>

    <nav>
        <a href="/">🏠 Ana Sayfa</a>
        <a href="{{ route('blog.create') }}">✍️ Yeni Yazı</a>
    </nav>

    <div class="container">
        @yield('content') </div>

    <footer>
        © {{ date('Y') }} Laravel Blog Projem - Tüm Hakları Saklıdır.
    </footer>

</body>
</html>
