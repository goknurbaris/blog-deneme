@extends('layouts.app')

@section('title', 'Şifre Sıfırlama')

@section('content')
<div class="flex justify-center items-center min-h-[calc(100vh-200px)]">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg border border-gray-100 p-8">

        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Şifreni mi Unuttun? 🔒</h1>
            <p class="text-gray-500 mt-2">Endişelenme, e-posta adresini gir, sana bir link gönderelim.</p>
        </div>

        @if (session('status'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">E-Posta Adresi</label>
                <input id="email" type="email" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition shadow-sm @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="ornek@email.com">

                @error('email')
                    <span class="text-red-500 text-sm mt-1 block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div>
                <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                    Şifre Sıfırlama Linkini Gönder
                </button>
            </div>
        </form>

        <div class="mt-6 text-center text-sm text-gray-500">
            <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500 flex items-center justify-center">
                <span class="mr-1">&larr;</span> Giriş Ekranına Dön
            </a>
        </div>
    </div>
</div>
@endsection
