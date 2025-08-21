<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Cashmate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { min-height: 100vh; display: flex; }
        .sidebar {
            width: 220px;
            background: #16a34a;
            color: white;
            padding: 20px;
        }
        .sidebar h4 {
            font-weight: bold;
            margin-bottom: 20px;
        }
        .sidebar a {
            display: block;
            padding: 10px;
            margin: 5px 0;
            text-decoration: none;
            color: white;
            border-radius: 6px;
        }
        .sidebar a:hover {
            background: #15803d;
        }
        .content {
            flex: 1;
            padding: 20px;
            background: #f9fafb;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
  <div class="sidebar">
    <h4>Cashmate</h4>
    <a href="{{ route('users.index') }}">Users</a>
    <a href="{{ route('products.index') }}">Produk</a>
    <a href="{{ route('transactions.index') }}">Transaksi</a>
    <a href="{{ route('reports.index') }}">Laporan</a>
    <form action="{{ route('logout') }}" method="POST" class="mt-3">
        @csrf
        <button type="submit" class="btn btn-light w-100">Logout</button>
    </form>
</div>



    <!-- Content -->
    <div class="content">
        <h2>Dashboard</h2>
        <p>Halo, <b>{{ Auth::user()->name }}</b> 👋</p>
        <p>Selamat datang di aplikasi kasir <b>Cashmate</b>.</p>
    </div>

</body>
</html>
