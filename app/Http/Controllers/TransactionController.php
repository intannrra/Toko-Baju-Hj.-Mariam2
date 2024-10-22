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
            'user' => 'required',
            'product' => 'required',
            'total' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        // Simpan data transaksi ke database
        Transaction::create([
            'user' => $request->user,
            'product' => $request->product,
            'total' => $request->total,
            'price' => $request->price,
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
            'user' => 'required',
            'product' => 'required',
            'total' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        // Update data transaksi
        $transaction->update([
            'user' => $request->user,
            'product' => $request->product,
            'total' => $request->total,
            'price' => $request->price,
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
