<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Tiket; // Import model Tiket
use App\Models\Order; // Import model Order
use App\Models\Wisata;
use App\Models\Sejarah;
use App\Models\SeniBudaya;
use App\Models\Product;
use App\Models\Feedback;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
          // Jika query pencarian ada
          if ($query) {
            $sejarahs = Sejarah::where('judul', 'LIKE', "%{$query}%")
                        ->orWhere('deskripsi', 'LIKE', "%{$query}%")
                        ->get();
    
            if ($sejarahs->isNotEmpty()) {
                return redirect()->route('sejarah.index', ['search' => $query]);
            }
    
            $products = Product::where('nama', 'LIKE', "%{$query}%")
                        ->orWhere('deskripsi', 'LIKE', "%{$query}%")
                        ->get();
    
            if ($products->isNotEmpty()) {
                return redirect()->route('products.index', ['search' => $query]);
            }
    
            $seniBudayas = SeniBudaya::where('nama', 'LIKE', "%{$query}%")
                        ->orWhere('deskripsi', 'LIKE', "%{$query}%")
                        ->get();
    
            if ($seniBudayas->isNotEmpty()) {
                return redirect()->route('seni_budaya.index', ['search' => $query]);
            }
    
            $wisatas = Wisata::where('nama', 'LIKE', "%{$query}%")
                        ->orWhere('deskripsi', 'LIKE', "%{$query}%")
                        ->get();
    
            if ($wisatas->isNotEmpty()) {
                return redirect()->route('wisata.index', ['search' => $query]);
            }
        }
        // Mengambil jumlah total tiket dari database
        $totalTikets = Tiket::count();
        $tikets = Tiket::latest()->paginate(5);
        $totalOrders = Order::count();
        $username = Auth::user()->name;
        $totalRevenue = Order::sum('total_harga');
        $orders = Order::latest()->paginate(10);
        $feedbacks = Feedback::all();

        //jumlah
        $wisataCount = Wisata::count();
        $sejarahCount = Sejarah::count();
        $productCount = Product::count();
        $senibudayaCount = SeniBudaya::count();

        // Mengirimkan data total tiket ke tampilan
        return view('admin.index', compact('orders', 'tikets', 'totalTikets', 'totalOrders', 'username', 'totalRevenue'
                                            ,'feedbacks','wisataCount','sejarahCount','productCount','senibudayaCount'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function orders()
    {
        $orders = Order::paginate(10); // Paginasi dengan 10 item per halaman
        $totalTikets = Tiket::count();
        $totalOrders = Order::count();
        $username = Auth::user()->name;
        return view('admin.orders', compact('orders', 'totalTikets', 'totalOrders', 'username'));
    }
}
