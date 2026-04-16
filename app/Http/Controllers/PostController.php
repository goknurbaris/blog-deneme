<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    // 1. Yazıları Listele ve Ara
    public function index(Request $request)
    {
        $query = Post::with(['user'])->latest();
        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('content', 'like', '%' . $request->search . '%');
        }
        return view('blog.index', ['posts' => $query->get()]);
    }

    // 2. Yazı Detayını Göster
    public function show($slug)
    {
        $post = Post::with(['user', 'likes', 'comments'])->where('slug', $slug)->firstOrFail();
        return view('blog.show', compact('post'));
    }

    // 3. Yeni Yazı Yazma Formu
    public function create() { return view('blog.create'); }

    // 4. Yazıyı Kaydet (Benzersiz URL Korumalı)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ]);

        $imagePath = $request->hasFile('image') ? $request->file('image')->store('posts', 'public') : null;
        $slug = Str::slug($validated['title']);
        $orijinalSlug = $slug; $sayac = 1;
        while (Post::where('slug', $slug)->exists()) { $slug = $orijinalSlug . '-' . $sayac; $sayac++; }
        $defaultCategory = Category::firstOrCreate(
            ['slug' => 'genel'],
            ['name' => 'Genel']
        );

        Auth::user()->posts()->create([
            'title' => $validated['title'],
            'slug' => $slug,
            'content' => $validated['content'],
            'image' => $imagePath,
            'category_id' => $defaultCategory->id,
        ]);
        return redirect()->route('blog.index')->with('basari', 'Yazı paylaşıldı! ✨');
    }

    // 5. Yönetici Paneli (Dashboard)
    public function dashboard()
    {
        $toplamYazi = Post::count();
        $toplamYazar = \App\Models\User::count();
        $toplamBegeni = Like::count();
        $benimYazilarim = Post::where('user_id', Auth::id())->latest()->get();
        return view('dashboard', compact('toplamYazi', 'toplamYazar', 'toplamBegeni', 'benimYazilarim'));
    }

    // 6. Yazı Düzenleme Sayfası
    public function edit($id)
    {
        $post = Post::where('user_id', Auth::id())->findOrFail($id);
        return view('blog.edit', compact('post'));
    }

    // 7. Yazıyı Güncelle
   // 7. Yazıyı Güncelle (Doğru Hali)
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ]);

        $post = Post::where('user_id', Auth::id())->findOrFail($id);
        $post->title = $validated['title'];
        $post->content = $validated['content'];

        if ($request->hasFile('image')) {
            $post->image = $request->file('image')->store('posts', 'public');
        }

        $post->save();
        return redirect()->route('dashboard')->with('basari', 'Yazı başarıyla güncellendi! ✏️');
    }

    // 8. Yazıyı Sil
    public function destroy($id)
    {
        $post = Post::where('user_id', Auth::id())->findOrFail($id);
        $post->delete();
        return back()->with('basari', 'Yazı başarıyla silindi! 🗑️');
    }

    // 9. Beğeni (Like) İşlemi
    public function like($id)
    {
        $post = Post::findOrFail($id);
        $existingLike = Like::where('post_id', $post->id)->where('user_id', Auth::id())->first();
        if ($existingLike) { $existingLike->delete(); $liked = false; }
        else { Like::create(['post_id' => $post->id, 'user_id' => Auth::id()]); $liked = true; }
        return response()->json(['status' => 'success', 'liked' => $liked, 'count' => $post->likes()->count()]);
    }

    // 10. Yorum Kaydet
    public function commentStore(Request $request, $id)
    {
        $validated = $request->validate([
            'content' => ['required', 'string', 'max:2000'],
        ]);

        $post = Post::findOrFail($id);
        $post->comments()->create([
            'user_name' => Auth::user()->name,
            'content' => $validated['content'],
        ]);
        return back()->with('basari', 'Yorum eklendi! 😊');
    }
}
