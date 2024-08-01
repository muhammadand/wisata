@extends('layoutadmin.template')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm rounded">
        <h2 class="card-header bg-primary text-white">Buat Wisata Baru</h2>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger mb-4">
                    <strong>Whoops!</strong> Ada beberapa masalah dengan inputan Anda.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('wisata.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <!-- Nama Wisata -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama" class="form-label">Nama Wisata</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama Wisata" value="{{ old('nama') }}">
                        </div>
                    </div>
                    <!-- Kontak -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kontak" class="form-label">Kontak</label>
                            <input type="text" name="kontak" class="form-control" placeholder="Kontak" value="{{ old('kontak') }}">
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <!-- Deskripsi -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="3" placeholder="Deskripsi Wisata">{{ old('deskripsi') }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <!-- Foto Sampul -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="foto_sampul" class="form-label">Foto Sampul</label>
                            <input type="file" name="foto_sampul" class="form-control" onchange="previewImage(event, 'preview_sampul')">
                            <img id="preview_sampul" class="img-thumbnail mt-2" style="max-width: 200px;">
                        </div>
                    </div>
                    <!-- Foto Galeri -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="foto_galeri" class="form-label">Foto Galeri</label>
                            <input type="file" name="foto_galeri[]" class="form-control" multiple onchange="previewImages(event, 'preview_galeri')">
                            <div id="preview_galeri" class="d-flex flex-wrap mt-2"></div>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <!-- Kategori -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="category_id" class="form-label">Kategori</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-list-alt"></i></span>
                                <select name="category_id" class="form-select">
                                    <option value="">Pilih Kategori</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Font Awesome CDN -->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3
                

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-secondary btn-lg" href="{{ route('wisata.index') }}">Kembali</a>
                    <button type="submit" class="btn btn-primary btn-lg">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<!-- JavaScript untuk pratinjau gambar -->
<script>
    function previewImage(event, previewId) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById(previewId);
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }

    function previewImages(event, previewId) {
        var files = event.target.files;
        var output = document.getElementById(previewId);
        output.innerHTML = '';
        for (var i = 0; i < files.length; i++) {
            var reader = new FileReader();
            reader.onload = function(e){
                var img = document.createElement('img');
                img.src = e.target.result;
                img.classList.add('img-thumbnail', 'm-1');
                img.style.maxWidth = '100px';
                img.style.maxHeight = '100px';
                output.appendChild(img);
            };
            reader.readAsDataURL(files[i]);
        }
    }
</script>
@endsection
