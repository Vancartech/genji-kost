<?php

namespace App\Http\Controllers;
use App\Models\Transaksi;
use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;

class TransaksiController extends Controller
{
    public function index()
    {

        $transactions = Transaksi::where('user_id', Auth::user()->id)->get();

        $transactions->transform(function ($transaction, $key) {
            $transaction->kamar = collect(config('kamars'))->firstWhere('id', $transaction->kamar_id);
            return $transaction;
        });
        return view('transaksi', compact('transactions'));
    }

}
