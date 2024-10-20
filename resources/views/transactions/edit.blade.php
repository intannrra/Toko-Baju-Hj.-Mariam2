<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
                <h1>Edit Transaksi</h1>

                <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="user_id" class="form-label">User</label>
                        <select name="user_id" id="user_id" class="form-select" required>
                            <option value="">Pilih User</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ $user->id == $transaction->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="product_id" class="form-label">Produk</label>
                        <select name="product_id" id="product_id" class="form-select" required>
                            <option value="">Pilih Produk</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" {{ $product->id == $transaction->product_id ? 'selected' : '' }}>{{ $product->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Jumlah</label>
                        <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $transaction->quantity }}" min="1" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Transaksi</button>
                    <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
