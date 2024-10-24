<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        // Validasi form
        $request->validate([
            'address' => 'required|string|max:255',
            'shipping_service' => 'required|string',
            'payment_method' => 'required|string',
            'payment_proof' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);

        // Simpan file bukti pembayaran
        if ($request->hasFile('payment_proof')) {
            $file = $request->file('payment_proof');
            $path = $file->store('public/payment_proofs');
            $filename = $file->hashName();

            // Simpan path atau nama file di database sesuai kebutuhan
        }

        // Lakukan proses checkout lainnya
        // ...

        return redirect()->route('checkout.form')->with('success', 'Checkout Berhasil, bukti pembayaran berhasil diunggah!');
    }

}
