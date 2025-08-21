<?php
// app/Http/Controllers/TransactionController.php
namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index() {
        $transactions = Transaction::with('user')->latest()->get();
        return view('transactions.index', compact('transactions'));
    }

    public function create() {
        $products = Product::all();
        return view('transactions.create', compact('products'));
    }

    public function store(Request $request) {
        $request->validate([
            'products' => 'required|array',
            'products.*.prd_id' => 'required|exists:tb_products,prd_id',
            'products.*.quantity' => 'required|integer|min:1',
        ]);

        $total = 0;
        foreach ($request->products as $item) {
            $product = Product::find($item['prd_id']);
            $total += $product->prd_price * $item['quantity'];
        }

        $transaction = Transaction::create([
            'user_id' => Auth::id(),
            'total' => $total,
        ]);

        foreach ($request->products as $item) {
            $product = Product::find($item['prd_id']);
            TransactionItem::create([
                'trx_id' => $transaction->trx_id,
                'prd_id' => $product->prd_id,
                'quantity' => $item['quantity'],
                'subtotal' => $product->prd_price * $item['quantity'],
            ]);
        }

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dibuat');
    }
}
