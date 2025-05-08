<?php
namespace App\Http\Controllers;
use App\Models\Transaksi;
use App\Models\Pembayaran;
use App\Models\Kamar;
use App\Models\Penyewa;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class SewaController extends Controller
{
    use Notifiable;
    //menampilkan transaksi pembayaran pada halaman admin
    public function bayar()
    {
        $pemasukan_bulanan = Pembayaran::select(DB::raw("SUM(jumlah_bayar * 1000) as jumlah_bayar"))
    ->whereMonth('created_at', now()->month)
    ->value('jumlah_bayar'); 

        $pemasukan_tahunan = Pembayaran::select(DB::raw("SUM(jumlah_bayar*1000) as jumlah_bayar"))
            ->whereYear('created_at', now()->year)
            ->value('jumlah_bayar');
        
        $transaksis = Transaksi::orderBy('created_at', 'DESC')->get();
        $transaksis = Transaksi::with('kamar')->get();
        $transaksis = Transaksi::with('user')->get();
        $pembayarans     = Pembayaran::join('transaksis', 'transaksis.id', '=', 'pembayarans.transaksi_id')
            ->select('pembayarans.*', 'transaksis.harga')
            ->get();
        // Ubah status yang sudah jatuh tempo
        $jatuh_tempo =Transaksi::where('status', 'sukses')
->where('batas', '<=', now())
->update(['status' => 'pending']);

// Ambil data transaksi yang sudah pending dan jatuh tempo
$jatuh_tempo = Transaksi::where('status', 'pending')
->where('batas', '<=', now())
->with(['kamar', 'user'])
->get();
        return view('admin/pembayaran/index', compact('transaksis', 'jatuh_tempo', 'pemasukan_bulanan', 'pemasukan_tahunan', 'pembayarans'));
    }

    //menampilkan transaksi pembayaran pada halaman penyewa
    // Halaman daftar tagihan pembayaran
public function penyewaBayar()
{
    // Cek dan update transaksi yang jatuh tempo
    Transaksi::where('status', 'sukses')
        ->where('batas', '<=', now())
        ->where('user_id', auth()->id())
        ->update(['status' => 'pending']);

    // Ambil transaksi pending milik user
    $transaksis = Transaksi::where('user_id', auth()->id())
        ->where('status', 'pending')
        ->with('kamar')
        ->get();

    return view('penyewa/pembayaran/index', compact('transaksis'));
}

// Halaman form pembayaran digital
public function bayarDulu()
{
    $transaksis = Transaksi::where('user_id', auth()->id())
        ->where('status', 'pending')
        ->with('kamar')
        ->first();

    if (!$transaksis) {
        return redirect()->route('penyewa/pembayaran/index')->with('error', 'Tidak ada tagihan yang bisa dibayar.');
    }

    $pembayarans = Pembayaran::join('transaksis', 'transaksis.id', '=', 'pembayarans.transaksi_id')
        ->select('pembayarans.*', 'transaksis.harga')
        ->get();

    $user = auth()->user();

    return view('penyewa/bayar/index', compact('transaksis', 'pembayarans', 'user'));
}


    //setelah input transaksi pembayaran digital, simpan ke database
    public function bayarProses(Request $request)
    {
        $request->validate(
            [
                'transaksi_id' => 'required',
                'user_id' => 'required',
                'jumlah_bayar' => 'required',
                'metode_pembayaran' => 'required',
                'foto' => 'mimes:png,jpeg,jpg|max:2048',
            ]
        );
 
        $filePath = public_path('bukti_bayar');
        $insert = new Pembayaran();
        $insert->transaksi_id = $request->transaksi_id;
        $insert->user_id = $request->user_id;
        $insert->jumlah_bayar = $request->jumlah_bayar;
        $insert->metode_pembayaran = $request->metode_pembayaran;
 
        if ($request->hasfile('foto')) {
            $file = $request->file('foto');
            $file_name = time() . $file->getClientOriginalName();
 
            $file->move($filePath, $file_name);
            $insert->foto = $file_name;
        }
 
        $result = $insert->save();
        Session::flash('success', 'Pembayaran berhasil ditambahkan!');
        return redirect()->route('penyewa/pembayaran');
    }

    //admin approve transaksi yang dilakukan oleh penyewa
    public function approve(string $id)
    {
        $transaksis = Transaksi::findOrFail($id); //diambil berdasarkan id
        $transaksis->status = 'sukses';
        $transaksis->mulai = Carbon::now()->toDateString(); //update tanggal transaksi
        $transaksis->batas = Carbon::now()->addDay(30)->toDateString(); //update tanggal jatuh tempo
        $transaksis->save();
         // Ambil kamar berdasarkan ID kamar yang ada di transaksi
        $kamars = Kamar::findOrFail($transaksis->kamar_id);
        $kamars->status = 'Terisi';
        $kamars->save();
        Session::flash('success', 'Pembayaran berhasil ditambahkan!');
        return redirect()->route('admin/pembayaran');
    }

    //menampilkan data history pembayaran pada penyewa
    public function historyPembayaran()
    {
        $pembayarans = Pembayaran::where('user_id', Auth::user()->id)->get();
        return view('penyewa/pembayaran/bayar', compact('pembayarans'));
    }

    public function invoice(string $id)  
    {
        $transaksis = Transaksi::findOrFail($id);
        $transaksis = Transaksi::with('kamar')->findOrFail($id);
        $transaksis = Transaksi::with('user')->findOrFail($id);
  
        return view('admin/pembayaran/invoice', compact('transaksis'));
    }
}
