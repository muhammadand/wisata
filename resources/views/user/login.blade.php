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
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  
  <title>Wisata Cibulan</title>
  <style>
    body, html {
      height: 100%;
    }
    .bg {
      background-image: url("{{ asset('images/cibulan1.jpg') }}"); /* Ganti URL ini dengan URL gambar wisata Anda */
      height: 100%;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }
    .card-transparent {
      background-color: rgba(255, 255, 255, 0.7); /* Transparansi card */
    }
  </style>
</head>
<body>
  <div class="bg d-flex align-items-center justify-content-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card card-transparent border-0 shadow-sm rounded">
            <div class="card-header bg-primary text-white text-center">
              <h4 class="mb-0">Login</h4>
            </div>
            <div class="card-body">
              @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                  <p>{{ $error }}</p>
                @endforeach
              </div>
              @endif
              <form action="{{ route('login.action') }}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                  <input type="text" class="form-control rounded" id="username" name="username" value="{{ old('username') }}" required>
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                  <input type="password" class="form-control rounded" id="password" name="password" required>
                </div>
                <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="remember" name="remember">
                  <label class="form-check-label" for="remember">Remember me</label>
                </div>
                <div class="mb-3 d-grid gap-2">
                  <button type="submit" class="btn btn-primary btn-sm rounded-pill">Login</button>
                  <p class="mt-2">lupa password? <a href="{{ route('password') }}">Reset Password</a></p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
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
