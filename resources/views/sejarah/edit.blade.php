@extends('layoutadmin.template')

@section('content')
<div class="card mt-5">
    <h2 class="card-header">Edit Sejarah</h2>
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

        <form action="{{ route('sejarah.update', $sejarah->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="judul" class="form-label">Judul:</label>
                <input type="text" name="judul" value="{{ $sejarah->judul }}" class="form-control" placeholder="Judul Sejarah">
            </div>
            <div class="form-group mb-3">
                <label for="deskripsi" class="form-label">Deskripsi:</label>
                <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Sejarah">{{ $sejarah->deskripsi }}</textarea>
            </div>
            <div class="form-group mb-3">
                <label for="tanggal" class="form-label">Tanggal:</label>
                <input type="date" name="tanggal" value="{{ \Carbon\Carbon::parse($sejarah->tanggal)->format('Y-m-d') }}" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="lokasi" class="form-label">Lokasi:</label>
                <input type="text" name="lokasi" value="{{ $sejarah->lokasi }}" class="form-control" placeholder="Lokasi Sejarah">
            </div>
            <div class="form-group mb-3">
                <label for="foto" class="form-label">Foto:</label>
                <input type="file" name="foto" class="form-control" onchange="previewFoto(this)">
                <div id="preview" class="mt-2">
                    @if($sejarah->foto)
                        <img src="{{ Storage::url($sejarah->foto) }}" alt="Foto Sejarah" class="img-thumbnail" width="200px">
                    @endif
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="sumber" class="form-label">Sumber:</label>
                <textarea name="sumber" class="form-control" placeholder="Sumber Sejarah">{{ $sejarah->sumber }}</textarea>
            </div>
            <div class="form-group mb-3">
                <label for="category_id" class="form-label">Kategori:</label>
                <select name="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $sejarah->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
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
                document.getElementById('preview').innerHTML = '<img src="' + e.target.result + '" class="img-thumbnail" width="200px" />';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
