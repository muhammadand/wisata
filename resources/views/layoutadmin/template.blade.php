<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Desa wisata Winduraja</title>

    <!-- Custom fonts for this template-->
    {{-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> --}}
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet"  href="{{asset('css/sb-admin-2.min.css')}}">

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-map-marked-alt"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Winduraja<sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('tiket.index') }}">
                    <i class="fas fa-ticket-alt"></i>

                    <span>Tiket</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin.orders') }}">
                    <i class="fas fa-shopping-cart"></i>

                    <span>Pembelian tiket</span></a>
            </li>
             <!-- Nav Item - Pages Collapse Menu -->
             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Category</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Pages</h6>
                        <a class="collapse-item" href="{{url('wisata')}}">Wisata</a>
                        <a class="collapse-item" href="{{url('sejarah')}}">Sejarah</a>
                        <a class="collapse-item" href="{{url('seni_budaya')}}">Seni budaya</a>
                        <a class="collapse-item" href="{{url('products')}}">UMKM</a>
                        <div class="collapse-divider"></div>
                        
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

          

        </ul>
        <!-- End of Sidebar -->

                <!-- Content Wrapper -->
                <div id="content-wrapper" class="d-flex flex-column">

                    <!-- Main Content -->
                    <div id="content">
        
                        <!-- Topbar -->
                        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        
                            <!-- Sidebar Toggle (Topbar) -->
                            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                                <i class="fa fa-bars"></i>
                            </button>
        
                            <!-- Topbar Search -->
                          <!-- Topbar Search -->
                                <form action="{{ route('admin.index') }}" method="GET" class="search-form d-lg-inline-block">
                                    <div class="input-group" style="max-width: 400px;">
                                        <input type="text" name="query" class="form-control" placeholder="Search..." value="{{ request()->query('query') }}">
                                        <div class="input-group-append">
                                            <span class="input-group-text" onclick="this.closest('form').submit()" style="cursor: pointer;">
                                                <i class="fas fa-search fa-sm"></i>
                                            </span>
                                        </div>
                                    </div>
                                </form>
        
                            <!-- Topbar Navbar -->
                            <ul class="navbar-nav ml-auto">
        
                                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                                <li class="nav-item dropdown no-arrow d-sm-none">
                                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-search fa-fw"></i>
                                    </a>
                                    <!-- Dropdown - Messages -->
                                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                        aria-labelledby="searchDropdown">
                                        <form class="form-inline mr-auto w-100 navbar-search">
                                            <div class="input-group">
                                                <input type="text" class="form-control bg-light border-0 small"
                                                    placeholder="Search for..." aria-label="Search"
                                                    aria-describedby="basic-addon2">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="button">
                                                        <i class="fas fa-search fa-sm"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </li>
        
                                <!-- Nav Item - Alerts -->
                                <li class="nav-item dropdown no-arrow mx-1">
                                    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-bell fa-fw"></i>
                                        <!-- Counter - Alerts -->
                                        <span id="totalOrdersBadge" class="badge badge-danger badge-counter">1</span> 

                                    </a>
                                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                        <h6 class="dropdown-header">Alerts Center</h6>
                                        {{-- @if(isset($orders))
                                            @foreach ($orders as $order)
                                                <a class="dropdown-item d-flex align-items-center" href="{{ route('orders.index', $order->id) }}">
                                                    <div class="mr-3">
                                                        <div class="icon-circle bg-dark">
                                                            <i class="fas fa-shopping-cart text-white"></i>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="small text-gray-500">{{ $order->created_at->format('d/m/Y') }}</div>
                                                        Pesanan Baru: {{ $order->tiket->name }} - {{ $order->quantity }} item
                                                    </div>
                                                </a>
                                            @endforeach --}}
                                            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                                        {{-- @endif --}}
                                    </div>
                                </li>
        
                           
        
                                <div class="topbar-divider d-none d-sm-block"></div>
        
                                <!-- Nav Item - User Information -->
                                <li class="nav-item dropdown no-arrow">
                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>

                                        <img class="img-profile rounded-circle"
                                            src="img/undraw_profile.svg">
                                    </a>
                                    <!-- Dropdown - User Information -->
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                        aria-labelledby="userDropdown">
                                        <div class="dropdown-divider">
                                        </div>
                                        <form action="{{ route('logout') }}" method="GET">
                                            @csrf
                                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                                Logout
                                            </a>
                                        </form>
                                        
                                        
                                    </div>
                                </li>
        
                            </ul>
        
                        </nav>
                     
                        <!-- End of Topbar -->

    @yield('content')

    
 <!-- Bootstrap core JavaScript-->
 
 <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
 <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script> 
 <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script> 
 <script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script> 
 {{-- javascript --}}
 <script src="{{asset('js/sb-admin-2.min.js')}}"></script> 
 <script src="{{asset('js/demo/chart-area-demo.js')}}"></script> 
 <script src="{{asset('js/demo/chart-pie-demo.js')}}"></script> 


 {{-- <script src="vendor/jquery/jquery.min.js"></script>
 <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> --}}

 <!-- Core plugin JavaScript-->
 {{-- <script src="vendor/jquery-easing/jquery.easing.min.js"></script> --}}

 <!-- Custom scripts for all pages-->
 {{-- <script src="js/sb-admin-2.min.js"></script> --}}

 <!-- Page level plugins -->
 {{-- <script src="vendor/chart.js/Chart.min.js"></script> --}}

 <!-- Page level custom scripts -->
 {{-- <script src="js/demo/chart-area-demo.js"></script>
 <script src="js/demo/chart-pie-demo.js"></script> --}}


   



 

</body>

</html>