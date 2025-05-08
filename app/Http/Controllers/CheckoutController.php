<?php

namespace App\Http\Controllers;
use App\Models\Transaksi;
use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;

class CheckoutController extends Controller
{

    public function process(Request $request)
{
    $userId = Auth::id();
    $data = $request->all();
    $kamars = Transaksi::where('user_id', $userId)->get();
    $transaksis = Transaksi::where('user_id', $userId)->get();

    if (!isset($data['id'])) {
        return redirect()->back()->with('error', 'Kamar ID tidak ditemukan!');
    }

    $kamarId = $data['id'];

    // Cek apakah user sudah memiliki transaksi aktif
    $existingActiveTransaction = Transaksi::where('user_id', $userId)
        ->whereNotIn('status', ['canceled', 'expired'])
        ->where('kamar_id', '!=', 0)
        ->first();

    if ($existingActiveTransaction) {
        return redirect()->back()->with('error', 'Anda sudah memiliki kamar yang disewa, tidak bisa menyewa lebih dari satu kamar!');
    }

    // Cek apakah user memiliki transaksi dengan kamar_id = 0
    $existingTransaction = Transaksi::where('user_id', $userId)
        ->where('kamar_id', 0)
        ->whereNotIn('status', ['pending', 'gagal'])
        ->first();

    if ($existingTransaction) {
        // Jika user sudah ada, hanya update kamar_id
        $existingTransaction->update([
            'kamar_id' => $kamarId,
        ]);
    } else {
        // Jika user belum ada, buat transaksi baru
        Transaksi::create([
            'user_id' => $userId,
            'kamar_id' => $data['id'],
            'harga' => $data['harga'],
            'status' => 'pending',
            'mulai' => $data['mulai'],
            'batas' => $data['batas'],
        ]);
    }

    return view('penyewa/dashboard', compact('existingTransaction', 'existingActiveTransaction', 'kamars', 'transaksis'));
}



    public function checkout(Transaksi $transaction)
    {
        $kamars = config('kamars');
        $kamar = collect($kamars)->firstWhere('id', $transaction->kamar_id);

        return view('checkout',  compact('transaction', 'kamars'));
    }

}
