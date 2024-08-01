<?php

namespace App\Http\Controllers;

use App\Models\SeniBudaya;
use App\Models\Category;
use App\Models\Sejarah;
use App\Models\Product;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class SeniBudayaController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $username = Auth::user()->name;
        $query = SeniBudaya::query()->with('category');

        if ($request->has('search')) {
            $query->where('nama', 'like', '%' . $request->input('search') . '%')
                  ->orWhere('deskripsi', 'like', '%' . $request->input('search') . '%');
        }

        if ($request->has('category_id') && $request->input('category_id') != '') {
            $query->where('category_id', $request->input('category_id'));
        }

        $seniBudayas = $query->get();
        $categories = Category::all();

        return view('seni_budaya.index', compact('seniBudayas', 'categories','username'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('seni_budaya.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'category_id' => 'required|exists:categories,id',
    ]);

    $data = $request->all();
    
    if ($request->hasFile('gambar')) {
        // Hapus gambar lama jika ada
        if ($request->has('old_gambar')) {
            Storage::delete($request->input('old_gambar'));
        }
        // Simpan gambar baru
        $data['gambar'] = $request->file('gambar')->store('public/seni_budaya');
    }

    SeniBudaya::create($data);

    return redirect()->route('seni_budaya.index')->with('success', 'Seni Budaya created successfully.');
}


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SeniBudaya  $seniBudaya
     * @return \Illuminate\Http\Response
     */
    public function show(SeniBudaya $seniBudaya)
    {
        // count
          //count
          $wisataCount = Wisata::count();
          $sejarahCount = Sejarah::count();
          $productCount = Product::count();
          $senibudayaCount = SeniBudaya::count();

        $otherSenibudaya = SeniBudaya::where('id', '!=', $seniBudaya)->latest()->take(1)->get();
        return view('seni_budaya.show', compact('seniBudaya','otherSenibudaya','wisataCount','sejarahCount','senibudayaCount','productCount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SeniBudaya  $seniBudaya
     * @return \Illuminate\Http\Response
     */
    public function edit(SeniBudaya $seniBudaya)
    {
        $categories = Category::all();
        return view('seni_budaya.edit', compact('seniBudaya', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SeniBudaya  $seniBudaya
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SeniBudaya $seniBudaya)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);
    
        $data = $request->all();
    
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($seniBudaya->gambar) {
                Storage::delete($seniBudaya->gambar);
            }
            // Simpan gambar baru
            $data['gambar'] = $request->file('gambar')->store('public/seni_budaya');
        } else {
            $data['gambar'] = $seniBudaya->gambar;
        }
    
        $seniBudaya->update($data);
    
        return redirect()->route('seni_budaya.index')->with('success', 'Seni Budaya updated successfully.');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SeniBudaya  $seniBudaya
     * @return \Illuminate\Http\Response
     */
    public function destroy(SeniBudaya $seniBudaya)
    {
        if ($seniBudaya->gambar) {
            Storage::disk('public')->delete($seniBudaya->gambar);
        }
        $seniBudaya->delete();

        return redirect()->route('seni_budaya.index')->with('success', 'Seni Budaya deleted successfully.');
    }
}
