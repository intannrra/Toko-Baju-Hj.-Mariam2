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

        /* Center the table */
        .table-container {
            display: flex;
            justify-content: center;
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

        <!-- Main Content -->
        <div id="content" class="w-100">
            <h3>Daftar Transaksi</h3>

            <div class="container mt-3">
                <a href="{{ route('transactions.create') }}" class="btn btn-primary mb-3">
                  <i class="fas fa-plus"></i> Tambah Transaksi
                </a>

                <!-- Table Container to center the table -->
                <div class="table-container">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped rounded-table">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Produk</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Total Harga</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @forelse ($transactions as $transaction)
                                <tr>
                                    <td>{{$transaction->id}}</td>
                                    <td>{{$transaction->user}}</td>
                                    <td>{{$transaction->product}}</td>
                                    <td>{{$transaction->total}}</td>
                                    <td class="price">Rp {{ number_format($transaction->price, 0, ',', '.') }}</td>
                                    <td>
                                        <a href="{{ route('transactions.show', $transaction->id) }}" class="btn btn-success btn-sm">
                                            <i class="fas fa-eye"></i> Lihat
                                        </a>
                                        <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash-alt"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">Data Belum Tersedia</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Link Bootstrap JS and Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <!-- Optional: Include Font Awesome for icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>
