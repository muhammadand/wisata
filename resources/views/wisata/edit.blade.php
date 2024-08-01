@extends('layoutadmin.template')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm rounded">
        <h2 class="card-header bg-primary text-white">Edit Wisata</h2>
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

            <form action="{{ route('wisata.update', $wisata->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <!-- Nama Wisata -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama" class="form-label">Nama Wisata</label>
                            <input type="text" name="nama" value="{{ $wisata->nama }}" class="form-control" placeholder="Nama Wisata">
                        </div>
                    </div>
                    <!-- Lokasi dan Google Maps Link -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lokasi" class="form-label">Lokasi</label>
                            <input type="text" name="lokasi" value="{{ $wisata->lokasi }}" class="form-control" placeholder="Lokasi Wisata">
                        </div>
                        <div class="form-group mt-2">
                            <label for="google_maps" class="form-label">Link Google Maps</label>
                            <input type="text" name="google_maps" value="{{ $wisata->google_maps }}" class="form-control" placeholder="Link Google Maps">
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <!-- Deskripsi -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="3" placeholder="Deskripsi Wisata">{{ $wisata->deskripsi }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <!-- Jam Operasional dan Harga Tiket -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jam_oprasional" class="form-label">Jam Operasional</label>
                            <input type="text" name="jam_oprasional" value="{{ $wisata->jam_oprasional }}" class="form-control" placeholder="Jam Operasional">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="harga_tiket" class="form-label">Harga Tiket</label>
                            <input type="number" step="0.01" name="harga_tiket" value="{{ $wisata->harga_tiket }}" class="form-control" placeholder="Harga Tiket">
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <!-- Fasilitas -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="fasilitas" class="form-label">Fasilitas</label>
                            <textarea name="fasilitas" class="form-control" rows="3" placeholder="Fasilitas">{{ $wisata->fasilitas }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <!-- Kontak, TikTok, Instagram -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="kontak" class="form-label">Kontak</label>
                            <input type="text" name="kontak" value="{{ $wisata->kontak }}" class="form-control" placeholder="Kontak">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="social_media_tiktok" class="form-label">TikTok</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fab fa-tiktok"></i></span>
                                <input type="text" name="social_media_tiktok" value="{{ $wisata->social_media_tiktok }}" class="form-control" placeholder="Link TikTok">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="social_media_instagram" class="form-label">Instagram</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                                <input type="text" name="social_media_instagram" value="{{ $wisata->social_media_instagram }}" class="form-control" placeholder="Link Instagram">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <!-- Foto Sampul dan Foto Galeri -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="foto_sampul" class="form-label">Foto Sampul</label>
                            <input type="file" name="foto_sampul" class="form-control">
                            @if ($wisata->foto_sampul)
                                <img src="{{ Storage::url($wisata->foto_sampul) }}" alt="Foto Sampul" width="100px" class="mt-2">
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="foto_galeri" class="form-label">Foto Galeri</label>
                            <input type="file" name="foto_galeri[]" class="form-control" multiple>
                            @if ($wisata->foto_galeri)
                                @foreach (json_decode($wisata->foto_galeri) as $foto)
                                    <img src="{{ Storage::url($foto) }}" alt="Foto Galeri" width="100px" class="mt-2">
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <!-- Kategori -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="category_id" class="form-label">Kategori</label>
                            <select name="category_id" class="form-select">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $wisata->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-secondary btn-lg" href="{{ route('wisata.index') }}">Kembali</a>
                    <button type="submit" class="btn btn-primary btn-lg">Perbarui</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection
