<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // 1. Tüm Yazıları Listele (Ana Sayfa)
    public function index()
    {
        $posts = Post::latest()->get();
        return view('blog.index', compact('posts'));
    }

    // 2. Yeni Yazı Ekleme Formu
    public function create()
    {
        return view('blog.create');
    }

    // 3. Yeni Yazıyı Kaydet
    public function store(Request $request)
    {
        Post::create([
            'title' => $request->title,
            'content' => $request->content
        ]);

        return redirect()->route('blog.index')->with('basari', 'Yazı eklendi!');
    }

    // 4. Düzenleme Formunu Göster
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('blog.edit', compact('post'));
    }

    // 5. Veritabanını Güncelle
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update([
            'title' => $request->title,
            'content' => $request->content
        ]);

        return redirect()->route('blog.index')->with('basari', 'Yazı güncellendi!');
    }

    // 6. Yazıyı Sil
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('blog.index')->with('basari', 'Yazı silindi!');
    }
}
