<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Detail Produk</title>
    <style>
        .product-image {
            width: 150px;  /* Ubah lebar gambar sesuai kebutuhan */
            height: auto;  /* Tinggi otomatis agar proporsional */
            object-fit: cover; /* Agar gambar tidak terdistorsi */
        }
    </style>
</head>
<body>
    <div class="container mt-3">
        <h4 class="text-center mt-3">Detail Produk</h4>
        <div class="card">
        <td><img src="{{ asset('storage/products/'.$product->image) }}" alt="Gambar Produk" class="product-image"></td>
            <div class="card-body">
                <h5 class="card-title">{{ $product->title }}</h5>
                <p class="card-text">Ukuran: {{ $product->size }}</p>
                <p class="card-text">Deskripsi: {{ $product->description }}</p>
                <p class="card-text">Harga: Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                <p class="card-text">Stok: {{ $product->stock }}</p>
                <p class="card-text">Id: {{ $product->id }}</p>
                <a href="{{ route('products.index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
