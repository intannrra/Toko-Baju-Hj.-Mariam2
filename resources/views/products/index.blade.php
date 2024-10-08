<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Produk</title>
    <style>
      /* Styling gambar produk */
      .product-image {
        width: 150px;
        height: 150px;
        object-fit: cover;
      }

      /* Styling untuk tabel header */
      th {
        background-color: #4CAF50;
        color: white;
      }

      /* Hover efek pada baris tabel */
      tbody tr:hover {
        background-color: #f5f5f5;
      }

      /* Styling untuk tombol */
      .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
      }

      .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
      }

      .btn-success, .btn-warning, .btn-danger {
        margin-right: 5px;
      }

      /* Styling pencarian */
      .search-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
      }

      .pagination {
        justify-content: center;
      }
    </style>
  </head>
  <body>
    <h2 class="text-center mt-3">Daftar Produk (Kategori Perempuan)</h2>
    <div class="container mt-3">

      <!-- Tombol Tambah Produk dan Pencarian -->
      <div class="search-container mb-3">
        <a href="{{ route('products.create') }}" class="btn btn-primary">Tambah Produk</a>

        <!-- Form untuk pencarian produk -->
        <form class="d-flex" action="{{ route('products.index') }}" method="GET">
          <input class="form-control me-2" type="search" name="search" placeholder="Cari Produk" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Cari</button>
        </form>
      </div>

      <table class="table table-bordered table-hover">
        <thead class="text-center">
          <tr>
            <th scope="col">Gambar</th>
            <th scope="col">Nama</th>
            <th scope="col">Harga</th>
            <th scope="col">Stok</th>
            <th scope="col">Ukuran</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody class="text-center">
          @forelse ($products as $product)
          <tr>
            <td><img src="{{ asset('storage/products/'.$product->image) }}" alt="Gambar Produk" class="product-image"></td>
            <td>{{$product->title}}</td>
            <td class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
            <td>{{$product->stock}}</td>
            <td>{{$product->size}}</td>
            <td>
              <a href="{{ route('products.show', $product->id) }}" class="btn btn-success btn-sm">Lihat</a>
              <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
              <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="6" class="text-center">Data Belum Tersedia</td>
          </tr>
          @endforelse
        </tbody>
      </table>

      <!-- Pagination -->
      <div class="pagination justify-content-center">
        {{ $products->links() }}
      </div>

    </div>

    <!-- JavaScript for Rupiah Format -->
    <script>
      // Fungsi untuk format angka menjadi rupiah
      function formatRupiah(angka) {
        var number_string = angka.toString().replace(/[^,\d]/g, ''),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
          var separator = sisa ? '.' : '';
          rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
        return 'Rp ' + rupiah;
      }

      // Menerapkan format Rupiah
      document.querySelectorAll('.price').forEach(function(el) {
        el.innerHTML = formatRupiah(el.innerHTML.replace('Rp ', ''));
      });
    </script>

    <!-- Optional JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
