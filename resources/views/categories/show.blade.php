@extends('layout.template')
@section('content')

<div class="section search-result-wrap">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="heading">Category: {{ $category->name }}</div>
            </div>
        </div>
        <div class="row posts-entry">
            <div class="col-lg-8">
                @foreach ($category->wisata as $item)
                    <div class="blog-entry d-flex blog-entry-search-item">
                        <a href="{{ route('wisata.show', $item->id) }}" class="img-link me-4">
                            <img src="{{ asset('storage/' . $item->foto_sampul) }}" alt="Image" class="img-fluid" style="width: 250px; height: 250px; object-fit: cover;">
                        </a>
                        <div>
                            <span class="date">{{ $item->created_at->format('M. jS, Y') }} &bullet; <a href="#">{{ $category->name }}</a></span>
                            <h2><a href="{{ route('wisata.show', $item->id) }}">{{ $item->nama }}</a></h2>
                            <p>{{ Str::limit($item->deskripsi, 150) }}</p>
                            <p><a href="{{ route('wisata.show', $item->id) }}" class="btn btn-sm btn-outline-primary">Read More</a></p>
                        </div>
                    </div>
                @endforeach

                @foreach ($category->sejarah as $item)
                    <div class="blog-entry d-flex blog-entry-search-item">
                        <a href="{{ route('sejarah.show', $item->id) }}" class="img-link me-4">
                            <img src="{{ Storage::url($item->foto) }}" alt="Image" class="img-fluid" style="width: 250px; height: 250px; object-fit: cover;">
                        </a>
                        <div>
                            <span class="date">{{ $item->created_at->format('M. jS, Y') }} &bullet; <a href="#">{{ $category->name }}</a></span>
                            <h2><a href="{{ route('sejarah.show', $item->id) }}">{{ $item->judul}}</a></h2>
                            <p>{{ Str::limit($item->deskripsi, 150) }}</p>
                            <p><a href="{{ route('sejarah.show', $item->id) }}" class="btn btn-sm btn-outline-primary">Read More</a></p>
                        </div>
                    </div>
                @endforeach

                @foreach ($category->seniBudaya as $item)
                    <div class="blog-entry d-flex blog-entry-search-item">
                        <a href="{{ route('seni_budaya.show', $item->id) }}" class="img-link me-4">
                            <img src="{{ asset('storage/' . str_replace('public/', '', $item->gambar)) }}" alt="Image" class="img-fluid" style="width: 250px; height: 250px; object-fit: cover;">
                        </a>
                        <div>
                            <span class="date">{{ $item->created_at->format('M. jS, Y') }} &bullet; <a href="#">{{ $category->name }}</a></span>
                            <h2><a href="{{ route('seni_budaya.show', $item->id) }}">{{ $item->nama }}</a></h2>
                            <p>{{ Str::limit($item->deskripsi, 150) }}</p>
                            <p><a href="{{ route('seni_budaya.show', $item->id) }}" class="btn btn-sm btn-outline-primary">Read More</a></p>
                        </div>
                    </div>
                @endforeach

                @foreach ($category->product as $item)
                    <div class="blog-entry d-flex blog-entry-search-item">
                        <a href="{{ route('products.show', $item->id) }}" class="img-link me-4">
                            <img src="{{ Storage::url($item->gambar) }}" alt="Image" class="img-fluid" style="width: 250px; height: 250px; object-fit: cover;">
                        </a>
                        <div>
                            <span class="date">{{ $item->created_at->format('M. jS, Y') }} &bullet; <a href="#">{{ $category->name }}</a></span>
                            <h2><a href="{{ route('products.show', $item->id) }}">{{ $item->nama }}</a></h2>
                            <p>{{ Str::limit($item->deskripsi, 150) }}</p>
                            <p><strong>Harga: Rp {{ number_format($item->harga, 3, ',', '.') }}</strong></p>
                            <p><a href="{{ route('products.show', $item->id) }}" class="btn btn-sm btn-outline-primary">Read More</a></p>
                        </div>
                    </div>
                @endforeach

                <!-- Pagination (if necessary) -->
                <div class="row text-start pt-5 border-top">
                    <div class="col-md-12">
                        <div class="custom-pagination">
                            {{ $otherPosts->links() }}
                            {{ $otherSejarah->links() }}
                            {{ $otherProduct->links() }}
                            {{ $otherSenibudaya->links() }}
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-4 sidebar">
                
                <div class="sidebar-box search-form-wrap mb-4">
                    <form action="#" class="sidebar-search-form">
                        <span class="bi-search"></span>
                        <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
                    </form>
                </div>
                <!-- END sidebar-box -->

                <div class="sidebar-box">
                    <h3 class="heading">Popular Posts</h3>
                    <div class="post-entry-sidebar">
                        <ul>
                            @foreach($otherPosts as $post)
                                <li>
                                    <a href="{{ route('wisata.show', $post->id) }}">
                                        <img src="{{ asset('storage/' . json_decode($post->foto_galeri)[0]) }}" alt="Image placeholder" class="me-4 rounded" style="width: 100px; height: 100px; object-fit: cover;">
                                        <div class="text">
                                            <h4>{{ $post->nama }}</h4>
                                            <div class="post-meta">
                                                <p>{{ Str::limit($post->deskripsi, 100) }}</p>
                                                <span class="mr-2">{{ $post->created_at->format('F d, Y') }}</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach

                            @foreach($otherSejarah as $post)
                                <li>
                                    <a href="{{ route('sejarah.show', $post->id) }}">
                                        <img src="{{ Storage::url($post->foto) }}" alt="Image placeholder" class="me-4 rounded" style="width: 100px; height: 100px; object-fit: cover;">
                                        <div class="text">
                                            <h4>{{ $post->nama }}</h4>
                                            <div class="post-meta">
                                                <p>{{ Str::limit($post->deskripsi, 100) }}</p>
                                                <span class="mr-2">{{ $post->created_at->format('F d, Y') }}</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach

                            @foreach($otherSenibudaya as $post)
                                <li>
                                    <a href="{{ route('seni_budaya.show', $post->id) }}">
                                        <img src="{{ asset('storage/' . str_replace('public/', '', $post->gambar)) }}" alt="Image placeholder" class="me-4 rounded" style="width: 100px; height: 100px; object-fit: cover;">
                                        <div class="text">
                                            <h4>{{ $post->nama }}</h4>
                                            <div class="post-meta">
                                                <p>{{ Str::limit($post->deskripsi, 100) }}</p>
                                                <span class="mr-2">{{ $post->created_at->format('F d, Y') }}</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- END sidebar-box -->

                <div class="sidebar-box">
                    <h3 class="heading">Categories</h3>
                    <ul class="categories">
                        <li><a href="{{ url('wisata') }}">Wisata <span>({{ $wisataCount }})</span></a></li>
                        <li><a href="{{ url('sejarah') }}">Sejarah<span>({{ $sejarahCount }})</span></a></li>
                        <li><a href="{{ url('products') }}">UMKM<span>({{ $productCount }})</span></a></li>
                        <li><a href="{{ url('seni_budaya') }}">Seni budaya<span>({{ $senibudayaCount }})</span></a></li>
                    </ul>
                </div>
                <!-- END sidebar-box -->

                <div class="sidebar-box">
                    <h3 class="heading">Tags</h3>
                    <ul class="tags">
                        @foreach(App\Models\Category::all() as $category)
                            <li><a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
