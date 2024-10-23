<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hasil Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container mt-5">
      <h2 class="text-center mb-4">Hasil Transaksi</h2>

      <!-- Tabel hasil transaksi -->
      <table class="table table-bordered">
        <tr>
          <th>ID Pesanan</th>
          <td id="hasilIdPesanan"></td>
        </tr>
        <tr>
          <th>ID Karyawan</th>
          <td id="hasilIdKaryawan"></td>
        </tr>
        <tr>
          <th>ID Pembeli</th>
          <td id="hasilIdPembeli"></td>
        </tr>
        <tr>
          <th>ID Transaksi</th>
          <td id="hasilIdTransaksi"></td>
        </tr>
        <tr>
          <th>Total Harga</th>
          <td id="hasilTotalHarga"></td>
        </tr>
        <tr>
          <th>Tanggal Transaksi</th>
          <td id="hasilTanggalTransaksi"></td>
        </tr>
        <tr>
          <th>Nama Barang</th>
          <td id="hasilNamaBarang"></td>
        </tr>
      </table>

      <!-- Tombol untuk kembali -->
      <div class="text-end">
        <button class="btn btn-secondary" onclick="window.history.back()">Kembali</button>
      </div>
    </div>

    <!-- JavaScript -->
    <script>
      // Mendapatkan data dari localStorage dan menampilkannya di tabel
      document.getElementById('hasilIdPesanan').innerText = localStorage.getItem('idPesanan');
      document.getElementById('hasilIdKaryawan').innerText = localStorage.getItem('idKaryawan');
      document.getElementById('hasilIdPembeli').innerText = localStorage.getItem('idPembeli');
      document.getElementById('hasilIdTransaksi').innerText = localStorage.getItem('idTransaksi');
      document.getElementById('hasilTotalHarga').innerText = 'Rp ' + new Intl.NumberFormat('id-ID').format(localStorage.getItem('totalHarga'));
      document.getElementById('hasilTanggalTransaksi').innerText = localStorage.getItem('tanggalTransaksi');
      document.getElementById('hasilNamaBarang').innerText = localStorage.getItem('namaBarang');
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
