<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perusahaan;


class PerusahaanController extends Controller
{
    public function index()
    {
        $newNumber = Perusahaan::generateNumber(); // 
        $perusahaan = Perusahaan::getPerusahaanData();
        // return view('users', compact('users'));
        return view('layoutadmin.perusahaan.index', compact('perusahaan','newNumber'));
    }
    public function create(Request $request)
    {
        $newEntry = Perusahaan::create($request->all());
       
        return view('layoutadmin.perusahaan.create');
        // return response()->json($newEntry, 201);
    }
    public function simpanData(Request $request)
    {
        // Validasi data yang diterima dari request jika diperlukan
        $validatedData = $request->validate([
            'number' => 'required',
            'namaperusahaan'=>'required',
            'penanggungjawab'=>'required',
            'status' => 'required',
            // tambahkan validasi lainnya sesuai kebutuhan
        ]);

        // Simpan data ke dalam database
        $perusahaan = new Perusahaan;
        $perusahaan->number = $request->number;
        $perusahaan->namaperusahaan = $request->namaperusahaan;
        $perusahaan->penanggungjawab = $request->penanggungjawab;
        $perusahaan->status = $request->status;
        // setel properti lainnya jika ada
        $perusahaan->save();

        // Responkan data yang disimpan
        return response()->json(['message' => 'Data berhasil disimpan']);
    }
}
