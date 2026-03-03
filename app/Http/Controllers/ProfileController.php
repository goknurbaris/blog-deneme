<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Profil sayfasını ekrana getirir (Yeni oluşturduğumuz profil-duzenle sayfasına gider)
     */
    public function edit(Request $request): View
    {
        return view('profil-duzenle', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Profil bilgilerini ve FOTOĞRAFI günceller
     */
    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', \Illuminate\Validation\Rule::unique('users')->ignore($request->user()->id)],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        $user = $request->user();
        $user->name = $request->name;
        $user->email = $request->email;

        // Fotoğraf yüklendiyse kaydet
        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $path;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('basari', 'Profilin başarıyla güncellendi ve fotoğrafın yüklendi! 🚀');
    }

    /**
     * Kullanıcı hesabını siler
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();
        Auth::logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
