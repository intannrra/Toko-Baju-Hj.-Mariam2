<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
{
    public function index()
    {
        // Tampilan produk
        return view('pesanans.index');
    }

    public function create()
    {
        // Tampilkan keranjang belanja
        $pesanans = Pesanan::all();
        $totalPrice = $pesanans->sum(function($pesanan) {
            return $pesanan->price * $pesanan->quantity;
        });
        return view('pesanans.create', compact('pesanans', 'totalPrice'));
    }

    public function store(Request $request)
    {
        // Simpan produk ke keranjang
        Pesanan::create([
            'nama_pesanan' => $request->pesanan_name, // Pastikan ini ada
            'harga' => $request->price,
            'jumlah' => $request->quantity,
            'warna_pesanan' => 'Medium Hitam',  // Misalnya ini
        ]);
        $request->validate([
            'pesanan_name' => 'required|string|max:260',
            'price' => 'required|numeric',
            'quantity' => 'required|integer|min:1',
        ]);
        

        return redirect()->route('pesanans.create');
    }
    public function transaksi(Request $request)
    {
        // Validasi input form
        $validatedData = $request->validate([
            'id_pesanan' => 'required|string|max:255',
            'id_karyawan' => 'required|string|max:255',
            'id_pembeli' => 'required|string|max:255',
            'id_transaksi' => 'required|string|max:255',
            'total_harga' => 'required|numeric',
            'tanggal_transaksi' => 'required|date',
            'nama_barang' => 'required|string|max:255',
        ]);

        // Simpan data ke database (misalnya ke tabel transaksi)
        DB::table('transaksi')->insert([
            'id_pesanan' => $validatedData['id_pesanan'],
            'id_karyawan' => $validatedData['id_karyawan'],
            'id_pembeli' => $validatedData['id_pembeli'],
            'id_transaksi' => $validatedData['id_transaksi'],
            'total_harga' => $validatedData['total_harga'],
            'tanggal_transaksi' => $validatedData['tanggal_transaksi'],
            'nama_barang' => $validatedData['nama_barang'],
        ]);

        // Redirect ke halaman hasil transaksi dengan pesan sukses
        return redirect('/pesanans/transaksi')->with('transaksi', 'Transaksi berhasil disimpan!');
    }
    public function simpanTransaksi(Request $request)
{
    // Validasi data dari URL query (GET)
    $request->validate([
        'id_pesanan' => 'required|string',
        'id_karyawan' => 'required|string',
        'id_pembeli' => 'required|string',
        'id_transaksi' => 'required|string',
        'total_harga' => 'required|numeric',
        'tanggal_transaksi' => 'required|date',
        'nama_barang' => 'required|string',
    ]);

    // Arahkan ke halaman hasil transaksi dengan data dari URL
    return redirect()->route('hasiltransaksi', [
        'id_pesanan' => $request->id_pesanan,
        'id_karyawan' => $request->id_karyawan,
        'id_pembeli' => $request->id_pembeli,
        'id_transaksi' => $request->id_transaksi,
        'total_harga' => $request->total_harga,
        'tanggal_transaksi' => $request->tanggal_transaksi,
        'nama_barang' => $request->nama_barang,
    ]);
}

public function hasiltransaksi(Request $request)
{
    // Ambil data dari query string
    $data = $request->only([
        'id_pesanan', 'id_karyawan', 'id_pembeli', 
        'id_transaksi', 'total_harga', 'tanggal_transaksi', 'nama_barang'
    ]);

    // Tampilkan data di view hasiltransaksi.blade.php
    return view('pesanans.hasiltransaksi', compact('pesanan','data'));
}

    // Method untuk menampilkan detail transaksi atau pesanan (gunakan jika diperlukan)
    public function show($id)
    {
        // Ambil pesanan berdasarkan ID
        $pesanan = DB::table('pesanan')->find($id);

        return view('pesanans.transaksi', compact('pesanan'));
    }
   
}
    
