<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Pengguna - Cashmate</title>
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

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">Manajemen Pengguna</h3>
        <a href="{{ route('users.create') }}" class="btn btn-success">+ Tambah User</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead class="table-success">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="badge bg-primary">
                                    {{ $user->role->rol_name ?? '-' }}
                                </span>
                            </td>
                            <td>
                                @if ($user->deleted_at)
                                    <span class="badge bg-danger">Nonaktif</span>
                                @else
                                    <span class="badge bg-success">Aktif</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus user ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada pengguna</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
