
 
 
 <!doctype html>
 <html lang="en">
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="author" content="Untree.co">
   <link rel="shortcut icon" href="favicon.png">
 
   <meta name="description" content="" />
   <meta name="keywords" content="bootstrap, bootstrap5" />
 
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&display=swap" rel="stylesheet">
   
   <link rel="stylesheet"  href="{{asset('fonts/icomoon/style.css')}}">
   <link rel="stylesheet"  href="{{asset('fonts/flaticon/font/flaticon.css')}}">
   <link rel="stylesheet"  href="{{asset('css/tiny-slider.css')}}">
   <link rel="stylesheet"  href="{{asset('css/aos.css')}}">
   <link rel="stylesheet"  href="{{asset('css/glightbox.min.css')}}">
   <link rel="stylesheet"  href="{{asset('css/style.css')}}">
   <link rel="stylesheet"  href="{{asset('css/flatpickr.min.css')}}">



  
 <!-- Tambahkan link Font Awesome di <head> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
 
 
 
   <title>Wisata winduraja</title>
 </head>
 <body>

  <div class="site-mobile-menu site-navbar-target">
		<div class="site-mobile-menu-header">
			<div class="site-mobile-menu-close">
				<span class="icofont-close js-menu-toggle"></span>
			</div>
		</div>
		<div class="site-mobile-menu-body"></div>
	</div>
<nav class="site-nav">
	<div class="container">
		<div class="menu-bg-wrap">
			<div class="site-navigation">
				<div class="row g-0 align-items-center">
					<div class="col-2">
						<a href="index.html" class="logo m-0 float-start">Desa Wisata<span class="text-primary">.</span></a>
					</div>
					<div class="col-8 text-center">
						<form action="#" class="search-form d-inline-block d-lg-none">
							<input type="text" class="form-control" placeholder="Search...">
							<span class="bi-search"></span>
						</form>

						<ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto">
							<li class="active"><a href="{{ url('/') }}">Home</a></li>
							<li class="has-children">
								<a href="#">Pages</a>
								<ul class="dropdown">
									<li><a href="{{ url('/') }}">Komunitas desa</a></li>
									<li><a href="{{ url('about') }}">About</a></li>
									<li><a href="{{ url('contact') }}">Contact Us</a></li>
									
								</ul>
							</li>
							@foreach(App\Models\Category::all() as $category)
    <li><a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a></li>
@endforeach

							
						</ul>
					</div>
					<div class="col-2 text-end">
						<a href="#" class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light">
							<span></span>
						</a>
						<form action="{{ route('home') }}" method="GET" class="search-form d-lg-inline-block">
							<div class="input-group" style="max-width: 400px;">
								<input type="text" name="query" class="form-control" placeholder="Search..." value="{{ request()->query('query') }}">
								<div class="input-group-append">
									<span class="input-group-text" onclick="this.closest('form').submit()" style="cursor: pointer;">
										<i class="bi bi-search"></i>
									</span>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</nav>



   
      <!-- Page content -->
    @yield('content')














  
	<footer class="site-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<div class="widget">
						<h3 class="mb-4">About</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div> <!-- /.widget -->
					<div class="widget">
						<h3>Social</h3>
						<ul class="list-unstyled social">
							<li><a href="#"><span class="icon-instagram"></span></a></li>
							<li><a href="#"><span class="icon-twitter"></span></a></li>
							<li><a href="#"><span class="icon-facebook"></span></a></li>
							<li><a href="#"><span class="icon-linkedin"></span></a></li>
							<li><a href="#"><span class="icon-pinterest"></span></a></li>
							<li><a href="#"><span class="icon-dribbble"></span></a></li>
						</ul>
					</div> <!-- /.widget -->
				</div> <!-- /.col-lg-4 -->
				<div class="col-lg-4 ps-lg-5">
					<div class="widget">
						<h3 class="mb-4">Company</h3>
						<ul class="list-unstyled float-start links">
							<li><a href="#">About us</a></li>
							<li><a href="#">Services</a></li>
							<li><a href="#">Vision</a></li>
							<li><a href="#">Mission</a></li>
							<li><a href="#">Terms</a></li>
							<li><a href="{{url('login')}}">Login</a></li>
						</ul>
						<ul class="list-unstyled float-start links">
							<li><a href="#">Partners</a></li>
							<li><a href="#">Business</a></li>
							<li><a href="#">Careers</a></li>
							<li><a href="#">Blog</a></li>
							<li><a href="#">FAQ</a></li>
							<li><a href="#">Creative</a></li>
						</ul>
					</div> <!-- /.widget -->
				</div> <!-- /.col-lg-4 -->
				<div class="col-lg-4">
					<div class="widget">
						<h3 class="mb-4">Recent Post Entry</h3>
						<div class="post-entry-footer">
							<ul>
								<li>
									<a href="">
										<img src="images/cibulan3.jpg" alt="Image placeholder" class="me-4 rounded">
										<div class="text">
											<h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
											<div class="post-meta">
												<span class="mr-2">March 15, 2018 </span>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="">
										<img src="images/cibulan2.jpg" alt="Image placeholder" class="me-4 rounded">
										<div class="text">
											<h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
											<div class="post-meta">
												<span class="mr-2">March 15, 2018 </span>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="">
										<img src="images/cibulan1.jpg" alt="Image placeholder" class="me-4 rounded">
										<div class="text">
											<h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
											<div class="post-meta">
												<span class="mr-2">March 15, 2018 </span>
											</div>
										</div>
									</a>
								</li>
							</ul>
						</div>


					</div> <!-- /.widget -->
				</div> <!-- /.col-lg-4 -->
			</div> <!-- /.row -->

			<div class="row mt-5">
				<div class="col-12 text-center">
          <!-- 
              **==========
              NOTE: 
              Please don't remove this copyright link unless you buy the license here https://untree.co/license/  
              **==========
            -->

            <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co">Untree.co</a>  Distributed by <a href="https://themewagon.com">ThemeWagon</a> <!-- License information: https://untree.co/license/ -->
            </p>
          </div>
        </div>
      </div> <!-- /.container -->
    </footer> <!-- /.site-footer -->

    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
    	<div class="spinner-border text-primary" role="status">
    		<span class="visually-hidden">Loading...</span>
    	</div>
    </div>

    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/tiny-slider.js')}}"></script>
    <script src="{{asset('js/flatpickr.min.js')}}"></script>
    <script src="{{asset('js/aos.js')}}"></script>
    <script src="{{asset('js/glightbox.min.js')}}"></script>
    <script src="{{asset('js/navbar.js')}}"></script>
    <script src="{{asset('js/counter.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>

    
  </body>
  </html>
