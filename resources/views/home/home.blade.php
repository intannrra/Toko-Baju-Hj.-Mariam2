<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Home - Toko Produk</title>
</head>
<body>
    <div class="container mt-5">
        <div class="text-center">
            <h1>Selamat Datang di Toko Kami</h1>
            <p class="lead">Temukan produk terbaik dengan harga terjangkau.</p>
            <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg mt-4">Lihat Daftar Produk</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
