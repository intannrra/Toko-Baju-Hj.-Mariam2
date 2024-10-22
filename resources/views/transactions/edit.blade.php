<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Edit Transaksi</title>
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
                <h4 class="card-title text-center">Edit Transaksi</h4>

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

                <!-- Form untuk mengedit transaksi -->
                <form action="{{ route('transactions.update', $transaction->id) }}" method="post" enctype="multipart/form-data" novalidate>
                  @csrf  <!-- Token CSRF wajib untuk keamanan Laravel -->
                  @method('PUT') <!-- Method PUT untuk update -->

                  <!-- Input user -->
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="user" id="floatingUser" placeholder="User" value="{{ old('user', $transaction->user) }}" required>
                    <label for="floatingUser">User</label>
                    <div class="invalid-feedback">User wajib diisi.</div>
                  </div>

                  <!-- Input product -->
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="product" id="floatingProduct" placeholder="Produk" value="{{ old('product', $transaction->product) }}" required>
                    <label for="floatingProduct">Produk</label>
                    <div class="invalid-feedback">Produk wajib diisi.</div>
                  </div>

                  <!-- Input total -->
                  <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="total" id="floatingTotal" placeholder="Total" value="{{ old('total', $transaction->total) }}" required>
                    <label for="floatingTotal">Total</label>
                    <div class="invalid-feedback">Total wajib diisi.</div>
                  </div>

                  <!-- Input price -->
                  <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="price" id="floatingPrice" placeholder="Harga" value="{{ old('price', $transaction->price) }}" required>
                    <label for="floatingPrice">Harga (Rp)</label>
                    <div class="invalid-feedback">Harga wajib diisi.</div>
                  </div>

                  <!-- Tombol submit dan batal -->
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update Transaksi</button>
                    <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Batal</a>
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
