<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Penyewa;
use PDF;
use Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class PenyewaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penyewa = Penyewa::orderBy('created_at', 'DESC')->get();
        return view('admin.penyewa.index', compact('transaksis'));
    }

    public function guest()
    {
        $penyewa = Penyewa::orderBy('created_at', 'DESC')->get();
        return view('admin.penyewa.index', compact('transaksis'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.penyewa.create');
    }
  
     /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'id_kamar' => 'required',
                'id_user' => 'required',
                'no_hp' => 'required',
                'kota_asal' => 'required',
                'status' => 'required',
                'foto' => 'mimes:png,jpeg,jpg|max:2048',
            ]
        );
 
        $filePath = public_path('foto_penyewa');
        $insert = new Penyewa();
        $insert->id_kamar = $request->id_kamar;
        $insert->id_user = $request->id_user;
        $insert->no_hp = $request->no_hp;
        $insert->kota_asal = $request->kota_asal;
        $insert->status = $request->status;
 
        if ($request->hasfile('foto')) {
            $file = $request->file('foto');
            $file_name = time() . $file->getClientOriginalName();
 
            $file->move($filePath, $file_name);
            $insert->foto = $file_name;
        }
 
        $result = $insert->save();
        Session::flash('success', 'Penyewa berhasil ditambahkan!');
        return redirect()->route('admin.penyewa');
    }
  
    /**
  
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $penyewa = Penyewa::findOrFail($id);
  
        return view('admin.penyewa.show', compact('penyewa'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $penyewa = Penyewa::findOrFail($id);
  
        return view('admi/penyewa/edit', compact('penyewa'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'nama' => 'required',
                'email' => 'required',
                'nomor_hp' => 'required',
            ]
        );
        $update = Penyewa::findOrFail($id);
        $update->nama = $request->nama;
        $update->email = $request->email;
        $update->no_hp = $request->no_hp;
 
        $result = $update->save();
        Session::flash('success', 'Kamar berhasil diupdate!');
        return redirect()->route('admin/penyewa');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $penyewa = Penyewa::findOrFail($id);
  
        $penyewa->delete();
  
        return redirect()->route('admin.penyewa')->with('success', 'Kamar berhasil dihapus!');
    }

    public function cetak_pdf()
    {
        $penyewa = Penyewa::get();
        $pdf = PDF::loadView('pdf.barangPdf', ['barang'=>$barang]);
        return $pdf->stream();
    }
}
