<!-- resources/views/categories/create.blade.php -->
@extends('app')

@section('content')
<div class="card mt-5">
    <h2 class="card-header">Buat Kategori Baru</h2>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Ada beberapa masalah dengan inputan Anda.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" name="name" class="form-control" placeholder="Nama Kategori">
            </div>
            <div class="form-group">
                <label for="description">Deskripsi:</label>
                <textarea name="description" class="form-control" placeholder="Deskripsi Kategori"></textarea>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                <a class="btn btn-secondary" href="{{ route('categories.index') }}">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
