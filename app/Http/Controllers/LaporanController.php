<?php

namespace App\Http\Controllers;
// use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;
// use PDF;
use App\Models\Sekolah;
use App\Models\Wilayah;
use App\Models\Kategori;
use App\Models\Transaksi;
use App\Models\TransaksiDetil;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Routing\Controller;

class LaporanController extends Controller
{
    public function laporanspo(Request $request,$id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $trans = Transaksi::with('transaksidetil')->findOrFail($id);
           return view('layoutadmin.laporan.laporanspo',compact('transaksi','trans')); 
        //    
        
    }
    public function laporanBAST(Request $request,$id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $trans = Transaksi::with('transaksidetil')->findOrFail($id);
       
           return view('layoutadmin.laporan.laporanbast',compact('transaksi','trans')); 
        
    }
    public function laporanINV(Request $request,$id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $trans = Transaksi::with('transaksidetil')->findOrFail($id);
       
           return view('layoutadmin.laporan.laporaninv',compact('transaksi','trans')); 
        
    }
    public function laporanSPK(Request $request,$id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $trans = Transaksi::with('transaksidetil')->findOrFail($id);
       
           return view('layoutadmin.laporan.laporanspk',compact('transaksi','trans')); 
        
    }
    public function editinvoice(Request $request,$id)
    {
        $transaksi = Transaksi::findOrFail($id);
       
           return view('layoutadmin.laporan.kwitansi1',compact('transaksi'));
        
    }
    public function laporaninvoice()
    {
        $totalharga=0;
        $totalModal = 0; // Initialize totalModal variable
        $transaksi= Transaksi::get();
        $total = Transaksi::sum('ttitipan');
        // $transaksicari = Transaksi::where('','like',"%".$cari."%")
		// ->paginate();
 
        // transaksi
        return view('layoutadmin.laporan.laporaninvoice',compact('transaksi','total','totalharga','totalModal'));
    }
    public function index()
    {
        
        // $wilayah = getSekolahData();
        // $wilayah = Wilayah::get();
        $transaksi = Transaksi::with('sekolah','wilayah','perusahaan1')->get();
        $trans1=Wilayah::with('sekolah1.transaksi')->get();
        // $transaksis = Transaksi::all();
        // groupby('kodewilayah');
        // $transaksi = Transaksi::groupBy('role','kodewilayah');
        // $users = User::where('status', 'active')
        //      ->where('role', 'admin')
        //      ->get();
        // // Lembaga::get();
        // // return view('users', compact('users'));
        
        // return $transaksis;
        return view('layoutadmin.laporan.index', compact('transaksi','trans1'));
    }
    // public function ceklaporan()
    // {
    
    //     return view('layoutadmin.laporan.laporantab',compact('transaksi'));
    //     // return response($html);
    // }
    // public function printKwitansi(Request $request)
    // {
    //     // Your HTML code for the kwitansi
    //     $html = '<div class="col-lg-12 mb-3">
    //                 <div class="card">
    //                     <div class="card-body">
    //                         <!-- Your HTML content here -->
    //                     </div>
    //                 </div>
    //             </div>';

    //     return response()->json(['html' => $html]);
    //     }
    //     public function kwitansi($id)
    //     {

    //         $transaksi = Transaksi::findOrFail($id);
    //         $pdf = PDF::loadView('layoutadmin.laporan.kwitansi1', compact('transaksi'));
    //         return $pdf->stream($transaksi->id . '.pdf');
    //     }
        // public function cetakKwitansi($id)
        // {

        //     // Mengembalikan respon dalam format JSON
        //     return response()->json(['message' => 'Kwitansi berhasil dicetak.']);
        // }
    }
   
    

