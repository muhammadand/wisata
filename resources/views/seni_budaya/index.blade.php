@extends('layoutadmin.template')

@section('content')
<div class="card mt-5">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h2>Daftar Seni Budaya</h2>
        <a class="btn btn-primary" href="{{ route('seni_budaya.create') }}">Tambah Seni Budaya</a>
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="GET" action="{{ route('seni_budaya.index') }}" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Cari Seni Budaya" value="{{ request('search') }}">
                </div>
                <div class="col-md-4">
                    <select name="category_id" class="form-control">
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
            </div>
        </form>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($seniBudayas as $seniBudaya)
                    <tr>
                        <td>{{ $seniBudaya->nama }}</td>
                        <td>{{ $seniBudaya->deskripsi }}</td>
                        <td>
                            @if($seniBudaya->gambar)
                                <img src="{{ asset('storage/' . str_replace('public/', '', $seniBudaya->gambar)) }}" width="100">
                            @else
                                Tidak ada gambar
                            @endif
                        </td>
                        <td>{{ $seniBudaya->category->name }}</td>
                        <td>
                            <a class="btn btn-info btn-sm" href="{{ route('seni_budaya.show', $seniBudaya->id) }}">Lihat</a>
                            <a class="btn btn-primary btn-sm" href="{{ route('seni_budaya.edit', $seniBudaya->id) }}">Edit</a>
                            <form action="{{ route('seni_budaya.destroy', $seniBudaya->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
