<!-- resources/views/products/index.blade.php -->
@extends('layoutadmin.template')

@section('content')
@auth
<div class="container mt-4">
    <h1 class="mb-4">Daftar Produk</h1>
    
    <!-- Jumlah produk -->
    <p>Jumlah produk: {{ $products->count() }}</p> 

    <!-- Form Pencarian dan Filter Kategori -->
    <div class="mb-3">
        <form action="{{ route('products.index') }}" method="GET" class="row g-3 align-items-center">
            <div class="col-md-4">
                <label for="search" class="visually-hidden">Cari Produk</label>
                <input type="text" id="search" name="search" value="{{ request('search') }}" class="form-control" placeholder="Cari Produk...">
            </div>
            <div class="col-md-4">
                <label for="category_id" class="visually-hidden">Filter Kategori</label>
                <select name="category_id" id="category_id" class="form-control">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 mt-4">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </form>
    </div>

    <!-- Alert success -->
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <!-- Tombol Tambah Produk -->
    <div class="mb-3">
        <a href="{{ route('products.create') }}" class="btn btn-primary">Tambah Produk</a>
    </div>

    <!-- Tabel Daftar Produk -->
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->nama }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>Rp {{ number_format($product->harga, 2, ',', '.') }}</td>
                        <td>{{ $product->stok }}</td>
                        <td>
                            @if($product->gambar)
                                <img src="{{ Storage::url($product->gambar) }}" alt="Gambar Produk" class="img-thumbnail" style="max-width: 100px; max-height: 100px;">
                            @else
                                <span class="text-muted">Tidak ada gambar</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">Lihat</a>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@else
<div class="container mt-4">
    <h1 class="mb-4">Kamu bukan admin</h1>
    <p>Silakan login untuk mengakses halaman ini.</p>
    <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
</div>
@endauth
@endsection
