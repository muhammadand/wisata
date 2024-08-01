<!-- resources/views/kuliners/edit.blade.php -->
@extends('app')

@section('content')
<div class="card mt-5">
    <h2 class="card-header">Edit Kuliner</h2>
    <div class="card-body">
        <form action="{{ route('kuliners.update', $kuliner->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $kuliner->nama }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="harga">Harga</label>
                <input type="number" name="harga" class="form-control" value="{{ $kuliner->harga }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" class="form-control">{{ $kuliner->deskripsi }}</textarea>
            </div>
            <div class="form-group mb-3">
                <label for="gambar">Gambar</label>
                <input type="file" name="gambar" class="form-control">
                @if($kuliner->gambar)
                    <img src="{{ asset('images/' . $kuliner->gambar) }}" alt="{{ $kuliner->nama }}" style="width: 100px;">
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
