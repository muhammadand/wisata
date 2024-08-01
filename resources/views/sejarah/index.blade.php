@extends('layoutadmin.template')

@section('content')
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2>Daftar Sejarah</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('sejarah.pdf') }}" class="btn btn-secondary">Unduh PDF</a>
            <a href="{{ route('sejarah.create') }}" class="btn btn-primary">Tambah Sejarah Baru</a>
        </div>
    </div>

    <!-- Pencarian dan Filter -->
    <div class="row mb-4">
        <div class="col-md-6">
            <form action="{{ route('sejarah.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control me-2" placeholder="Cari Sejarah" value="{{ request('search') }}">
                <button type="submit" class="btn btn-outline-secondary">Cari</button>
            </form>
        </div>
        <div class="col-md-6">
            <form action="{{ route('sejarah.index') }}" method="GET">
                <div class="input-group">
                    <select name="category_id" class="form-select" onchange="this.form.submit()">
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>
    </div>

    @if ($sejarahs->isEmpty())
        <div class="alert alert-info">
            Tidak ada data sejarah yang ditemukan.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Tanggal</th>
                        <th>Lokasi</th>
                        <th>Kategori</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sejarahs as $sejarah)
                        <tr>
                            <td>{{ $sejarah->judul }}</td>
                            <td>{{ \Carbon\Carbon::parse($sejarah->tanggal)->format('d-m-Y') }}</td>
                            <td>{{ $sejarah->lokasi }}</td>
                            <td>{{ $sejarah->category->name }}</td>
                            <td>
                                @if($sejarah->foto)
                                    <img src="{{ Storage::url($sejarah->foto) }}" alt="Foto Sejarah" class="img-thumbnail" style="max-width: 100px; max-height: 100px;">
                                @else
                                    <span class="text-muted">Tidak ada foto</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('sejarah.show', $sejarah->id) }}" class="btn btn-info btn-sm">Lihat</a>
                                    <a href="{{ route('sejarah.edit', $sejarah->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('sejarah.destroy', $sejarah->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus ini?');">
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
    @endif
</div>
@endsection
