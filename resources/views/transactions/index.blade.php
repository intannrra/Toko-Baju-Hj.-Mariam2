<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Transaksi</title>
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

        .rounded-table {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
                <h1 class="text-center">Daftar Transaksi</h1>
                <a href="{{ route('transactions.create') }}" class="btn btn-primary mb-3">Tambah Transaksi</a>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <table class="table table-bordered table-hover table-striped rounded-table">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Produk</th>
                            <th>Jumlah</th>
                            <th>Total Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach($transactions as $transaction)
                            <tr>
                                <td>{{ $transaction->id }}</td>
                                <td>{{ $transaction->user->name }}</td>
                                <td>{{ $transaction->product->title }}</td>
                                <td>{{ $transaction->quantity }}</td>
                                <td>Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</td>
                                <td>
                                    <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
