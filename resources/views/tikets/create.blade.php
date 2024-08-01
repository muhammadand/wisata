@extends('layoutadmin.template')
  
@section('content')
<div class="card mt-5">
  <h2 class="card-header">Tambah Tiket Baru</h2>
  <div class="card-body">
  
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('tiket.index') }}">
            <i class="fa fa-arrow-left"></i> Kembali
        </a>
    </div>
  
    <form action="{{ route('tiket.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
  
        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>Nama:</strong></label>
            <input 
                type="text" 
                name="nama_tiket" 
                class="form-control @error('nama_tiket') is-invalid @enderror" 
                id="inputName" 
                placeholder="Nama tiket">
            @error('nama_tiket')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
  
        <div class="mb-3">
            <label for="inputDetail" class="form-label"><strong>Stok</strong></label>
            <textarea 
                class="form-control @error('stok') is-invalid @enderror" 
                style="height:150px" 
                name="stok" 
                id="inputDetail" 
                placeholder="stok"></textarea>
            @error('stok')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputHarga" class="form-label"><strong>Harga:</strong></label>
            <input 
                type="text" 
                name="harga" 
                class="form-control @error('harga') is-invalid @enderror" 
                id="inputHarga" 
                placeholder="Harga">
            @error('harga')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- <div class="mb-3">
            <label for="inputImage" class="form-label"><strong>Gambar:</strong></label>
            <input 
                type="file" 
                name="image" 
                class="form-control @error('image') is-invalid @enderror" 
                id="inputImage">
            @error('image')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div> --}}

        <button type="submit" class="btn btn-success">
            <i class="fa-solid fa-floppy-disk"></i> Simpan
        </button>
    </form>
  
  </div>
</div>
@endsection
