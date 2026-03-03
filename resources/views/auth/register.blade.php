<x-guest-layout>
    <h2 class="text-2xl font-extrabold text-slate-900 mb-6 text-center">Aramıza Katıl 🚀</h2>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <div>
            <label class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-1 ml-1">Ad Soyad</label>
            <input type="text" name="name" value="{{ old('name') }}" required autofocus
                class="w-full px-4 py-3 rounded-2xl border-slate-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all outline-none"
                placeholder="Adınız">
            <x-input-error :messages="$errors->get('name')" class="mt-1" />
        </div>

        <div>
            <label class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-1 ml-1">E-Posta</label>
            <input type="email" name="email" value="{{ old('email') }}" required
                class="w-full px-4 py-3 rounded-2xl border-slate-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all outline-none"
                placeholder="mail@adresiniz.com">
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-1 ml-1">Şifre</label>
                <input type="password" name="password" required
                    class="w-full px-4 py-3 rounded-2xl border-slate-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all outline-none"
                    placeholder="••••••">
            </div>
            <div>
                <label class="block text-xs font-bold uppercase tracking-widest text-slate-500 mb-1 ml-1">Tekrar</label>
                <input type="password" name="password_confirmation" required
                    class="w-full px-4 py-3 rounded-2xl border-slate-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all outline-none"
                    placeholder="••••••">
            </div>
            <x-input-error :messages="$errors->get('password')" class="col-span-2 mt-1" />
        </div>

        <button type="submit" class="w-full bg-indigo-600 hover:bg-slate-900 text-white font-bold py-4 rounded-2xl transition-all duration-300 transform active:scale-[0.98] shadow-lg shadow-indigo-100 mt-4">
            Hesap Oluştur
        </button>

        <p class="text-center text-slate-500 text-sm mt-4">
            Zaten üye misin?
            <a href="{{ route('login') }}" class="font-bold text-indigo-600 hover:underline">Giriş Yap</a>
        </p>
    </form>
</x-guest-layout>
