<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pesanan</title>
  <!-- Link Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
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

    h1 {
      color: #333;
    }

    /* Style untuk tabel */
    .rounded-table {
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Style untuk keranjang belanja */
    .cart-container {
      background-color: #e9ecef;
      padding: 15px;
      border-radius: 10px;
      margin-bottom: 20px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .cart-item {
      display: flex;
      justify-content: space-between;
      margin-bottom: 10px;
    }

    .cart-item img {
      width: 50px;
      height: 50px;
      object-fit: cover;
      border-radius: 5px;
    }

    .cart-item .item-info {
      flex-grow: 1;
      margin-left: 10px;
    }
  </style>
</head>
<body>
  <div class="d-flex">
    <!-- Sidebar -->
    <div id="sidebar">
      <nav class="nav flex-column">
        <a class="nav-link" href="dashboard">Dashboard</a>
        <a class="nav-link" href="products">Produk</a>
        <a class="nav-link" href="transactions">Transaksi</a>
        <a class="nav-link" href="orders">Pesanan</a>
        <a class="nav-link" href="logouts">Logout</a>
      </nav>
    </div>

    <!-- Content -->
    <div id="content" class="w-100">
      <h3>Produk yang Tersedia</h3>

      <div class="container mt-3">
        <!-- Tabel Produk -->
        <div class="table-responsive">
          <table class="table table-bordered table-hover table-striped rounded-table">
            <thead class="table-dark text-center">
              <tr>
                <th scope="col">Gambar</th>
                <th scope="col">Nama</th>
                <th scope="col">Ukuran</th>
                <th scope="col">Harga</th>
                <th scope="col">Stok</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody class="text-center">
              @forelse ($products as $product)
              <tr>
                <td><img src="{{ asset('storage/products/'.$product->image) }}" alt="Gambar Produk" class="product-image" style="width: 100px; height: 100px; object-fit: cover; border-radius: 5px;"></td>
                <td>{{ $product->title }}</td>
                <td>{{ $product->size }}</td>
                <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                <td>{{ $product->stock }}</td>
                <td>
                  <button class="btn btn-primary btn-sm" onclick="addToCart({{ $product->id }}, '{{ $product->title }}', '{{ $product->price }}')">
                    <i class="fas fa-cart-plus"></i> Tambah ke Keranjang
                  </button>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="6" class="text-center">Data Produk Tidak Tersedia</td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>

        <!-- Keranjang Belanja -->
        <h3>Keranjang Belanja</h3>
        <div class="cart-container">
          <div id="cart-items">
            <!-- Daftar item keranjang akan muncul di sini -->
          </div>
          <div class="text-end">
            <strong>Total: Rp <span id="total-price">0</span></strong>
          </div>
          <button class="btn btn-success mt-3" onclick="checkout()">Checkout</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Link Bootstrap JS and Popper -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
  <!-- Optional: Include Font Awesome for icons -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>

  <script>
    let cart = [];

    function addToCart(id, title, price) {
      const product = { id, title, price: parseInt(price) };
      cart.push(product);
      renderCart();
    }

    function renderCart() {
      const cartItemsContainer = document.getElementById('cart-items');
      const totalPriceContainer = document.getElementById('total-price');
      cartItemsContainer.innerHTML = '';
      let totalPrice = 0;

      cart.forEach(item => {
        totalPrice += item.price;

        cartItemsContainer.innerHTML += `
          <div class="cart-item">
            <span class="item-info">${item.title} - Rp ${item.price}</span>
            <button class="btn btn-danger btn-sm" onclick="removeFromCart(${item.id})">Hapus</button>
          </div>
        `;
      });

      totalPriceContainer.textContent = totalPrice.toLocaleString();
    }

    function removeFromCart(id) {
      cart = cart.filter(item => item.id !== id);
      renderCart();
    }

    function checkout() {
      // Redirect ke halaman trans.blade.php
      window.location.href = "{{ route('checkout.form') }}";
    }
  </script>
</body>
</html>
