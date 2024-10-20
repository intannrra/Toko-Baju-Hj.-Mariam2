<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
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

    /* Style untuk konten */
    h1 {
      color: #333;
    }
  </style>
</head>
<body>
  <div class="d-flex">
    <!-- Sidebar -->
    <div id="sidebar">
      <h4 class="text-light text-center">Dashboard</h4>
      <nav class="nav flex-column">
        <a class="nav-link" href="products">Produk</a> <!-- Link ke halaman produk -->
        <a class="nav-link" href="transactions">Transaksi</a>
        <a class="nav-link" href="logouts">Logout</a>
      </nav>
    </div>

    <!-- Content -->
    <div id="content" class="w-100">
      <h1>Welcome to Your Dashboard</h1>
      <p>This is your main dashboard content. You can add charts, data tables, or any other information here.</p>
    </div>
  </div>

  <!-- Link Bootstrap JS and Popper -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
