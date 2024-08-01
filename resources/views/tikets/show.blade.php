@extends('layoutadmin.template')

@section('content')
<div class="card mt-5">
  <h2 class="card-header">Detail Tiket</h2>
  <div class="card-body">
  
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('tiket.index') }}">
            <i class="fa fa-arrow-left"></i> Back
        </a>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="inputName" class="form-label"><strong>Name:</strong></label>
                <p>{{ $tiket->nama_tiket }}</p>
            </div>

            <div class="mb-3">
                <label for="inputStok" class="form-label"><strong>Stok:</strong></label>
                <p>{{ $tiket->stok }}</p>
            </div>

            <div class="mb-3">
                <label for="inputHarga" class="form-label"><strong>Harga:</strong></label>
                <p>{{ $tiket->harga }}</p>
            </div>
        </div>

        <div class="col-md-6">
            {{-- Tambahkan kode untuk menampilkan gambar tiket jika perlu --}}
        </div>
    </div>
  
  </div>
</div>
@endsection
