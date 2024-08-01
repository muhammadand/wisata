
<!-- resources/views/category.blade.php -->

@extends('layouts.app') <!-- Pastikan Anda menggunakan layout yang benar -->

@section('content')
    <h1>{{ $category->name }}</h1>
    <p>{{ $category->description }}</p> <!-- Tampilkan deskripsi kategori jika ada -->

    @if($posts->count())
        <ul>
            @foreach($posts as $post)
                <li>
                    <a href="{{ route('wisata.show', $post->id) }}">{{ $post->title }}</a> <!-- Gantilah dengan atribut yang relevan -->
                </li>
            @endforeach
        </ul>

        {{ $posts->links() }} <!-- Tampilkan link paginasi -->
    @else
        <p>No posts available.</p>
    @endif
@endsection


{{-- @extends('layout.template')

@section('content')
<div class="section search-result-wrap">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="heading">Category: {{ $category->name }}</div>
            </div>
        </div>
        <div class="row posts-entry">
            @foreach ($wisatas as $wisata)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="blog-entry d-flex blog-entry-search-item">
                        <a href="{{ route('wisata.show', $wisata->id) }}" class="img-link me-4">
                            <img src="{{ asset('storage/' . $wisata->foto_sampul) }}" alt="Image" class="img-fluid">
                        </a>
                        <div>
                            <span class="date">{{ \Carbon\Carbon::parse($wisata->created_at)->format('M d, Y') }} &bullet; <a href="#">{{ $category->name }}</a></span>
                            <h2><a href="{{ route('wisata.show', $wisata->id) }}">{{ $wisata->nama }}</a></h2>
                            <p>{{ \Illuminate\Support\Str::limit($wisata->deskripsi, 100, '...') }}</p>
                            <p><a href="{{ route('wisata.show', $wisata->id) }}" class="btn btn-sm btn-outline-primary">Read More</a></p>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="row text-start pt-5 border-top">
                <div class="col-md-12">
                    <div class="custom-pagination">
                        {{ $wisatas->links() }} <!-- Menampilkan pagination -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
