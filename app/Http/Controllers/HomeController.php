<?php
 
namespace App\Http\Controllers;
use App\Models\Transaksi;
use App\Models\Pembayaran;
use App\Models\Kamar;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;

 
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('home');
    }

    public function penyewaHome()
    {
        setlocale(LC_TIME, 'id_ID'); // Untuk format waktu
        Carbon::setLocale('id');
        $kamars = Transaksi::where('user_id', Auth::user()->id)->get();
        $transaksis = Transaksi::where('user_id', Auth::user()->id)->get();
        
        $jatuh_tempo = Transaksi::where('status', 'sukses')
            ->where('batas', '<=', now())
            ->update(['status' => 'pending']);
        $jatuh_tempo = Transaksi::where('status', 'pending')
                        ->where('batas', '<=', now())
                        ->with('kamar', 'user')
                        ->get();
        return view('penyewa.dashboard', compact('kamars', 'transaksis', 'jatuh_tempo'));
    }

    public function adminHome()
    {
        $kamar_kosong = Kamar::where('status', '=', 'Kosong')->count();
        $kamar_terisi = Kamar::where('status', '=', 'Terisi')->count();
        $penyewa = User::where('type', '=', '0')->count();
        $total_pemasukan = Pembayaran::select(DB::raw("SUM(jumlah_bayar*1000) as jumlah_bayar"))
        ->whereYear('created_at', now()->year)
        ->value('jumlah_bayar');
        $pembayarans     = Pembayaran::join('transaksis', 'transaksis.id', '=', 'pembayarans.transaksi_id')
            ->select('pembayarans.*', 'transaksis.harga')
            ->get();
            $jatuh_tempo = Transaksi::where('status', 'sukses')
            ->where('batas', '<=', now())
            ->update(['status' => 'pending']);
        $jatuh_tempo = Transaksi::where('status', 'pending')
                        ->where('batas', '<=', now())
                        ->with('kamar', 'user')
                        ->get();
        return view('admin.dashboard', compact('total_pemasukan', 'kamar_kosong', 'kamar_terisi', 'penyewa', 'jatuh_tempo', 'pembayarans'));
    }
}