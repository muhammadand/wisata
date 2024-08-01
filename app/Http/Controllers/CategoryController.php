<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Wisata;
use App\Models\Sejarah;
use App\Models\SeniBudaya;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('categories.index', compact('categories'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'Kategori berhasil dibuat.');
    }
    public function show($id)
    {
        $category = Category::with(['wisata', 'sejarah', 'seniBudaya','product'])->findOrFail($id);
        
        // Paginate other data
        $otherPosts = Wisata::where('id', '!=', $id)->latest()->paginate(5, ['*'], 'otherPostsPage');
        $otherSejarah = Sejarah::where('id', '!=', $id)->latest()->paginate(5, ['*'], 'otherSejarahPage');
        $otherProduct = Product::where('id', '!=', $id)->latest()->paginate(5, ['*'], 'otherProductPage');
        $otherSenibudaya = SeniBudaya::where('id', '!=', $id)->latest()->paginate(5, ['*'], 'otherSenibudayaPage');
    
        //count
        $wisataCount = Wisata::count();
        $sejarahCount = Sejarah::count();
        $productCount = Product::count();
        $senibudayaCount = SeniBudaya::count();
    
        return view('categories.show', compact('category', 'otherPosts', 'otherSejarah', 'otherProduct', 'otherSenibudaya', 
                                               'wisataCount', 'sejarahCount', 'productCount', 'senibudayaCount'));
    }
    
    

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}
