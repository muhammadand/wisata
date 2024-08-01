@extends('layout.template')

@section('content')
<div class="container mt-2 mb-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Selamat datang di halaman pembelian tiket</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('orders.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="tiket_id">Tiket</label>
                            <select id="tiket_id" name="tiket_id" class="form-control">
                                @foreach ($tikets as $tiket)
                                    <option value="{{ $tiket->id }}" data-harga="{{ $tiket->harga }}">{{ $tiket->nama_tiket }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" id="quantity" name="quantity" class="form-control" min="1" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="total_harga">Total Price</label>
                            <input type="text" id="total_harga" name="total_harga" class="form-control" readonly>
                        </div>

                        <button type="submit" class="btn btn-primary">Beli sekarang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const quantityInput = document.getElementById('quantity');
        const totalPriceInput = document.getElementById('total_harga');
        const tiketSelect = document.getElementById('tiket_id');

        // Function to format numbers as currency
        function formatCurrency(value) {
            return value.toLocaleString('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            });
        }

        // Event listener to update total price
        function updateTotalPrice() {
            const selectedOption = tiketSelect.options[tiketSelect.selectedIndex];
            const tiketPrice = parseFloat(selectedOption.getAttribute('data-harga'));
            const quantity = parseFloat(quantityInput.value) || 0;
            const totalPrice = tiketPrice * quantity;

            // Display the formatted total price in the input field
            totalPriceInput.value = formatCurrency(totalPrice);
        }

        quantityInput.addEventListener('input', updateTotalPrice);
        tiketSelect.addEventListener('change', updateTotalPrice);

        // Call updateTotalPrice on page load
        updateTotalPrice();
    });
</script>
@endsection
