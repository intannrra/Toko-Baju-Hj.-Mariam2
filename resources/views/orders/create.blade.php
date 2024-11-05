@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Buat Pesanan Baru</h1>

    <!-- Menampilkan pesan sukses -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Menampilkan pesan error validasi -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="product_name">Nama Produk:</label>
            <input type="text" class="form-control" name="product_name" id="product_name" value="{{ old('product_name') }}" required>
        </div>

        <div class="form-group">
            <label for="quantity">Jumlah:</label>
            <input type="number" class="form-control" name="quantity" id="quantity" min="1" value="{{ old('quantity') }}" required>
        </div>

        <div class="form-group">
            <label for="price">Harga:</label>
            <input type="number" class="form-control" name="price" id="price" min="0.01" step="0.01" value="{{ old('price') }}" required>
        </div>

        <div class="form-group">
            <label for="customer_name">Nama Pelanggan:</label>
            <input type="text" class="form-control" name="customer_name" id="customer_name" value="{{ old('customer_name') }}" required>
        </div>

        <div class="form-group">
            <label for="customer_email">Email Pelanggan:</label>
            <input type="email" class="form-control" name="customer_email" id="customer_email" value="{{ old('customer_email') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Buat Pesanan</button>
    </form>
</div>
@endsection