<!doctype html> 
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Keranjang Belanja</title>
    <style>
      /* Untuk gambar produk di tabel */
      .product-image {
        width: 100px;
        height: 100px;
        object-fit: cover;
      }
      
      /* Membuat tabel dengan sudut tumpul dan warna pink */
      .rounded-table {
        border-radius: 15px; /* Sudut tumpul */
        overflow: hidden;
        background-color: #ffc0cb; /* Warna pink */
      }

      /* Membuat header tabel juga berwarna pink dengan sedikit penyesuaian */
      .rounded-table thead {
        background-color: #ff69b4; /* Warna pink lebih gelap untuk header */
        color: white;
      }
    </style>
  </head>
  <body>
    <div class="container mt-5">
      <h2 class="text-center mb-4">Keranjang Belanja</h2>

      <!-- Tabel Keranjang Belanja -->
      <table class="table table-bordered table-hover rounded-table">
        <thead class="text-center">
          <tr>
            <th scope="col">Gambar</th>
            <th scope="col">Nama Produk</th>
            <th scope="col">id</th>
            <th scope="col">Harga</th>
            <th scope="col">Total Harga</th>
          </tr>
        </thead>
        <tbody class="text-center">
          <!-- Contoh Produk -->
          <tr>
            <td><img src="{{ asset('images/jeans wanita denim.jpg') }}" alt="Gambar Produk" class="product-image"></td>
            <td>Lois Classic Fit Denim CŠ 465 E - Biru</td>
            <td class="id">123</td>
            <td class="price">Rp 230.000</td>
            <td class="total-price">Rp 230.000</td>
          </tr>
          <!-- Tambahkan produk lainnya disini -->
        </tbody>
      </table>

      <!-- Total keseluruhan -->
      <div class="d-flex justify-content-end">
        <p id="discount">Total: Rp 230.000</p>
      </div>
      <div class="d-flex justify-content-end">
        <p id="discount">Diskon: Rp 20.000</p>
      </div>

      <!-- Tambahkan Ongkir -->
      <div class="d-flex justify-content-end">
        <p id="shipping-cost">Ongkir: Rp 15.000</p>
      </div>

      <!-- Total Akhir -->
      <div class="d-flex justify-content-end">
        <h5 id="final-total">Total Akhir: Rp 210.000</h5>
      </div>

      <!-- Metode Pengiriman -->
      <div class="mt-4">
        <h5>Metode Pengiriman</h5>
        <p>Kurir: JNE</p>
      </div>

      <!-- Metode Pembayaran -->
      <div class="mt-4">
        <h5>Metode Pembayaran</h5>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="paymentMethod" id="transfer" value="transfer" checked>
          <label class="form-check-label" for="transfer">Transfer</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="paymentMethod" id="cod" value="cod">
          <label class="form-check-label" for="cod">Cash on Delivery (COD)</label>
        </div>
      </div>

      <!-- Tombol Checkout -->
      <form action="/pesanans/transaksi" method="GET" class="text-end mt-3">
        <button type="submit" class="btn btn-info">Isi Formulir Pembayaran</button>
      </form>

    <!-- JavaScript for Rupiah Format -->
    <script>
      function formatRupiah(angka) {
        var number_string = angka.toString().replace(/[^,\d]/g, ''), split = number_string.split(','), sisa = split[0].length % 3, rupiah = split[0].substr(0, sisa), ribuan = split[0].substr(sisa).match(/\d{3}/gi);
        if (ribuan) {
          var separator = sisa ? '.' : '';
          rupiah += separator + ribuan.join('.');
        }
        rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
        return 'Rp ' + rupiah;
      }

      var shippingCost = 15000; // Ongkos kirim tetap
      document.getElementById('shipping-cost').innerHTML = 'Ongkir: ' + formatRupiah(shippingCost.toString());

      function updateGrandTotal() {
        var total = 0;
        document.querySelectorAll('.total-price').forEach(function(el) {
          total += parseInt(el.innerHTML.replace(/\D/g, ''));
        });
        var discount = 20000; // Diskon
        var finalTotal = total - discount + shippingCost;
        document.getElementById('final-total').innerHTML = 'Total Akhir: ' + formatRupiah(finalTotal.toString());
      }

      updateGrandTotal();
    </script>

    <!-- Optional JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
