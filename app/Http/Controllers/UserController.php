<?php
 
namespace App\Http\Controllers;
use App\Mail\KirimEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use DB;
 
class UserController extends Controller
{
    
    public function index()
    {
        $transaksis     = Transaksi::join('users', 'users.id', '=', 'transaksis.user_id')
            ->select('transaksis.harga', 'transaksis.mulai', 'transaksis.batas','users.id', 'users.name', 'users.email', 'users.no_hp')
            ->get();
        return view('admin/penyewa/index', compact('transaksis'));
    }

    public function store(Request $request)
    {
        $users =User::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'password' => Hash::make($request->password),
            'type' => "0",
        ]);
        Transaksi::create([
            'user_id' => $users->id,
            'kamar_id'  => "0",
            'harga' => $request->harga,
            'mulai' => $request->mulai,
            'batas' => $request->batas,
        ]);

       // Kirim email ke user
    Mail::to($users->email)->send(new KirimEmail((object) [
        'name' => $users->name,
        'email' => $users->email,
        'password' => $request->password, // Jangan lupa hash password di database
    ]));
        
        
        $request->session()->regenerate();
 
        if (auth()->user()->type == 'admin') {
            return redirect()->route('admin/penyewa');
        } else {
            return redirect()->route('admin/penyewa');
        }
         
        return redirect()->route('admin/penyewa',  compact('users'));
    }

     /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $users = User::findOrFail($id);
        $transaksis = Transaksi::where('user_id', $id)->first();
  
        return view('admin/penyewa/edit', compact('users', 'transaksis'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_hp' => 'required|string|max:15',
            'password' => 'nullable|min:6', // Boleh kosong
            'harga' => 'required|numeric',
            'mulai' => 'required|date',
            'batas' => 'required|date',
        ]);
    
        DB::transaction(function () use ($request, $id) {
            // Update User
            $user = User::findOrFail($id);
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'password' => $request->filled('password') ? Hash::make($request->password) : $user->password,
            ]);
    
            // Update Transaksi
            $transaksi = Transaksi::where('user_id', $id)->firstOrFail();
            $transaksi->update([
                'harga' => $request->harga,
                'mulai' => $request->mulai,
                'batas' => $request->batas,
            ]);
        });
        return redirect()->route('admin/penyewa');
    }

        /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users = User::findOrFail($id);
  
        $users->delete();
  
        return redirect()->route('admin/penyewa')->with('success', 'User berhasil dihapus!');
    }

    public function userprofile()
    {
        return view('userprofile');
    }
 
    public function about()
    {
        return view('about');
    }
}