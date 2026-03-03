<x-guest-layout>
    <h2 class="text-2xl font-extrabold text-slate-900 mb-6 text-center">Tekrar Hoş Geldin! 👋</h2>

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <div>
            <label class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-2 ml-1">E-Posta Adresi</label>
            <input type="email" name="email" value="{{ old('email') }}" required autofocus
                class="w-full px-4 py-3 rounded-2xl border-slate-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all outline-none"
                placeholder="ornek@mail.com">
            <x-input-error :messages="$errors->get('email')" class="mt-1 ml-1" />
        </div>

        <div>
            <label class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-2 ml-1">Şifre</label>
            <input type="password" name="password" required
                class="w-full px-4 py-3 rounded-2xl border-slate-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all outline-none"
                placeholder="••••••••">
            <x-input-error :messages="$errors->get('password')" class="mt-1 ml-1" />
        </div>

        <div class="flex items-center justify-between text-sm px-1">
            <label class="flex items-center cursor-pointer group">
                <input type="checkbox" name="remember" class="rounded-md border-slate-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                <span class="ms-2 text-slate-600 group-hover:text-slate-900 transition">Beni hatırla</span>
            </label>
            <a href="{{ route('password.request') }}" class="font-semibold text-indigo-600 hover:text-indigo-700 transition">Şifremi Unuttum?</a>
        </div>

        <button type="submit" class="w-full bg-slate-900 hover:bg-indigo-600 text-white font-bold py-4 rounded-2xl transition-all duration-300 transform active:scale-[0.98] shadow-lg shadow-slate-200">
            Giriş Yap
        </button>

        <p class="text-center text-slate-500 text-sm mt-6">
            Hesabın yok mu?
            <a href="{{ route('register') }}" class="font-bold text-indigo-600 hover:underline">Hemen Kayıt Ol</a>
        </p>
    </form>
</x-guest-layout>
