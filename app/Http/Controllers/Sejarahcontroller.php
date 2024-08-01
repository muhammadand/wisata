<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Sejarah;
use App\Models\Wisata;
use App\Models\SeniBudaya;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;

class SejarahController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Tampilkan daftar semua sejarah.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $username = Auth::user()->name;
        
        $query = Sejarah::query()->with('category');

        if ($request->has('search')) {
            $query->where('judul', 'like', '%' . $request->input('search') . '%')
                  ->orWhere('lokasi', 'like', '%' . $request->input('search') . '%');
        }

        if ($request->has('category_id') && $request->input('category_id') != '') {
            $query->where('category_id', $request->input('category_id'));
        }

        $sejarahs = $query->get();
        $categories = Category::all();

        return view('sejarah.index', compact('sejarahs', 'categories','username'));
    }

    /**
     * Tampilkan formulir untuk membuat sejarah baru.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::all();
        return view('sejarah.create', compact('categories'));
    }

    /**
     * Simpan sejarah baru ke database.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'tanggal' => 'required|date',
            'lokasi' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sumber' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $data = $request->all();
        
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($request->has('old_foto')) {
                Storage::delete($request->input('old_foto'));
            }
            // Simpan foto baru
            $data['foto'] = $request->file('foto')->store('public/sejarah');
        }

        Sejarah::create($data);
        return redirect()->route('sejarah.index')->with('success', 'Sejarah berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail sejarah.
     *
     * @param Sejarah $sejarah
     * @return \Illuminate\View\View
     */
    public function show(Sejarah $sejarah)
    {
        $wisataCount = Wisata::count();
        $sejarahCount = Sejarah::count();
        $productCount = Product::count();
        $senibudayaCount = SeniBudaya::count();

        $othersejarah = Sejarah::where('id', '!=', $sejarah)->latest()->take(1)->get();
        return view('sejarah.show', compact('sejarah','othersejarah','wisataCount','sejarahCount','senibudayaCount','productCount'));
    }

    /**
     * Tampilkan formulir untuk mengedit sejarah.
     *
     * @param Sejarah $sejarah
     * @return \Illuminate\View\View
     */
    public function edit(Sejarah $sejarah)
    {
        $categories = Category::all();
        return view('sejarah.edit', compact('sejarah', 'categories'));
    }

    /**
     * Perbarui sejarah yang ada di database.
     *
     * @param \Illuminate\Http\Request $request
     * @param Sejarah $sejarah
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Sejarah $sejarah)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'tanggal' => 'required|date',
            'lokasi' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sumber' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $data = $request->all();

        // Hapus foto lama jika ada dan ada foto baru yang diupload
        if ($request->hasFile('foto')) {
            Storage::delete($sejarah->foto); // Hapus foto lama
            $data['foto'] = $request->file('foto')->store('public/sejarah');
        } elseif ($request->has('old_foto')) {
            $data['foto'] = $request->input('old_foto');
        }

        $sejarah->update($data);
        return redirect()->route('sejarah.index')->with('success', 'Sejarah berhasil diperbarui.');
    }

    /**
     * Hapus sejarah dari database.
     *
     * @param Sejarah $sejarah
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Sejarah $sejarah)
    {
        // Hapus foto terkait jika ada
        if ($sejarah->foto) {
            Storage::delete($sejarah->foto);
        }

        $sejarah->delete();
        return redirect()->route('sejarah.index')->with('success', 'Sejarah berhasil dihapus.');
    }
      // Method untuk menghasilkan PDF
      public function generatePdf()
      {
          $sejarahs = Sejarah::with('category')->get();
          $pdf = PDF::loadView('sejarah.pdf', compact('sejarahs'));
          return $pdf->download('daftar_sejarah.pdf');
      }
}
