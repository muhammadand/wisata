@extends('layout.template')

@section('content')
<div class="container mt-2 mb-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Orders</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tiket</th>
                                <th>Quantity</th>
                                <th>Total Bayar</th>
                                <th>Scan untuk membayar</th> <!-- Tambah kolom untuk metode pembayaran -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $order->tiket->nama_tiket }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->total_harga }}</td>
                                <td>
                                    <img src="images//qr.png" alt="Nama Foto">

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
