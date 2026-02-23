<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth; // EKLENDİ: Kullanıcı işlemleri için

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('blog.index', compact('posts'));
    }

    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $counter = 1;
        while (Post::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        }

        Post::create([
            'user_id' => Auth::id(), // EKLENDİ: Yazıyı yazan kişinin ID'si
            'title' => $request->title,
            'content' => $request->content,
            'slug' => $slug,
            'image' => $imagePath
        ]);

        return redirect()->route('blog.index')->with('basari', 'Yazı başarıyla eklendi!');
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('blog.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        // GÜVENLİK: Yazı sahibi değilse engelle
        if ($post->user_id !== Auth::id()) {
            abort(403, 'Bu yazıyı düzenlemeye yetkiniz yok.');
        }

        return view('blog.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        // GÜVENLİK: Yazı sahibi değilse engelle
        if ($post->user_id !== Auth::id()) {
            abort(403, 'Bu yazıyı güncellemeye yetkiniz yok.');
        }

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $post->image = $request->file('image')->store('posts', 'public');
        }

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $post->image
        ]);

        return redirect()->route('blog.index')->with('basari', 'Yazı güncellendi!');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        // GÜVENLİK: Yazı sahibi değilse engelle
        if ($post->user_id !== Auth::id()) {
            abort(403, 'Bu yazıyı silmeye yetkiniz yok.');
        }

        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
        $post->delete();

        return redirect()->route('blog.index')->with('basari', 'Yazı silindi!');
    }
}
