<!-- resources/views/kuliners/index.blade.php -->
@extends('app')

@section('content')
<div class="card mt-5">
    <h2 class="card-header">Daftar Kuliner</h2>
    <div class="card-body">
        <a href="{{ route('kuliners.create') }}" class="btn btn-primary mb-3">Tambah Kuliner</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kuliners as $kuliner)
                    <tr>
                        <td>{{ $kuliner->nama }}</td>
                        <td>{{ $kuliner->harga }}</td>
                        <td>{{ $kuliner->deskripsi }}</td>
                        <td>
                            @if($kuliner->gambar)
                                <img src="{{ asset('images/' . $kuliner->gambar) }}" alt="{{ $kuliner->nama }}" style="width: 100px;">
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('kuliners.edit', $kuliner->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('kuliners.destroy', $kuliner->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
