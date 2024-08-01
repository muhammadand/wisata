<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Order;
use App\Models\Tiket;
use Illuminate\Http\RedirectResponse;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $totalOrders = Order::count();
        $totalRevenue = Order::sum('total_harga');
        $orders = Order::latest()->paginate(10);
        return view('orders.index', compact('orders', 'totalOrders', 'totalRevenue'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $totalTikets = Tiket::count();
        $totalOrders = Order::count();
        $tikets = Tiket::all();
        return view('orders.create', compact('tikets', 'totalTikets', 'totalOrders'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi data yang diterima dari request sesuai kebutuhan
        $validatedData = $request->validate([
            'tiket_id' => 'required|exists:tiket,id',
            'quantity' => 'required|numeric|min:1',
            'total_harga' => 'required|numeric|min:1',
        ]);

        // Mengambil harga tiket
        $tiket = Tiket::findOrFail($validatedData['tiket_id']);
        $totalPrice = $tiket->harga * $validatedData['quantity']; // Menghitung total harga

        // Simpan pesanan ke dalam database
        $order = new Order();
        $order->tiket_id = $validatedData['tiket_id'];
        $order->quantity = $validatedData['quantity'];
        $order->total_harga= $totalPrice; // Memasukkan total harga

        $order->save();

        // Redirect ke halaman yang sesuai setelah pesanan berhasil dibuat
        return redirect()->route('orders.index')->with('success', 'Order placed successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order): View
    {
        // Tampilkan detail pesanan
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order): View
    {
        $tikets = Tiket::all();
        return view('orders.edit', compact('order', 'tikets'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order): RedirectResponse
    {
        // Validasi data yang diterima dari request sesuai kebutuhan
        $validatedData = $request->validate([
            'tiket_id' => 'required|exists:tikets,id',
            'quantity' => 'required|numeric|min:1',
        ]);

        // Mengambil harga tiket
        $tiket = Tiket::findOrFail($validatedData['tiket_id']);
        $totalPrice = $tiket->harga * $validatedData['quantity']; // Menghitung total harga

        // Perbarui data pesanan
        $order->tiket_id = $validatedData['tiket_id'];
        $order->quantity = $validatedData['quantity'];
        $order->total_harga = $totalPrice; // Memasukkan total harga

        $order->save();

        // Redirect ke halaman yang sesuai setelah pesanan berhasil diperbarui
        return redirect()->route('orders.index')->with('success', 'Order updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order): RedirectResponse
    {
        // Hapus pesanan dari database
        $order->delete();

        // Redirect ke halaman yang sesuai setelah pesanan berhasil dihapus
        return redirect()->route('admin.orders')->with('success', 'Order deleted successfully!');
    }
}
