<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    // Menampilkan form untuk membuat pesanan baru
    public function create()
    {
        return view('orders.create');
    }

    // Menyimpan pesanan baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'customer_name' => 'required',
            'customer_email' => 'required|email',
        ]);

        // Menyimpan pesanan ke database
        Order::create($request->all());

        return redirect()->route('orders.index')->with('success', 'Order berhasil dibuat.');
    }

    // Menampilkan daftar pesanan
    public function index()
    {
        // Mengambil daftar pesanan dari session 'cart'
        $cart = Session::get('cart', []); // Mengambil data dari session
        return view('orders.index', compact('cart')); // Mengirimkan data ke tampilan
    }

    // Menambahkan produk ke session 'cart'
    public function addToCart(Request $request)
    {
        // Validasi data produk yang diterima dari request
        $request->validate([
            'product_id' => 'required|integer',
            'product_name' => 'required|string',
            'product_price' => 'required|numeric',
            'quantity' => 'required|integer', // Menambahkan validasi untuk quantity
        ]);

        // Ambil produk dari request
        $product = [
            'id' => $request->input('product_id'),
            'name' => $request->input('product_name'),
            'price' => $request->input('product_price'),
            'quantity' => $request->input('quantity'), // Menggunakan jumlah yang diterima dari form
        ];

        // Simpan produk ke dalam session 'cart'
        $cart = Session::get('cart', []);
        
        // Cek apakah produk sudah ada di keranjang
        $existingProductIndex = null;
        foreach ($cart as $index => $item) {
            if ($item['id'] === $product['id']) {
                $existingProductIndex = $index;
                break;
            }
        }

        // Jika produk sudah ada, update quantity
        if ($existingProductIndex !== null) {
            $cart[$existingProductIndex]['quantity'] += $product['quantity'];
        } else {
            // Jika produk belum ada, tambahkan produk baru
            $cart[] = $product;
        }

        Session::put('cart', $cart); // Simpan kembali ke session

        return redirect()->route('orders.index')->with('success', 'Produk berhasil ditambahkan ke pesanan!');
    }

    // Menghapus produk dari keranjang
    public function removeFromCart($productId)
    {
        $cart = Session::get('cart', []);
        // Filter produk yang tidak sesuai dengan ID yang ingin dihapus
        $cart = array_filter($cart, function ($item) use ($productId) {
            return $item['id'] !== $productId;
        });
        
        Session::put('cart', array_values($cart)); // Simpan kembali ke session tanpa produk yang dihapus

        return redirect()->route('orders.index')->with('success', 'Produk berhasil dihapus dari pesanan!');
    }

    // Memperbarui jumlah produk dalam keranjang
    public function updateCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'quantity' => 'required|integer|min:1', // Validasi untuk quantity minimal 1
        ]);

        $cart = Session::get('cart', []);
        
        // Cek apakah produk ada di keranjang
        foreach ($cart as $index => $item) {
            if ($item['id'] === $request->input('product_id')) {
                // Update quantity
                $cart[$index]['quantity'] = $request->input('quantity');
                break;
            }
        }

        Session::put('cart', $cart); // Simpan kembali ke session

        return redirect()->route('orders.index')->with('success', 'Jumlah produk berhasil diperbarui!');
    }
}
