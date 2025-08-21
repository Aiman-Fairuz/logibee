<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Transaksi - Cashmate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <h2>Daftar Transaksi</h2>
    <a href="{{ route('transactions.create') }}" class="btn btn-success mb-3">Tambah Transaksi</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kasir</th>
                <th>Total</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $trx)
                <tr>
                    <td>{{ $trx->trx_id }}</td>
                    <td>{{ $trx->user->name }}</td>
                    <td>Rp {{ number_format($trx->total,0,',','.') }}</td>
                    <td>{{ $trx->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
