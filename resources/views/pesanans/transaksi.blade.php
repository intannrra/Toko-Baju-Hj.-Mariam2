<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulir Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container mt-5">
      <h2 class="text-center mb-4">Formulir Transaksi</h2>

      <!-- Form untuk memasukkan data transaksi -->
      <form action="/pesanans/hasiltransaksi" method="GET">
  @csrf
  <div class="mb-3">
    <label for="idPesanan" class="form-label">ID Pesanan</label>
    <input type="text" class="form-control" id="idPesanan" name="id_pesanan" required>
  </div>

  <div class="mb-3">
    <label for="idKaryawan" class="form-label">ID Karyawan</label>
    <input type="text" class="form-control" id="idKaryawan" name="id_karyawan" required>
  </div>

  <div class="mb-3">
    <label for="idPembeli" class="form-label">ID Pembeli</label>
    <input type="text" class="form-control" id="idPembeli" name="id_pembeli" required>
  </div>

  <div class="mb-3">
    <label for="idTransaksi" class="form-label">ID Transaksi</label>
    <input type="text" class="form-control" id="idTransaksi" name="id_transaksi" required>
  </div>

  <div class="mb-3">
    <label for="totalHarga" class="form-label">Total Harga</label>
    <input type="number" class="form-control" id="totalHarga" name="total_harga" required>
  </div>

  <div class="mb-3">
    <label for="tanggalTransaksi" class="form-label">Tanggal Transaksi</label>
    <input type="date" class="form-control" id="tanggalTransaksi" name="tanggal_transaksi" required>
  </div>

  <div class="mb-3">
    <label for="namaBarang" class="form-label">Nama Barang</label>
    <input type="text" class="form-control" id="namaBarang" name="nama_barang" required>
  </div>

  <button type="submit" class="btn btn-primary">Selanjutnya</button>
</form>


    <!-- JavaScript -->
    <script>
      function submitForm() {
        // Mendapatkan nilai dari form
        var idPesanan = document.getElementById('idPesanan').value;
        var idKaryawan = document.getElementById('idKaryawan').value;
        var idPembeli = document.getElementById('idPembeli').value;
        var idTransaksi = document.getElementById('idTransaksi').value;
        var totalHarga = document.getElementById('totalHarga').value;
        var tanggalTransaksi = document.getElementById('tanggalTransaksi').value;
        var namaBarang = document.getElementById('namaBarang').value;

        // Simpan data ke localStorage
        localStorage.setItem('idPesanan', idPesanan);
        localStorage.setItem('idKaryawan', idKaryawan);
        localStorage.setItem('idPembeli', idPembeli);
        localStorage.setItem('idTransaksi', idTransaksi);
        localStorage.setItem('totalHarga', totalHarga);
        localStorage.setItem('tanggalTransaksi', tanggalTransaksi);
        localStorage.setItem('namaBarang', namaBarang);

        // Pindah ke halaman hasil
        window.location.href = "/pesanans/hasiltransaksi";
      }
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
