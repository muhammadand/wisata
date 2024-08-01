<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tiket; // Pastikan Anda sudah membuat model Tiket
use App\Models\Order; // Pastikan Anda sudah membuat model Order
use App\Models\SeniBudaya;
use App\Models\Product;
use App\Models\Sejarah;
use App\Models\Wisata;


class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $category = $request->input('category'); // Menambahkan input untuk kategori
        $results = collect();
    
        // Hitung total tiket dan order
        $totalTikets = Tiket::count();
        $totalOrders = Order::count();
    
        // Jika query pencarian ada
        if ($query) {
            switch ($category) {
                case 'sejarah':
                    $results = Sejarah::where('judul', 'LIKE', "%{$query}%")
                                ->orWhere('deskripsi', 'LIKE', "%{$query}%")
                                ->get();
                    break;
    
                case 'products':
                    $results = Product::where('nama', 'LIKE', "%{$query}%")
                                ->orWhere('deskripsi', 'LIKE', "%{$query}%")
                                ->get();
                    break;
    
                case 'seni_budaya':
                    $results = SeniBudaya::where('nama', 'LIKE', "%{$query}%")
                                ->orWhere('deskripsi', 'LIKE', "%{$query}%")
                                ->get();
                    break;
    
                case 'wisata':
                default:
                    $results = Wisata::where('nama', 'LIKE', "%{$query}%")
                                ->orWhere('deskripsi', 'LIKE', "%{$query}%")
                                ->get();
                    break;
            }
    
            return view('search.results', compact('results', 'query'));
        }
    
        // Ambil data terbaru dari masing-masing kategori
        $wisata = Wisata::latest()->first();
        $seniBudaya = SeniBudaya::latest()->first();
        $sejarah = Sejarah::latest()->first();
        $product = Product::latest()->first();
    
        // Ambil semua data terkait untuk ditampilkan di halaman utama
        $tikets = Tiket::all();
        $products = Product::all();
        $seniBudayas = SeniBudaya::all();
        $wisatas = Wisata::all();
        $sejarahs = Sejarah::all();
    
        return view('home', compact('totalTikets', 'totalOrders', 'tikets', 'products', 'wisatas', 'sejarahs', 'seniBudayas', 'wisata', 'seniBudaya', 'sejarah', 'product'));
    }
    
    


    public function about()
    {
        // Mengambil jumlah total tiket dari database
        $totalTikets = Tiket::count();
        $totalOrders = Order::count();
        $tikets = Tiket::all();

        // Mengirimkan data total tiket ke tampilan
        return view('about', compact('totalTikets', 'totalOrders', 'tikets'));
    }

    public function contact()
    {
        // Mengambil jumlah total tiket dari database
        $totalTikets = Tiket::count();
        $totalOrders = Order::count();
        $tikets = Tiket::all();

        // Mengirimkan data total tiket ke tampilan
        return view('contact', compact('totalTikets', 'totalOrders', 'tikets'));
    }
}
