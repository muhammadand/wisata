<!-- resources/views/products/edit.blade.php -->
@extends('layoutadmin.template')

@section('content')
<div class="container mt-4">
    <h1>Edit Produk</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" value="{{ old('nama', $product->nama) }}" class="form-control" placeholder="Nama Produk">
            @error('nama')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="deskripsi">Deskripsi:</label>
            <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Produk">{{ old('deskripsi', $product->deskripsi) }}</textarea>
            @error('deskripsi')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="category_id">Kategori:</label>
            <select name="category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="harga">Harga:</label>
            <input type="number" step="0.01" name="harga" value="{{ old('harga', $product->harga) }}" class="form-control" placeholder="Harga Produk">
            @error('harga')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="stok">Stok:</label>
            <input type="number" name="stok" value="{{ old('stok', $product->stok) }}" class="form-control" placeholder="Jumlah Stok">
            @error('stok')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="gambar">Gambar:</label>
            @if($product->gambar)
                <div class="mb-2">
                    <img src="{{ Storage::url($product->gambar) }}" alt="Gambar Produk" width="100px">
                </div>
            @endif
            <input type="file" name="gambar" class="form-control">
            @error('gambar')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="no_wa">No. WA:</label>
            <input type="text" name="no_wa" value="{{ old('no_wa', $product->no_wa) }}" class="form-control" placeholder="Nomor WhatsApp">
            @error('no_wa')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
            <a class="btn btn-secondary" href="{{ route('products.index') }}">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection
