<?php
namespace App\Http\Controllers;
use App\Models\Transaksi;
use App\Models\Kamar;
use App\Models\User;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $kamars = Kamar::orderBy('created_at', 'DESC')->get();
        return view('genji-kost.home', compact('kamars'));
    }
}
