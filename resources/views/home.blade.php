@extends('layout.template')
  
@section('content')

	<!-- Start retroy layout blog posts -->
	<section class="section bg-light">
		<div class="container">
			<div class="row align-items-stretch retro-layout">
				<div class="col-md-4">
					<a href="single.html" class="h-entry mb-30 v-height gradient">

						<div class="featured-img" style="background-image: url('images/cibulan1.jpg');"></div>

						<div class="text">
							<span class="date">Apr. 14th, 2022</span>
							<h2>AI can now kill those annoying cookie pop-ups</h2>
						</div>
					</a>
					<a href="single.html" class="h-entry v-height gradient">

						<div class="featured-img" style="background-image: url('images/cibulan2.jpg');"></div>

						<div class="text">
							<span class="date">Apr. 14th, 2022</span>
							<h2>Don’t assume your user data in the cloud is safe</h2>
						</div>
					</a>
				</div>
				<div class="col-md-4">
					<a href="single.html" class="h-entry img-5 h-100 gradient">

						<div class="featured-img" style="background-image: url('images/cibulan6.jpeg');"></div>

						<div class="text">
							<span class="date">Apr. 14th, 2022</span>
							<h2>Why is my internet so slow?</h2>
						</div>
					</a>
				</div>
				<div class="col-md-4">
					<a href="single.html" class="h-entry mb-30 v-height gradient">

						<div class="featured-img" style="background-image: url('images/cibulan3.jpg');"></div>

						<div class="text">
							<span class="date">Apr. 14th, 2022</span>
							<h2>Startup vs corporate: What job suits you best?</h2>
						</div>
					</a>
					<a href="single.html" class="h-entry v-height gradient">

						<div class="featured-img" style="background-image: url('images/cibulan4.jpg');"></div>

						<div class="text">
							<span class="date">Apr. 14th, 2022</span>
							<h2>Thought you loved Python? Wait until you meet Rust</h2>
						</div>
					</a>
				</div>
			</div>
		</div>
	</section>
	<!-- End retroy layout blog posts -->

	<!-- Start posts-entry -->
<section class="section posts-entry">
    <div class="container">
        <div class="row mb-4">
            <div class="col-sm-6">
                <h2 class="posts-entry-title">Wisata</h2>
               {{-- <p>Jumlah wisata: {{ $wisata->count() }}</p>  --}}
            </div>
            <div class="col-sm-6 text-sm-end">
                <a href="{{ route('wisata.index') }}" class="read-more">View All</a>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-md-9">
                <div class="row g-3">
                    @foreach($wisatas->take(2) as $wisata)
                        <div class="col-md-6">
                            <div class="blog-entry">
                                <a href="{{ route('wisata.show', $wisata->id) }}" class="img-link">
                                    <img src="{{ asset('storage/' . $wisata->foto_sampul) }}" alt="Image" class="img-fluid" style="width: 500px; height: 500px; object-fit: cover;">


                                </a>
                               
                                <h2><a href="{{ route('wisata.show', $wisata->id) }}">{{ $wisata->nama }}</a></h2>
                                <p>{{ Str::limit($wisata->deskripsi, 100) }}</p>
                                <span class="date">{{ $wisata->created_at->format('M. d, Y') }}</span>
                                <p><a href="{{ route('wisata.show', $wisata->id) }}" class="btn btn-sm btn-outline-primary">Read More</a></p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-3">
                <ul class="list-unstyled blog-entry-sm">
                    @foreach($wisatas->skip(2)->take(3) as $wisata)
                        <li>
                            <span class="date">{{ $wisata->created_at->format('M. d, Y') }}</span>
                            <h3><a href="{{ route('wisata.show', $wisata->id) }}">{{ $wisata->nama }}</a></h3>
                            <p>{{ Str::limit($wisata->deskripsi, 50) }}</p>
                            <p><a href="{{ route('wisata.show', $wisata->id) }}" class="read-more">Continue Reading</a></p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End posts-entry -->

<!-- Start posts-entry -->
<section class="section posts-entry posts-entry-sm bg-light">
    <div class="container">
        <div class="row">
            @if($wisata)
                <div class="col-md-6 col-lg-3">
                    <div class="blog-entry">
                        <a href="{{ route('wisata.show', $wisata->id) }}" class="img-link">
                            <img src="{{ asset('storage/' . $wisata->foto_sampul) }}" alt="Image" class="img-fluid img-thumbnail" style="width: 250px; height: 150px; object-fit: cover;">
                        </a>
                        <span class="date">{{ $wisata->created_at->format('M. d, Y') }}</span>
                        <h2><a href="{{ route('wisata.show', $wisata->id) }}">{{ $wisata->nama }}</a></h2>
                        <p>{{ Str::limit($wisata->deskripsi, 100) }}</p>
                        <p><a href="{{ route('wisata.show', $wisata->id) }}" class="read-more">Continue Reading</a></p>
                    </div>
                </div>
            @endif
             @if($seniBudaya)
                <div class="col-md-6 col-lg-3">
                    <div class="blog-entry">
                        <a href="{{ route('seni_budaya.show', $seniBudaya->id) }}" class="img-link">
                            <img src="{{ Storage::url($seniBudaya->gambar) }}" alt="Image" class="img-fluid img-thumbnail" style="width: 250px; height: 150px; object-fit: cover;">
                        </a>
                        <span class="date">{{ $seniBudaya->created_at->format('M. d, Y') }}</span>
                        <h2><a href="{{ route('seni_budaya.show', $seniBudaya->id) }}">{{ $seniBudaya->nama }}</a></h2>
                        <p>{{ Str::limit($seniBudaya->deskripsi, 100) }}</p>
                        <p><a href="{{ route('seni_budaya.show', $seniBudaya->id) }}" class="read-more">Continue Reading</a></p>
                    </div>
                </div>
            @endif 
             @if($sejarah)
                <div class="col-md-6 col-lg-3">
                    <div class="blog-entry">
                        <a href="{{ route('sejarah.show', $sejarah->id) }}" class="img-link">
                            <img src="{{ Storage::url($sejarah->foto) }}" alt="Image" class="img-fluid img-thumbnail" style="width: 250px; height: 150px; object-fit: cover;">
                        </a>
                        <span class="date">{{ $sejarah->created_at->format('M. d, Y') }}</span>
                        <h2><a href="{{ route('sejarah.show', $sejarah->id) }}">{{ $sejarah->judul }}</a></h2>
                        <p>{{ Str::limit($sejarah->deskripsi, 100) }}</p>
                        <p><a href="{{ route('sejarah.show', $sejarah->id) }}" class="read-more">Continue Reading</a></p>
                    </div>
                </div>
            @endif 
            @if($product)
                <div class="col-md-6 col-lg-3">
                    <div class="blog-entry">
                        <a href="{{ route('products.show', $product->id) }}" class="img-link">
                            <img src="{{ Storage::url($product->gambar) }}" alt="Image" class="img-fluid img-thumbnail" style="width: 250px; height: 150px; object-fit: cover;">
                        </a>
                        <span class="date">{{ $product->created_at->format('M. d, Y') }}</span>
                        <h2><a href="{{ route('products.show', $product->id) }}">{{ $product->nama }}</a></h2>
                        <p>{{ Str::limit($product->deskripsi, 100) }}</p>
                        <p><a href="{{ route('products.show', $product->id) }}" class="read-more">Continue Reading</a></p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
<!-- End posts-entry -->

<!-- Start posts-entry for Seni Budaya -->
<section class="section posts-entry">
    <div class="container">
        <div class="row mb-4">
            <div class="col-sm-6">
                <h2 class="posts-entry-title">Seni Budaya</h2>
            </div>
            <div class="col-sm-6 text-sm-end">
                <a href="{{ route('seni_budaya.index') }}" class="read-more">View All</a>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-md-9">
                <div class="row g-3">
                    @foreach($seniBudayas->take(2) as $seniBudaya)
                        <div class="col-md-6">
                            <div class="blog-entry">
                                <a href="{{ route('seni_budaya.show', $seniBudaya->id) }}" class="img-link">
                                    <img src="{{ asset('storage/' . str_replace('public/', '', $seniBudaya->gambar)) }}" alt="Image" class="img-fluid">
                                </a>
                                <span class="date">{{ $seniBudaya->created_at->format('M. d, Y') }}</span>
                                <h2><a href="{{ route('seni_budaya.show', $seniBudaya->id) }}">{{ $seniBudaya->nama }}</a></h2>
                                <p>{{ Str::limit($seniBudaya->deskripsi, 100) }}</p>
                                <p><a href="{{ route('seni_budaya.show', $seniBudaya->id) }}" class="btn btn-sm btn-outline-primary">Read More</a></p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-3">
                <ul class="list-unstyled blog-entry-sm">
                    @foreach($seniBudayas->skip(2)->take(3) as $seniBudaya)
                        <li>
                            <span class="date">{{ $seniBudaya->created_at->format('M. d, Y') }}</span>
                            <h3><a href="{{ route('seni_budaya.show', $seniBudaya->id) }}">{{ $seniBudaya->nama }}</a></h3>
                            <p>{{ Str::limit($seniBudaya->deskripsi, 50) }}</p>
                            <p><a href="{{ route('seni_budaya.show', $seniBudaya->id) }}" class="read-more">Continue Reading</a></p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End posts-entry for Seni Budaya -->



<!-- Start posts-entry for Sejarah -->
<section class="section">
    <div class="container">

        <div class="row mb-4">
            <div class="col-sm-6">
                <h2 class="posts-entry-title">Sejarah</h2>
            </div>
            <div class="col-sm-6 text-sm-end"><a href="{{ route('sejarah.index') }}" class="read-more">View All</a></div>
        </div>

        <div class="row">
            @foreach($sejarahs as $sejarah)
                <div class="col-lg-4 mb-4">
                    <div class="card post-entry-alt">
                        <a href="{{ route('sejarah.show', $sejarah->id) }}" class="img-link">
                            <img src="{{ Storage::url($sejarah->foto) }}" alt="Image" class="card-img-top" style="height: 200px; object-fit: cover;">
                        </a>
                        <div class="card-body">
                            <h2 class="card-title"><a href="{{ route('sejarah.show', $sejarah->id) }}">{{ $sejarah->judul }}</a></h2>
                            <div class="post-meta d-flex align-items-center mb-3">
                                <figure class="author-figure mb-0 me-3">
                                    <img src="{{ asset('storage/' . $sejarah->foto_penulis) }}" alt="Image" class="img-fluid" style="height: 50px; width: 50px; object-fit: cover; border-radius: 50%;">
                                </figure>
                                <span class="d-inline-block mt-1">By <a href="#">{{ $sejarah->penulis }}</a></span>
                                <span class="ms-2">&nbsp;-&nbsp; {{ $sejarah->created_at->format('M. d, Y') }}</span>
                            </div>
                            <p class="card-text">{{ Str::limit($sejarah->deskripsi, 150) }}</p>
                            <p><a href="{{ route('sejarah.show', $sejarah->id) }}" class="read-more">Continue Reading</a></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
<!-- End posts-entry for Sejarah -->
<hr>

  <section id="tiket" class="my-5 overflow-hidden">
    <div class="container pb-5">
        <div class="section-header d-md-flex justify-content-between align-items-center mb-3">
            <h2 class="display-4 fw-normal">Pembelian Tiket Wisata</h2>
            <div>
                <!-- Bisa tambahkan link atau tombol lain di sini -->
            </div>
        </div>

        <div class="row">
            @foreach ($tikets as $tiket)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $tiket->nama_tiket }}</h5>
                        <p class="card-text text-primary">{{ number_format($tiket->harga, 0, ',', '.') }} IDR</p>

                        <div class="rating">
                            @for ($i = 0; $i < 5; $i++)
                            <iconify-icon icon="clarity:star-solid" class="text-warning"></iconify-icon>
                            @endfor
                            <span>5.0</span>
                        </div>
                        <a href="{{ route('orders.create', $tiket) }}" class="btn btn-primary mt-3 beli-sekarang-btn">Beli Sekarang</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>



<!-- Custom CSS -->
<style>
    .rating iconify-icon {
        font-size: 1.2rem;
    }
    .beli-sekarang-btn {
        transition: background-color 0.3s, transform 0.3s;
    }
    .beli-sekarang-btn:hover {
        background-color: #0056b3;
        transform: scale(1.05);
    }
</style>



            @endsection        