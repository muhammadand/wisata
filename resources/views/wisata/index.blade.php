@extends('layoutadmin.template')

@section('content')
<div class="card mt-5">
    <h2 class="card-header">Daftar Wisata</h2>
    <div class="card-body">

        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif

        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
            <a class="btn btn-success btn-sm" href="{{ route('wisata.create') }}"> 
                <i class="fa fa-plus"></i> Buat Wisata Baru
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="80px">No</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Kontak</th>
                        <th>Foto Sampul</th>
                        <th>Foto Galeri</th>
                        <th>Kategori</th>
                        <th width="250px">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                @forelse ($wisatas as $wisata)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $wisata->nama }}</td>
                        <td>{{ $wisata->deskripsi }}</td>
                        <td>{{ $wisata->kontak }}</td>
                        <td>
                            <a href="#" class="text-primary" onclick="showPreview('{{ asset('storage/' . $wisata->foto_sampul) }}')">Lihat Foto</a>
                        </td>
                        <td>
                            @php
                                $fotoGaleri = json_decode($wisata->foto_galeri);
                            @endphp
                            @if(is_array($fotoGaleri))
                                @foreach($fotoGaleri as $foto)
                                    <a href="#" class="text-primary d-block" onclick="showPreview('{{ asset('storage/' . $foto) }}')">Lihat Foto</a>
                                @endforeach
                            @endif
                        </td>
                        <td>{{ $wisata->category->name }}</td>
                        <td>
                            <form action="{{ route('wisata.destroy', $wisata->id) }}" method="POST">
                                <a class="btn btn-info btn-sm" href="{{ route('wisata.show', $wisata->id) }}">
                                    <i class="fa-solid fa-list"></i> Lihat
                                </a>
                                <a class="btn btn-primary btn-sm" href="{{ route('wisata.edit', $wisata->id) }}">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                </a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fa-solid fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">Tidak ada data.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal for Image Preview -->
<div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-labelledby="imagePreviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imagePreviewModalLabel">Pratinjau Foto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img id="imagePreview" src="" alt="Pratinjau Foto" class="img-fluid">
            </div>
        </div>
    </div>
</div>

<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

<script>
function showPreview(src) {
    document.getElementById('imagePreview').src = src;
    var myModal = new bootstrap.Modal(document.getElementById('imagePreviewModal'));
    myModal.show();
}
</script>
@endsection
