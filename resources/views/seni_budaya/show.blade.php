@extends('layout.template')
@section('content')
<div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('{{ asset('storage/' . str_replace('public/', '', $seniBudaya->gambar)) }}');">
    <div class="container">
      <div class="row same-height justify-content-center">
        <div class="col-md-6">
          <div class="post-entry text-center">
            <h1 class="mb-4">{{ $seniBudaya->nama }}</h1>
            <div class="post-meta align-items-center text-center">
              <figure class="author-figure mb-0 me-3 d-inline-block"><img src="{{ asset('storage/' . str_replace('public/', '', $seniBudaya->gambar)) }}" alt="Image" class="img-fluid"></figure>
              <span class="d-inline-block mt-1">By Pokdarwis</span>
              <span>&nbsp;-&nbsp; {{$seniBudaya->created_at}}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section class="section">
    <div class="container">

      <div class="row blog-entries element-animate">

        <div class="col-md-12 col-lg-8 main-content">

          <div class="post-content-body">
            {!! nl2br(e($seniBudaya->deskripsi)) !!}
            <div class="row my-4">
             
                    <div class="col-md-4 mb-4">
                        <div class="img-thumbnail d-flex align-items-center justify-content-center" style="padding-bottom: 100%; position: relative;">
                            <img src="{{ asset('storage/' . str_replace('public/', '', $seniBudaya->gambar)) }}" alt="Image placeholder" class="img-fluid" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; border-radius: .25rem;">
                        </div>
                    </div>
        
            </div>
           </div>

          
           <div class="pt-5">
            <p>Categories: <a href="#">{{ $seniBudaya->category->name }}</a></p>
        </div>
        


          <div class="pt-5 comment-wrap">
            <h3 class="mb-5 heading">Beri kami masukan</h3>
            <div class="comment-form-wrap">
              <h3 class="mb-5">Kamu bisa memberi masukan disini</h3>
              <form action="#" class="p-5 bg-light">
                <div class="form-group">
                  <label for="name">Name *</label>
                  <input type="text" class="form-control" id="name">
                </div>
                <div class="form-group">
                  <label for="email">Email *</label>
                  <input type="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                  <label for="message">Message</label>
                  <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <input type="submit" value="Post Comment" class="btn btn-primary">
                </div>

              </form>
            </div>
          </div>

        </div>

        <!-- END main-content -->

        <div class="col-md-12 col-lg-4 sidebar">
          <div class="sidebar-box search-form-wrap">
          </div>
         <!-- END sidebar-box -->  
         <div class="sidebar-box">
            <h3 class="heading">Postingan Lainnya</h3>
            <div class="post-entry-sidebar">
                <ul>
                    @foreach($otherSenibudaya as $post)
                    <li>
                        <a href="{{ route('seni_budaya.show', $post->id) }}"> <!-- Link ke halaman show -->
                            <img src="{{ asset('storage/' . str_replace('public/', '', $post->gambar)) }}" alt="Image placeholder" class="me-4 rounded" style="width: 100px; height: 100px; object-fit: cover;"> <!-- Menampilkan foto pertama dari galeri -->
                            <div class="text">
                                <h4>{{ $post->nama }}</h4> <!-- Judul postingan -->
                                <div class="post-meta">
                                    <p>{{ Str::limit($post->deskripsi, 100) }}</p>
                                    <span class="mr-2">{{ $post->created_at->format('F d, Y') }}</span> <!-- Tanggal postingan -->
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
  </section>
  <!-- Start posts-entry -->
<section class="section posts-entry posts-entry-sm bg-light">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 text-uppercase text-black">More Blog Posts</div>
          </div>
        <div class="row">
            @if($seniBudaya)
                <div class="col-md-6 col-lg-3">
                    <div class="blog-entry">
                        <a href="{{ route('wisata.show', $seniBudaya->id) }}" class="img-link">
                            <img src="{{ asset('storage/' . str_replace('public/', '', $seniBudaya->gambar)) }}" alt="Image" class="img-fluid img-thumbnail" style="width: 250px; height: 150px; object-fit: cover;">
                        </a>
                        <span class="date">{{ $seniBudaya->created_at->format('M. d, Y') }}</span>
                        <h2><a href="{{ route('wisata.show', $seniBudaya->id) }}">{{ $seniBudaya->nama }}</a></h2>
                        <p>{{ Str::limit($seniBudaya->deskripsi, 100) }}</p>
                        <p><a href="{{ route('wisata.show', $seniBudaya->id) }}" class="read-more">Continue Reading</a></p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
<!-- End posts-entry -->


  @endsection