<!DOCTYPE html>
<html lang="tr" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BlogPro | Giriş</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .bg-pattern {
            background-color: #f8fafc;
            background-image: radial-gradient(#6366f1 0.5px, transparent 0.5px);
            background-size: 24px 24px;
            background-opacity: 0.1;
        }
        .glass { background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(12px); }
    </style>
</head>
<body class="bg-pattern antialiased h-full flex items-center justify-center p-6">
    <div class="w-full max-w-md">
        <div class="text-center mb-8">
            <a href="/" class="text-3xl font-black tracking-tighter bg-gradient-to-r from-indigo-600 to-violet-600 bg-clip-text text-transparent">
                BLOGPRO.
            </a>

        </div>

        <div class="glass border border-white shadow-2xl shadow-indigo-100/50 rounded-[2rem] p-8 md:p-10">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
