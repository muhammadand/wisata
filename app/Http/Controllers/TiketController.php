<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Tiket;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return response()
     */
    public function index(): View
    {
        $tikets = Tiket::latest()->paginate(5);
        $totalTikets = Tiket::count();
        $totalOrders = Order::count();
        $username = Auth::user()->name;
        
        return view('tikets.index', compact('tikets', 'totalTikets', 'totalOrders', 'username'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    
  
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
{
    $username = Auth::user()->name; // Mengambil nama pengguna yang sedang login
    $tikets = Tiket::latest()->paginate(5);
    $totalTikets = Tiket::count();
    $totalOrders = Order::count();
    
    return view('tikets.create', compact('username','tikets', 'totalTikets', 'totalOrders'));
}
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'nama_tiket' => 'required',
        'harga' => 'required',
        'stok' => 'required|integer', // Menambahkan validasi untuk memastikan stok adalah angka
    ]);

    // Ubah request stok menjadi integer sebelum disimpan
    $request->merge(['stok' => (int) $request->stok]);

    Tiket::create($request->all());

    return redirect()->route('tikets.index')
                     ->with('success', 'Tiket created successfully.');
}

    
  
    /**
     * Display the specified resource.
     */
    public function show(Tiket $tiket): View
    {
        $totalTikets = Tiket::count();
        $totalOrders = Order::count();
        $username = Auth::user()->name;
    
        return view('tikets.show', compact('tiket', 'totalTikets', 'totalOrders', 'username'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tiket $tiket): View
    {
        $tikets = Tiket::latest()->paginate(5);
        $totalTikets = Tiket::count();
        $totalOrders = Order::count();
        $username = Auth::user()->name;
        return view('tikets.edit', compact('tiket','totalTikets','totalOrders','username'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tiket $tiket): RedirectResponse
    {
        $request->validate([
            'nama_tiket' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ]);
    
        $tiket->update($request->all());
      
        return redirect()->route('tikets.index')
                         ->with('success', 'Tiket updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tiket $tiket): RedirectResponse
    {
        $tiket->delete();
         
        return redirect()->route('tikets.index')
                         ->with('success', 'Tiket deleted successfully');
    }
}
