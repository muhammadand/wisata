@extends('layoutadmin.template')

@section('content')
<div class="card mt-5">
  <h2 class="card-header">Edit Tiket</h2>
  <div class="card-body">
  
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('tiket.index') }}">
            <i class="fa fa-arrow-left"></i> Back
        </a>
    </div>
  
    <form action="{{ route('tiket.update', $tiket->id) }}" method="POST">
        @csrf
        @method('PUT')
  
        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>Name:</strong></label>
            <input 
                type="text" 
                name="nama_tiket" 
                value="{{ $tiket->nama_tiket }}"
                class="form-control @error('nama_tiket') is-invalid @enderror" 
                id="inputName" 
                placeholder="Name">
            @error('nama_tiket')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
  
        <div class="mb-3">
            <label for="inputStok" class="form-label"><strong>Stok:</strong></label>
            <input 
                type="text" 
                name="stok" 
                value="{{ $tiket->stok }}"
                class="form-control @error('stok') is-invalid @enderror" 
                id="inputStok" 
                placeholder="Stok">
            @error('stok')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputHarga" class="form-label"><strong>Harga:</strong></label>
            <input 
                type="text" 
                name="harga" 
                value="{{ $tiket->harga }}"
                class="form-control @error('harga') is-invalid @enderror" 
                id="inputHarga" 
                placeholder="Harga">
            @error('harga')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">
            <i class="fa fa-save"></i> Update
        </button>
    </form>
  
  </div>
</div>
@endsection
