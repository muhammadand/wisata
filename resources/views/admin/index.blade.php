@extends('layoutadmin.template')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
            </a>
        </div>

        <!-- Content Row -->
        <div class="row">
            <!-- Total Products Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Wisata</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $wisataCount }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-camera fa-2x text-gray-300"></i>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Orders Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-dark shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Seni budaya</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $senibudayaCount }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-music fa-2x text-gray-300"></i>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <!-- Total Orders Card -->
             <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-dark shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    UMKM</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $productCount }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-store fa-2x text-gray-300"></i>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Orders Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Sejarah</div>
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800" id="totalOrders">{{$sejarahCount}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-landmark fa-2x text-gray-300"></i>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

           

        </div>
    </div>
    <!-- End of Main Content -->

  <!-- Feedbacks Table -->
  <div class="col-12 mb-4">
    <div class="card shadow h-100 py-2">
        <div class="card-body">
            <h5 class="card-title">Feedbacks</h5>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Message</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($feedbacks as $feedback)
                        <tr>
                            <td>{{ $feedback->name }}</td>
                            <td>{{ $feedback->message }}</td>
                            <td>{{ $feedback->created_at->format('d M Y H:i') }}</td>
                            <td>
                                <form action="{{ route('feedback.destroy', $feedback->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this feedback?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No feedbacks found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
  
@endsection
