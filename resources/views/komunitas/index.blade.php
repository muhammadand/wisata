@extends('app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h2>Daftar Komunitas</h2>
            <a class="btn btn-success mb-3" href="{{ route('komunitas.create') }}">Tambah Komunitas</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
       
            <th>Nama Komunitas</th>
            <th>Foto</th>
            <th>Deskripsi</th>
            <th>Nama Ketua</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($komunitas as $kom)
        <tr>
          
            <td>{{ $kom->nama_komunitas }}</td>
            <td><img src="{{ asset('storage/' . $kom->foto) }}" width="100"></td>
            <td>{{ $kom->deskripsi }}</td>
            <td>{{ $kom->nama_ketua }}</td>
            <td>
                <form action="{{ route('komunitas.destroy',$kom->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('komunitas.show',$kom->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('komunitas.edit',$kom->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
