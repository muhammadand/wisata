@extends('app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h2>Detail Komunitas</h2>
            <a class="btn btn-primary mb-3" href="{{ route('komunitas.index') }}"> Back</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Komunitas:</strong>
                {{ $komunitas->nama_komunitas }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Foto:</strong>
                <img src="{{ asset('storage/' . $komunitas->foto) }}" width="300">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Deskripsi:</strong>
                {{ $komunitas->deskripsi }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Ketua:</strong>
                {{ $komunitas->nama_ketua }}
            </div>
        </div>
    </div>
@endsection
