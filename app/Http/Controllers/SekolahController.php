<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sekolah;
use App\Models\Wilayah;

class SekolahController extends Controller
{
    public function index()
    {
        // $sekolah = getSekolahData();
        $sekolah = Sekolah::get();
        $wilayah = Wilayah::get();
        // Lembaga::get();
        // return view('users', compact('users'));
        // return $sekolah;
        return view('layoutadmin.sekolah.index', compact('sekolah','wilayah'));
    }
    public function create()
    {
        $nomor = Sekolah::generateNumber(); // 
        $wilayah = Wilayah::get();
        // return view('users', compact('users'));
        return view('layoutadmin.sekolah.create', compact('nomor','wilayah'));
    }
    public function store(Request $request)
    {
        $sekolah = new Sekolah();
        $sekolah->number = $request->input('number');
        $sekolah->namasekolah = $request->input('namasekolah');
        $sekolah->kodewilayah = $request->input('kodewilayah');
       
        $sekolah->save();
        // return response()->json([
        //     'message' => 'Data Berhasil tersimpan',
        //     'data' => $wilayah
        // ], 201);
        return redirect()->route('sekolah.index')
        // ->back()
        ->with('success', 'Data berhasil disimpan !');
    }   
    public function hapus($id)
        {
            $sekolah = Sekolah::findOrFail($id);
            $sekolah->delete();
            return response()->json(['message' => 'Data berhasil dihapus.']);
        }
      

    public function edit($id)
    {
        $sekolah = Sekolah::findOrFail($id);
        return response()->json([
            'namasekolah' => $sekolah->namasekolah,
            'namawilayah' => $sekolah->namawilayah,
        ]);
    }
    public function update(Request $request, $id)
    {
        $sekolah = Sekolah::findOrFail($id);
        $sekolah->namasekolah = $request->input('namasekolah');
        $sekolah->kodewilayah = $request->input('kodewilayah');
        $sekolah->save();
        
        return redirect()->route('sekolah.index')
        // ->back()
        ->with('success', 'Data berhasil disimpan !');
    }
}
