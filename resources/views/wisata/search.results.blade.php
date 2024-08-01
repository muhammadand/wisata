@extends('layout.template')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Search Results</h2>

    @if(isset($query))
        <p class="mb-4">Showing results for: <strong>{{ $query }}</strong></p>
    @endif

    @if(isset($results) && $results->isNotEmpty())
        <div class="row">
            @foreach($results as $result)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $result->nama ?? $result->judul }}</h5>
                            <p class="card-text">{{ Str::limit($result->deskripsi, 100) }}</p>
                            <a href="{{ route(strtolower(class_basename($result)) . '.show', $result->id) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-warning" role="alert">
            No results found.
        </div>
    @endif
</div>
@endsection
