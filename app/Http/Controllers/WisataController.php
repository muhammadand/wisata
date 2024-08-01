<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use App\Models\Category;
use App\Models\SeniBudaya;
use App\Models\Sejarah;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WisataController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $username = Auth::user()->name;
        
        $wisatas = Wisata::latest()->paginate(10);
        foreach ($wisatas as $wisata) {
            // Log foto_galeri sebagai array
            $fotoGaleri = json_decode($wisata->foto_galeri);
            if (is_array($fotoGaleri)) {
                Log::info('Foto Galeri:', ['foto_galeri' => $fotoGaleri]);
            } else {
                Log::error('foto_galeri bukan array', ['foto_galeri' => $wisata->foto_galeri]);
            }
        }
        return view('wisata.index', compact('wisatas','username'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        $categories = Category::all();
        return view('wisata.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'kontak' => 'required',
            'foto_sampul' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto_galeri.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Handle the foto_sampul upload
        $fotoSampulPath = $request->file('foto_sampul')->store('images', 'public');

        // Handle the foto_galeri upload
        $fotoGaleriPaths = [];
        if ($request->hasFile('foto_galeri')) {
            foreach ($request->file('foto_galeri') as $image) {
                $fotoGaleriPaths[] = $image->store('images', 'public');
            }
        }

        Wisata::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'kontak' => $request->kontak,
            'foto_sampul' => $fotoSampulPath,
            'foto_galeri' => json_encode($fotoGaleriPaths), // Convert array to JSON
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('wisata.index')
            ->with('success', 'Wisata berhasil dibuat.');
    }

    public function show($id)
    {
        //count
        $wisataCount = Wisata::count();
        

        $wisata = Wisata::findOrFail($id);
        $otherPosts = Wisata::where('id', '!=', $id)->latest()->take(3)->get(); // Ambil 3 postingan terbaru selain yang sedang ditampilkan
        return view('wisata.show', compact('wisata', 'otherPosts', 'wisataCount'));
    }
    
    public function edit(Wisata $wisata)
    {
        $categories = Category::all();
        return view('wisata.edit', compact('wisata', 'categories'));
    }

    public function update(Request $request, Wisata $wisata)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'kontak' => 'required',
            'foto_sampul' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto_galeri.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Handle the foto_sampul upload
        if ($request->hasFile('foto_sampul')) {
            $fotoSampulPath = $request->file('foto_sampul')->store('images', 'public');
            $wisata->foto_sampul = $fotoSampulPath;
        }

        // Handle the foto_galeri upload
        $fotoGaleriPaths = json_decode($wisata->foto_galeri, true); // Convert JSON to array
        if ($request->hasFile('foto_galeri')) {
            foreach ($request->file('foto_galeri') as $image) {
                $fotoGaleriPaths[] = $image->store('images', 'public');
            }
        }
        $wisata->foto_galeri = json_encode($fotoGaleriPaths); // Convert array to JSON

        $wisata->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'kontak' => $request->kontak,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('wisata.index')
            ->with('success', 'Wisata berhasil diperbarui.');
    }

    public function destroy(Wisata $wisata)
    {
        $wisata->delete();
        return redirect()->route('wisata.index')
            ->with('success', 'Wisata berhasil dihapus.');
    }

    public function categoryWisata($id)
    {
        $category = Category::findOrFail($id); // Mengambil kategori berdasarkan ID
        $posts = $category->posts()->paginate(10); // Mengambil postingan dari kategori tersebut, misalnya dari relasi 'posts'
    
        return view('category.wisata')
            ->with('category', $category)
            ->with('posts', $posts);
    }
    
  
}
