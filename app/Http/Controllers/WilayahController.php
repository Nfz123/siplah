<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Http\Request;
use App\Models\Wilayah;


class WilayahController extends Controller
{
    public function index()
    {
        $wilayah = Wilayah::getWilayahData();
        // return view('users', compact('users'));
        return view('layoutadmin.wilayah.index', compact('wilayah'));
    }
    public function create()
    {
        $nomor = Wilayah::generateNumber(); // 
        // return view('users', compact('users'));
        return view('layoutadmin.wilayah.create', compact('nomor'));
    }
    public function store(Request $request)
    {
        $wilayah = new Wilayah();
        $wilayah->number = $request->input('number');
        $wilayah->namawilayah = $request->input('namawilayah');
       
        $wilayah->save();
        // return response()->json([
        //     'message' => 'Data Berhasil tersimpan',
        //     'data' => $wilayah
        // ], 201);
        return redirect()->route('wilayah.index')
        // ->back()
        ->with('success', 'Data berhasil disimpan !');
    }   
    public function destroy($id)
    {
        // Cari data berdasarkan ID
        $wilayah = Wilayah::find($id);
    
        // Periksa apakah data ditemukan
        if (!$wilayah) {
            return response()->json(['message' => 'Data not found'], 404);
        }
    
        // Hapus data
        $wilayah->delete();
    
        return response()->json(['message' => 'Data deleted'], 200);
    }
    
}
