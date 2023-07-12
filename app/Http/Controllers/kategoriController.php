<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perusahaan;
use App\Models\Kategori;

class kategoriController extends Controller
{
    public function index()
    {
        // $sekolah = getSekolahData();
        $kategori = Kategori::get();
        $perusahaan = Perusahaan::get();
        // Lembaga::get();
        // return view('users', compact('users'));
        // return $sekolah;
        return view('layoutadmin.kategori.index', compact('kategori','perusahaan'));
    }
    public function create()
    {
        
        $perusahaan = Perusahaan::get();
        $nomor = Kategori::generateNumber(); // 
        $kategori = Kategori::get();
       
        // // return view('users', compact('users'));
        return view('layoutadmin.kategori.create', compact('nomor','kategori','perusahaan'));
    }

    public function store(Request $request)
    {
        $kategori = new Kategori();
        $kategori->number = $request->input('number');
        $kategori->kategori = $request->input('kategori');
        $kategori->kodeperusahaan = $request->input('kodeperusahaan');
    //  return $transaksi;
        $kategori->save();
        // return response()->json([
        //     'message' => 'Data Berhasil tersimpan',
        //     'data' => $wilayah
        // ], 201);
        return redirect()->route('kategori.index')
        // ->back()
        ->with('success', 'Data berhasil disimpan !');
    }   
    public function hapus($id)
        {
            $kategori = kategori::findOrFail($id);
            $kategori->delete();
            return response()->json(['message' => 'Data berhasil dihapus.']);
        }
      

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return response()->json([
            'kategori' => $kategori->kategori,
            'namaperusahaan' => $kategori->namaperusahaan,
        ]);
    }
    public function update(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->Kategori = $request->input('kategori');
        $kategori->kodeperusahaan = $request->input('kodeperusahaan');
        $kategori->save();
        
        return redirect()->route('kategori.index')
        // ->back()
        ->with('success', 'Data berhasil disimpan !');
    }
}
