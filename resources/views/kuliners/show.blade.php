<!-- resources/views/kuliners/show.blade.php -->
@extends('app')

@section('content')
<div class="card mt-5">
    <h2 class="card-header">{{ $kuliner->nama }}</h2>
    <div class="card-body">
        <p><strong>Harga: </strong>{{ $kuliner->harga }}</p>
        <p><strong>Deskripsi: </strong>{{ $kuliner->deskripsi }}</p>
        @if($kuliner->gambar)
            <img src="{{ asset('images/' . $kuliner->gambar) }}" alt="{{ $kuliner->nama }}" style="width: 100px;">
        @endif
        <a href="{{ route('kuliners.edit', $kuliner->id) }}" class="btn btn-warning mt-3">Edit</a>
        <form action="{{ route('kuliners.destroy', $kuliner->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger mt-3">Hapus</button>
        </form>
    </div>
</div>
@endsection
