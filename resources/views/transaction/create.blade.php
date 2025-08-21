<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Buat Transaksi - Cashmate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <h2>Buat Transaksi</h2>
    <form method="POST" action="{{ route('transactions.store') }}">
        @csrf
        <div id="products">
            <div class="row mb-3">
                <div class="col">
                    <label>Produk</label>
                    <select name="products[0][prd_id]" class="form-control">
                        @foreach($products as $prd)
                            <option value="{{ $prd->prd_id }}">{{ $prd->prd_name }} - Rp {{ number_format($prd->prd_price,0,',','.') }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <label>Jumlah</label>
                    <input type="number" name="products[0][quantity]" class="form-control" min="1" value="1">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Simpan Transaksi</button>
    </form>
</body>
</html>
