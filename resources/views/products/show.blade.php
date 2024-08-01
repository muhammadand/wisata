@extends('layout.template')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <!-- Gambar Produk -->
            @if($product->gambar)
                <div class="product-image mb-4">
                    <img src="{{ Storage::url($product->gambar) }}" alt="Gambar Produk" class="img-fluid rounded shadow-sm">
                </div>
            @endif
        </div>
        <div class="col-md-6">
            <!-- Detail Produk -->
            <h1>{{ $product->nama }}</h1>
            <p class="text-muted">Kategori: <a href="{{ route('categories.show', $product->category->id) }}">{{ $product->category->name }}</a></p>
            <h3 class="text-danger">Rp {{ number_format($product->harga, 3, ',', '.') }}</h3>
            <p class="text-muted">Stok: {{ $product->stok }}</p>
            <p class="mt-4">{{ $product->deskripsi }}</p>
            <div class="mt-4">
                <a href="https://wa.me/{{ $product->no_wa }}" class="btn btn-success" target="_blank">
                    <i class="bi bi-whatsapp"></i> Hubungi via WhatsApp
                </a>
            </div>
            <div class="mt-2">
                <a href="{{ route('products.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .product-image img {
        max-width: 100%;
        height: auto;
    }
    .btn-success {
        background-color: #25D366;
        border-color: #25D366;
    }
    .btn-success:hover {
        background-color: #1ebf66;
        border-color: #1ebf66;
    }
    .bi-whatsapp {
        font-size: 1.2rem;
    }
</style>
@endpush
