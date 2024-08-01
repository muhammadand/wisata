@extends('layoutadmin.template')

@section('content')
<div class="card mt-5">
  <h2 class="card-header">Pesanan Tiket</h2>
  <div class="card-body">

    @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-success btn-sm" href="{{ route('tiket.create') }}"> 
            <i class="fa fa-plus"></i> Create New Ticket
        </a>
    </div>

    <table class="table table-bordered table-striped mt-4">
        <thead>
            <tr>
                <th width="80px">No</th>
                <th>Name</th>
                <th>Stok</th>
                <th>Harga</th>
                <th width="250px">Action</th>
            </tr>
        </thead>

        <tbody>
        @forelse ($tikets as $ticket)
            <tr>
                <td>{{ ++$i }}</td>
                {{-- <td><img src="/images/{{ $ticket->image }}" width="100px"></td> --}}
                <td>{{ $ticket->nama_tiket }}</td>
                <td>{{ $ticket->stok }}</td>
                <td>{{ $ticket->harga }}</td>
                <td>
                    <form action="{{ route('tiket.destroy', $ticket->id) }}" method="POST">
                        <a class="btn btn-info btn-sm" href="{{ route('tiket.show', $ticket->id) }}">
                            <i class="fa-solid fa-list"></i> Show
                        </a>
                        <a class="btn btn-primary btn-sm" href="{{ route('tiket.edit', $ticket->id) }}">
                            <i class="fa-solid fa-pen-to-square"></i> Edit
                        </a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fa-solid fa-trash"></i> Delete
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">There are no data.</td>
            </tr>
        @endforelse
        </tbody>

    </table>

    {!! $tikets->withQueryString()->links('pagination::bootstrap-5') !!}

  </div>
</div>
@endsection
