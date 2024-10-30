<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data post dengan relasi kategori
        $posts = Post::with('kategori')->get();
    
        // Tampilkan halaman index dan kirim data
        return view('admin.posts.index', [
            'posts' => $posts,
            'title' => 'Post',
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil semua data kategori
        $categories = Category::all(); // Pastikan ini mengacu pada tabel 'kategoris'

    
        // Tampilkan halaman create dan kirim data kategori
        return view('admin.posts.create', [
            'categories' => $categories,  // Pastikan ini sudah benar
            'title' => 'Buat Post',
        ]);
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'category_id' => 'required|', // Perbaikan di sini
        'status' => 'required|string',
    ]);

    try {
        // Simpan data post baru hanya satu kali
        Post::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'user_id' => Auth::id(),
            'kategori_id' => $validated['category_id'],  // Pastikan ini sesuai dengan field yang ada
            'status' => $validated['status'],
        ]);

        return redirect('/posts')->with('success', 'Post berhasil ditambahkan');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => $e->getMessage()]);
    }
}

    

    

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //ambil semua data category
        $categories = Category::all();

        //tampilan halaman edit dan kirim data post dan category
        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => $categories,
            'title' => 'Edit Post',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // Validate the input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required',
            'status' => 'required|string',
        ]);
    
        try {
            // Update the post
            $post->update([
                'title' => $validated['title'],
                'content' => $validated['content'],
                'category_id' => $validated['category_id'],
                'status' => $validated['status'],
            ]);
    
            // Redirect with success message
            return redirect()->route('posts.index')->with('success', 'Post berhasil diedit');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Delete the post
        $post->delete();
    
        // Redirect with a success message
        return redirect('/posts')->with('success', 'Post berhasil dihapus');
    }
    
}
