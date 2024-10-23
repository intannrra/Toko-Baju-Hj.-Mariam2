<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TransactionController extends Controller
{
    // Menampilkan daftar transaksi
    public function index(): View
    {
        $transactions = Transaction::latest()->paginate(10);
        return view('transactions.index', compact('transactions'));
    }

    // Menampilkan form untuk membuat transaksi baru
    public function create(): View
    {
        return view('transactions.create');
    }

    // Menyimpan data transaksi baru
    public function store(Request $request): RedirectResponse
    {
        // Validasi form
        $request->validate([
            'user_id' => 'required|string', // Pastikan user_id diisi dan tipe string
            'product' => 'required|string',  // Pastikan product diisi dan tipe string
            'total' => 'required|numeric',    // Pastikan total diisi dan tipe numerik
            'price' => 'required|numeric',    // Pastikan price diisi dan tipe numerik
        ]);

        // Simpan data transaksi ke database
        Transaction::create([
            'user_id' => $request->input('user_id'), // Ambil user_id dari form input
            'product' => $request->input('product'),   // Ambil product dari form input
            'total' => $request->input('total'),       // Ambil total dari form input
            'price' => $request->input('price'),       // Ambil price dari form input
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil disimpan.');
    }

    // Menampilkan detail transaksi berdasarkan ID
    public function show(Transaction $transaction): View
    {
        return view('transactions.show', compact('transaction'));
    }

    // Menampilkan form untuk mengedit transaksi berdasarkan ID
    public function edit(Transaction $transaction): View
    {
        return view('transactions.edit', compact('transaction'));
    }

    // Mengupdate data transaksi yang ada
    public function update(Request $request, Transaction $transaction): RedirectResponse
    {
        // Validasi form
        $request->validate([
            'user_id' => 'required|string',
            'product' => 'required|string',
            'total' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        // Update data transaksi
        $transaction->update([
            'user_id' => $request->input('user_id'),
            'product' => $request->input('product'),
            'total' => $request->input('total'),
            'price' => $request->input('price'),
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil diupdate.');
    }

    // Menghapus transaksi berdasarkan ID
    public function destroy(Transaction $transaction): RedirectResponse
    {
        // Hapus data transaksi dari database
        $transaction->delete();

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
