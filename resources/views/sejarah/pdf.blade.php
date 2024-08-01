@extends('layoutadmin.template')
@section('content')

<h2>Daftar Sejarah</h2>
<table>
    <thead>
        <tr>
            <th>Judul</th>
            <th>Tanggal</th>
            <th>Lokasi</th>
            <th>Kategori</th>
            <th>Foto</th>
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
                        <img src="{{ public_path('storage/' . $sejarah->foto) }}" alt="Foto Sejarah" style="max-width: 100px; max-height: 100px;">
                    @else
                        <span class="text-muted">Tidak ada foto</span>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection