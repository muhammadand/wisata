@extends('layoutadmin.template')

@section('content')
<div class="card mt-5">
    <h2 class="card-header">Buat Sejarah Baru</h2>
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

        <form action="{{ route('sejarah.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group mb-3">
                <label for="judul" class="form-label">Judul:</label>
                <input type="text" name="judul" class="form-control" placeholder="Judul Sejarah">
            </div>
            <div class="form-group mb-3">
                <label for="deskripsi" class="form-label">Deskripsi:</label>
                <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Sejarah"></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="tanggal" class="form-label">Tanggal:</label>
                <input type="date" name="tanggal" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="lokasi" class="form-label">Lokasi:</label>
                <input type="text" name="lokasi" class="form-control" placeholder="Lokasi Sejarah">
            </div>
            <div class="form-group mb-3">
                <label for="foto" class="form-label">Foto:</label>
                <input type="file" name="foto" class="form-control" onchange="previewFoto(this)">
                <div id="preview" class="mt-2"></div>
            </div>
            <div class="form-group mb-3">
                <label for="sumber" class="form-label">Sumber:</label>
                <textarea name="sumber" class="form-control" placeholder="Sumber Sejarah"></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="category_id" class="form-label">Kategori:</label>
                <select name="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                <a class="btn btn-secondary me-md-2 mb-2 mb-md-0" href="{{ route('sejarah.index') }}">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    function previewFoto(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#preview').html('<img src="' + e.target.result + '" class="img-thumbnail" width="200px" />');
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
