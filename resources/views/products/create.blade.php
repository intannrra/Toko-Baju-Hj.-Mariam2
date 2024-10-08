<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Tambah Produk</title>
  </head>
  <body>
    <div class="container mt-3">
    <h4>Tambah Produk</h4>

    <!-- Tampilkan error jika ada -->
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <!-- Form untuk menambah produk -->
    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf  <!-- Token CSRF wajib untuk keamanan Laravel -->

        <!-- Input gambar -->
        <div class="input-group m-3">
            <span class="input-group-text" id="basic-addon1">Upload Gambar</span>
            <input type="file" class="form-control" name="image" placeholder="Upload Gambar" required>
        </div>

        <!-- Input nama barang -->
        <div class="form-floating m-3">
            <input type="text" class="form-control" name="title" placeholder="Nama Barang" id="floatingNamaBarang" value="{{ old('title') }}" required>
            <label for="floatingNamaBarang">Nama Barang</label>
        </div>

        <!-- Input ukuran -->
        <div class="form-floating m-3">
            <input type="text" class="form-control" name="size" placeholder="Ukuran" id="floatingUkuran" value="{{ old('size') }}" required>
            <label for="floatingUkuran">Ukuran</label>
        </div>

        <!-- Input harga -->
        <div class="form-floating m-3">
            <input type="number" class="form-control" name="price" placeholder="Harga" id="floatingHarga" value="{{ old('price') }}" required>
            <label for="floatingHarga">Harga</label>
        </div>

        <!-- Input stok -->
        <div class="form-floating m-3">
            <input type="number" class="form-control" name="stock" placeholder="Stok" id="floatingStok" value="{{ old('stock') }}" required>
            <label for="floatingStok">Stok</label>
        </div>

        <!-- Input deskripsi -->
        <div class="form-floating m-3">
            <textarea class="form-control" name="description" placeholder="Deskripsi" id="floatingTextarea" required>{{ old('description') }}</textarea>
            <label for="floatingTextarea">Deskripsi</label>
        </div>

        <!-- Input id -->
       <div class="form-floating m-3">
            <input type="number" class="form-control" name="id" placeholder="Id" id="floatingId" value="{{ old('id') }}" required>
            <label for="floatingId">Id</label>

        <!-- Tombol submit dan reset -->
        <button type="submit" class="btn btn-primary m-3">Simpan</button>
        <button type="reset" class="btn btn-warning m-3">Reset</button>

    </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </div>
  </body>
</html>
