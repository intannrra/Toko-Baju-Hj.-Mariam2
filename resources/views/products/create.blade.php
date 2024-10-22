<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Tambah Produk</title>
  <style>
    body {
      background-color: #f8f9fa;
    }
    .card {
      margin-top: 20px;
    }
    .form-control:invalid {
      border-color: #dc3545;
    }
    .form-control:valid {
      border-color: #28a745;
    }
    /* Style untuk Sidebar */
    #sidebar {
      height: 100vh;
      width: 250px;
      background-color: #343a40;
      padding-top: 20px;
      position: fixed;
    }

    #sidebar .nav-link {
      color: #ffffff;
      font-size: 1.1rem;
      margin-bottom: 15px;
    }

    #sidebar .nav-link:hover {
      background-color: #495057;
    }

    #content {
      margin-left: 250px;
      padding: 20px;
    }
  </style>
</head>
<body>
  <div class="d-flex">
    <!-- Sidebar -->
    <div id="sidebar">
      <h4 class="text-light text-center">Dashboard</h4>
      <nav class="nav flex-column">
        <a class="nav-link" href="products">Produk</a>
        <a class="nav-link" href="transactions">Transaksi</a>
        <a class="nav-link" href="logouts">Logout</a>
      </nav>
    </div>

    <!-- Content -->
    <div id="content" class="w-100">
      <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <div class="card shadow">
              <div class="card-body">
                <h4 class="card-title text-center">Tambah Produk</h4>

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
                <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data" novalidate>
                @csrf  <!-- Token CSRF wajib untuk keamanan Laravel -->

                  <!-- Input gambar -->
                  <div class="mb-3">
                    <label for="image" class="form-label">Upload Gambar</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                    <div class="invalid-feedback">Harap unggah gambar produk.</div>
                  </div>

                  <!-- Input nama barang -->
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="title" id="floatingNamaBarang" placeholder="Nama Barang" value="{{ old('title') }}" required>
                    <label for="floatingNamaBarang">Nama Barang</label>
                    <div class="invalid-feedback">Nama barang wajib diisi.</div>
                  </div>

                  <!-- Input ukuran -->
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="size" id="floatingUkuran" placeholder="Ukuran" value="{{ old('size') }}" required>
                    <label for="floatingUkuran">Ukuran</label>
                    <div class="invalid-feedback">Ukuran wajib diisi.</div>
                  </div>

                  <!-- Input harga -->
                  <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="price" id="floatingHarga" placeholder="Harga" value="{{ old('price') }}" required>
                    <label for="floatingHarga">Harga (Rp)</label>
                    <div class="invalid-feedback">Harga wajib diisi.</div>
                  </div>

                  <!-- Input stok -->
                  <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="stock" id="floatingStok" placeholder="Stok" value="{{ old('stock') }}" required>
                    <label for="floatingStok">Stok</label>
                    <div class="invalid-feedback">Stok wajib diisi.</div>
                  </div>

                  <!-- Input deskripsi -->
                  <div class="form-floating mb-3">
                    <textarea class="form-control" name="description" id="floatingTextarea" placeholder="Deskripsi Produk" required>{{ old('description') }}</textarea>
                    <label for="floatingTextarea">Deskripsi Produk</label>
                    <div class="invalid-feedback">Deskripsi wajib diisi.</div>
                  </div>

                  <!-- Input hidden untuk custom_id -->
                <input type="hidden" name="custom_id" id="custom_id" value="{{ old('custom_id') }}">

                  <!-- Tombol submit dan reset -->
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Simpan Produk</button>
                    <button type="reset" class="btn btn-warning">Reset Formulir</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- JavaScript for form validation -->
  <script>
    // Disable form submission if there are invalid fields
    (function () {
      'use strict';
      var forms = document.querySelectorAll('form');

      Array.prototype.slice.call(forms)
        .forEach(function (form) {
          form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
              event.preventDefault();
              event.stopPropagation();
            }

            form.classList.add('was-validated');
          }, false);
        });
    })();
  </script>
</body>
</html>
