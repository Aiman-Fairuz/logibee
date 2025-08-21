<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    // ✅ tampilkan semua produk
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // ✅ form tambah produk
    public function create()
    {
        return view('products.create');
    }

    // ✅ simpan produk baru
    public function store(Request $request)
    {
        $request->validate([
            'prd_name' => 'required|string|max:255',
            'prd_price' => 'required|numeric',
            'prd_stock' => 'required|integer',
        ]);

        Product::create([
            'prd_name' => $request->prd_name,
            'prd_price' => $request->prd_price,
            'prd_stock' => $request->prd_stock,
            'prd_create_by' => Auth::id(),
        ]);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan');
    }

    // ✅ form edit produk
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    // ✅ simpan update produk
    public function update(Request $request, $id)
    {
        $request->validate([
            'prd_name' => 'required|string|max:255',
            'prd_price' => 'required|numeric',
            'prd_stock' => 'required|integer',
        ]);

        $product = Product::findOrFail($id);
        $product->update([
            'prd_name' => $request->prd_name,
            'prd_price' => $request->prd_price,
            'prd_stock' => $request->prd_stock,
        ]);

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui');
    }

    // ✅ hapus produk
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus');
    }
}
