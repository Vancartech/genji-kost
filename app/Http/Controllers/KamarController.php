<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Kamar;
use App\Models\Transaksi;
use App\Models\Sewa;
use PDF;
use Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Auth;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kamars = Kamar::orderBy('created_at', 'DESC')->get();
        return view('admin.kamar.index', compact('kamars'));
    }

    public function guest()
    {
        $kamars = Kamar::get();
        return view('home', compact('kamars'));
    }

    public function genji()
    {
        $kamars = Kamar::orderBy('created_at', 'DESC')->get();
        return view('genji-kost.home', compact('kamars'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kamar.create');
    }
  
     /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'nama' => 'required',
                'harga' => 'required',
                'status' => 'required',
                'deskripsi' => 'required',
                'foto' => 'mimes:png,jpeg,jpg|max:2048',
            ]
        );
 
        $filePath = public_path('foto_kamar');
        $insert = new Kamar();
        $insert->nama = $request->nama;
        $insert->harga = $request->harga;
        $insert->status = $request->status;
        $insert->deskripsi = $request->deskripsi;
 
        if ($request->hasfile('foto')) {
            $file = $request->file('foto');
            $file_name = time() . $file->getClientOriginalName();
 
            $file->move($filePath, $file_name);
            $insert->foto = $file_name;
        }
 
        $result = $insert->save();
        Session::flash('success', 'Kamar berhasil ditambahkan!');
        return redirect()->route('admin/kamar');
    }
  
    /**
  
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kamars = Kamar::findOrFail($id);
        $userId = Auth::id();

        // Cek apakah user sudah terdaftar oleh admin
        $existingTransaction = Transaksi::where('user_id', $userId)
                                        ->where('kamar_id', 0)
                                        ->first();
        // Cek apakah user sudah memiliki transaksi aktif
        $existingActiveTransaction = Transaksi::where('user_id', $userId)
        ->whereNotIn('status', ['canceled', 'expired'])
        ->where('kamar_id', '!=', 0)
        ->first();
        return view('show', compact('kamars', 'existingTransaction', 'existingActiveTransaction'));
    }

    public function lihat(string $id)
    {
        $kamars = Kamar::findOrFail($id);
        return view('genji-kost.show.show', compact('kamars'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $kamars = Kamar::findOrFail($id);
  
        return view('admin.kamar.edit', compact('kamars'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'nama' => 'required',
                'harga' => 'required',
                'status' => 'required',
                'deskripsi' => 'required',
                'foto' => 'mimes:png,jpeg,jpg|max:2048',
            ]
        );
        $update = Kamar::findOrFail($id);
        $update->nama = $request->nama;
        $update->harga = $request->harga;
        $update->status = $request->status;
        $update->deskripsi = $request->deskripsi;
 
        if ($request->hasfile('foto')) {
            $filePath = public_path('foto_kamar');
            $file = $request->file('foto');
            $file_name = time() . $file->getClientOriginalName();
            $file->move($filePath, $file_name);
            // delete old photo
            if (!is_null($update->photo)) {
                $oldImage = public_path('foto_kamar/' . $update->foto);
                if (File::exists($oldImage)) {
                    unlink($oldImage);
                }
            }
            $update->foto = $file_name;
        }
 
        $result = $update->save();
        Session::flash('success', 'Kamar berhasil diupdate!');
        return redirect()->route('admin/kamar');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kamar = Kamar::findOrFail($id);
  
        $kamar->delete();
  
        return redirect()->route('admin/kamar')->with('success', 'Kamar berhasil dihapus!');
    }



}
