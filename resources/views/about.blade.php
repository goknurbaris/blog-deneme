@extends('layouts.app')

@section('title', 'Hakkımda')

@section('content')
<div class="max-w-5xl mx-auto">

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-10 flex flex-col md:flex-row">

        <div class="md:w-1/3 bg-indigo-600 flex flex-col items-center justify-center p-8 text-center">
            <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name ?? 'Goknur') }}&background=fff&color=4f46e5&size=200"
                 alt="Profil"
                 class="w-32 h-32 rounded-full border-4 border-white shadow-lg mb-4 transform hover:scale-105 transition duration-300">

            <h2 class="text-white text-xl font-bold">{{ auth()->user()->name ?? 'Misafir' }}</h2>
            <p class="text-indigo-200 text-sm mt-1">Full Stack Developer</p>

            <div class="flex justify-center space-x-4 mt-6">
                <a href="#" class="text-white hover:text-indigo-200 transition">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                </a>
                <a href="#" class="text-white hover:text-indigo-200 transition">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                </a>
            </div>
        </div>

        <div class="md:w-2/3 p-8 md:p-12">
            <h1 class="text-3xl font-bold text-gray-800 mb-6 relative inline-block">
                Hakkımda
                <span class="absolute bottom-0 left-0 w-full h-1 bg-indigo-600 rounded-full"></span>
            </h1>

            <div class="prose prose-lg text-gray-600 leading-relaxed">
                <p class="mb-4">
                    Merhaba! Ben teknolojiye ve yazılıma meraklı bir blog yazarıyım. Kod yazmak benim için sadece bir iş değil, aynı zamanda karmaşık problemleri çözme sanatıdır.
                </p>
                <p>
                    Bu blogda, <strong>Laravel, PHP ve Tailwind CSS</strong> üzerine öğrendiklerimi paylaşıyorum. Amacım hem kendimi geliştirmek hem de Türkçe kaynaklara katkıda bulunmak.
                </p>
            </div>
        </div>
    </div>

    <div class="mb-12">
        <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">Kullandığım Teknolojiler</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition text-center group">
                <span class="text-4xl mb-3 block group-hover:scale-110 transition">🚀</span>
                <h4 class="font-bold text-gray-800">Laravel</h4>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition text-center group">
                <span class="text-4xl mb-3 block group-hover:scale-110 transition">🎨</span>
                <h4 class="font-bold text-gray-800">Tailwind</h4>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition text-center group">
                <span class="text-4xl mb-3 block group-hover:scale-110 transition">🐘</span>
                <h4 class="font-bold text-gray-800">PHP 8.x</h4>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition text-center group">
                <span class="text-4xl mb-3 block group-hover:scale-110 transition">💾</span>
                <h4 class="font-bold text-gray-800">MySQL</h4>
            </div>
        </div>
    </div>

    <div class="bg-gray-800 rounded-2xl p-8 text-center text-white shadow-lg mb-10">
        <h2 class="text-2xl font-bold mb-2">İletişime Geç</h2>
        <p class="text-gray-400 mb-6">Soruların veya önerilerin mi var? Bana yazmaktan çekinme.</p>
        <a href="mailto:info@blogprojem.com" class="inline-block bg-indigo-500 hover:bg-indigo-600 text-white font-medium py-3 px-8 rounded-full transition shadow-lg">
            Mail Gönder
        </a>
    </div>

</div>
@endsection
