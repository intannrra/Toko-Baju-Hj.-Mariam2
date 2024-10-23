<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row align-items-center">
        <div class="col-md-6 text-center">
            <img src="/images/jeans wanita denim.jpg" alt="Lois Classic Fit Denim CŠ 465 E - Biru" class="img-fluid" style="width: 200px; height: auto; border-radius: 10px;">
        </div>
        <div class="col-md-6">
            <h3>Lois Classic Fit Denim CŠ 465 E - Biru</h3>
            <h4 class="text-danger">Rp 230.000</h4>
            <div class="mb-3">
                <div class="quantity-input">
                </div>
                <form action="/pesanans/create" method="POST">
                    @csrf
                    <input type="hidden" name="pesanan_name" value="Lois Classic Fit Denim CŠ 465 E - Biru">
                    <input type="hidden" name="price" value="230000">
                    <input type="hidden" name="quantity" id="quantity_input" value="1">
                    <button type="submit" class="btn btn-warning">Tambah Keranjang</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row align-items-center">
        <div class="col-md-6 text-center">
            <img src="/images/jaket navy wanita.jpg" alt="Pull & Bear - Basic Nylon Puffer Navy Women" class="img-fluid" style="width: 200px; height: auto; border-radius: 10px;">
        </div>
        <div class="col-md-6">
            <h3>Pull & Bear - Basic Nylon Puffer Navy Women</h3>
            <h4 class="text-danger">Rp 150.000</h4>
            <div class="mb-3">
                <div class="quantity-input">
                </div>
                <form action="/pesanans/create" method="POST">
                    @csrf
                    <input type="hidden" name="pesanan_name" value="Pull & Bear - Basic Nylon Puffer Navy Women">
                    <input type="hidden" name="price" value="150000">
                    <input type="hidden" name="quantity" id="quantity_input" value="1">
                    <button type="submit" class="btn btn-warning">Tambah Keranjang</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
