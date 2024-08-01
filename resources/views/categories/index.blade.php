<!-- resources/views/categories/index.blade.php -->
@extends('app')

@section('content')
<div class="card mt-5">
    <h2 class="card-header">Daftar Kategori</h2>
    <div class="card-body">

        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('categories.create') }}">
                <i class="fa fa-plus"></i> Buat Kategori Baru
            </a>
        </div>

        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th width="250px">Aksi</th>
                </tr>
            </thead>

            <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                            <a class="btn btn-primary btn-sm" href="{{ route('categories.edit', $category->id) }}">
                                <i class="fa-solid fa-pen-to-square"></i> Edit
                            </a>
                            <a class="btn btn-info btn-sm" href="{{ route('categories.show', $category->id) }}">
                                <i class="fa-solid fa-eye"></i> Show
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
                    <td colspan="6">Tidak ada data.</td>
                </tr>
            @endforelse
            </tbody>

        </table>

        {!! $categories->withQueryString()->links('pagination::bootstrap-5') !!}

    </div>
</div>
@endsection
