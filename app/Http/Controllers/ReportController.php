<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        // contoh laporan harian / bulanan
        $reports = DB::table('transactions')
            ->selectRaw('DATE(trx_transaction_at) as tanggal, COUNT(*) as jumlah_transaksi, SUM(trx_total_amount) as total_penjualan')
            ->groupBy('tanggal')
            ->get();

        return view('reports.index', compact('reports'));
    }
}
