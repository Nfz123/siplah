<?php

namespace App\Http\Controllers;
use terbilang;
use DataTables;
use Carbon\Carbon;
use Dompdf\Dompdf;
use App\Models\Sekolah;
use App\Models\Wilayah;
use App\Models\Kategori;
use App\Models\Transaksi;
use App\Models\AutoNumber;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\TransaksiDetil;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class TransaksiController extends Controller
{
    public function generateAutoNumber()
    {
        // Cek apakah session nomor otomatis sudah ada
        if (!Session::has('autonumber')) {
            // Jika belum ada, inisialisasi dengan nilai awal
            Session::put('autonumber', 1);
        }

        // Dapatkan nomor otomatis dari session
        $autonumber = Session::get('autonumber');

        // Simpan nomor otomatis yang baru ke dalam session
        Session::put('autonumber', $autonumber + 1);

        // Kembalikan nomor otomatis
        return $autonumber;
    }
    public function index()
    {
        $transaksi = Transaksi::get();
        // $perusahaan = Perusahaan::getPerusahaanData();
        // // return view('users', compact('users'));
        return view('layoutadmin.transaksi.index', compact('transaksi'));
    }
    public function tabeldinamis()
    {
        // $transaksi = Transaksi::get();
        // $perusahaan = Perusahaan::getPerusahaanData();
        // // return view('users', compact('users'));
        return view('layoutadmin.transaksi.tabeldinamis');
    }

    public function createSNI(Request $request)
    {
        // return Transaksi::with('transaksidetil')->get();
        $jenis = 'SNI';
        $sekolah = Sekolah::get();
        $perusahaan = Perusahaan::get();
        $kategori = Kategori::get();
        $wilayah = Wilayah::get();
        $now = Carbon::now();
        $years = $now->year;
        $table_no = Transaksi::count('autonumber');
        $gar = '-';
        $no = 'INV' . $years . $table_no;
        $auto = substr($no, 7);
        $auto = intval($auto) + 1;
        $doku = 'INV' . substr($no, 3, 4) . $gar . str_repeat('0', 5 - strlen($auto)) . $auto;
        if ($request->ajax()) {
            $data = Kategori::select('number', 'kategori', 'satuan')->get();
            // dd($data);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    // $btn = '<a href="javascript:void(0)" class="btn btn-primary btn-xs">Pilih</a>';
                    return '<button class="btnreg btn bg-gradient-info btn-sm text-sm"
                                                id="selectFamillies" data-number="' .
                        $row->number .
                        '"
                                                data-kategori="' .
                        $row->kategori .
                        '"
                        data-satuan="' .
                        $row->satuan .
                        '"
                                                data-dismiss="modal" </button> Pilih';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        // // return view('users', compact('users'));
        return view('layoutadmin.transaksi.createSNI', compact('doku', 'sekolah', 'perusahaan', 'kategori'));
    }
    public function simpanbelanja(Request $request)
    {
    }
    public function createKSS()
    {
        $jenis = 'KSS';
        $autonumber = AutoNumber::generateAutoNumber($jenis);
        // $perusahaan = Perusahaan::getPerusahaanData();
        // // return view('users', compact('users'));
        return view('layoutadmin.transaksi.createKSS', compact('autonumber'));
    }

    // public function pilih()
    // {
    //     // $newNumber = Transaksi::boot(); //
    //     $perusahaan = Perusahaan::get();
    //     // // return view('users', compact('users'));
    //     return view('layoutadmin.transaksi.pilih', compact('perusahaan'));
    // }
    public function simpan(Request $request)
    {
        try {
            // return $request->all();
            $jenis = 'KSS';
            $autonumber = AutoNumber::generateAutoNumber($jenis);
            $transaksi = new Transaksi();
            $transaksi->autonumber = $request->input('autonumber');
            $transaksi->kodesekolah = $request->input('kodesekolah');
            $transaksi->kodeperusahaan = $request->input('kodeperusahaan');
            $transaksi->pembayaran = $request->input('pembayaran');
            
            $transaksi->totalinvoice = $request->input('totalinvoice');
            $transaksi->ppn = $request->input('ppn');
            $transaksi->cashback = $request->input('cashback');
            $transaksi->biayaadmin = $request->input('biayaadmin');
            $transaksi->potongan = $request->input('potongan');
            $transaksi->ttitipan = $request->input('ttitipan');
            $transaksi->hargadasar = $request->input('hargadasar');
            $transaksi->status = $request->input('status');
            $transaksi->save();

            for ($i = 0; $i < count($request->kodekategori); $i++) {
                if (!empty($request->kodekategori[$i]) &&!empty($request->namakategori[$i]) && !empty($request->satuan[$i]) && !empty($request->qty[$i]) && !empty($request->harga[$i])) {
                    $transaksiDetil = new TransaksiDetil();
                    $transaksiDetil->autonumber_id = $request->autonumber;
                    $transaksiDetil->kodekategori = $request->kodekategori[$i];
                    $transaksiDetil->namakategori = $request->namakategori[$i];
                    $transaksiDetil->satuan = $request->satuan[$i];
                    $transaksiDetil->qty = $request->qty[$i];
                    $transaksiDetil->harga = $request->harga[$i];
                    $transaksiDetil->save();
                }
            }
            // Redirect kembali setelah simpan berhasil
           // Redirect kembali setelah simpan berhasil dengan pesan alert
        return redirect()->back()->with('success', 'Data Berhasil disimpan');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', $e->getMessage());
    }
    }

    public function invoice()
    {
        $sekolah = Sekolah::get();
        $perusahaan = Perusahaan::get();
        $kategori = Kategori::get();
        $wilayah = Wilayah::get();
        $now = Carbon::now();
        $years = $now->year;
        $table_no = Transaksi::count('autonumber');
        $gar = '-';
        $no = 'INV' . $years . $table_no;
        $auto = substr($no, 7);
        $auto = intval($auto) + 1;
        $doku = 'INV' . substr($no, 3, 4) . $gar . str_repeat('0', 5 - strlen($auto)) . $auto;

        // // return view('users', compact('users'));
        return view('layoutadmin.transaksi.invoice', compact('doku', 'sekolah', 'perusahaan', 'kategori', 'wilayah'));
    }

    public function store(Request $request)
    {
        $transaksi = new Transaksi();
        $transaksi->autonumber = $request->input('autonumber');
        $transaksi->kodesekolah = $request->input('kodesekolah');
        $transaksi->kodekategori = $request->input('kodekategori');
        $transaksi->totalinvoice = $request->input('totalinvoice');
        $transaksi->ppn = $request->input('ppn');
        $transaksi->cashback = $request->input('cashback');
        $transaksi->biayaadmin = $request->input('biayaadmin');
        $transaksi->potongan = $request->input('potongan');
        $transaksi->ttitipan = $request->input('ttitipan');
        $transaksi->hargadasar = $request->input('hargadasar');
        $transaksi->status = $request->input('status');
        $transaksi->pembayaran = $request->input('pembayaran');
        $transaksi->kodeperusahaan = $request->input('kodeperusahaan');
        $transaksi->kodewilayah = $request->input('kodewilayah');
        //  return $transaksi;
        $transaksi->save();
        // return response()->json([
        //     'message' => 'Data Berhasil tersimpan',
        //     'data' => $wilayah
        // ], 201);
        return redirect()
            ->route('transaksi.index')
            // ->back()
            ->with('success', 'Data berhasil disimpan !');
    }
    // public function updateHargadasar(Request $request, $id)
    // {
    //     $transaksi = Transaksi::find($id);
    //     $transaksi->hargadasar = $request->input('hargadasar');
    //     $transaksi->save();

    //     return response()->json(['success' => true]);
    // }
    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return response()->json([
            'hargadasar' => $transaksi->hargadasar,
        ]);
    }
    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->hargadasar = $request->input('hargadasar');
        $transaksi->save();

        return redirect()
            ->route('laporan.laporaninvoice')
            // ->back()
            ->with('success', 'Data berhasil disimpan !');
    }

    // public function previewPDF($id)
    //     {
    //         $transaksi = Transaksi::findOrFail($id);
    //         $dompdf = new Dompdf();
    //         $html = view('layoutadmin.laporan.kwitansi1', compact('transaksi'))->render();
    //         $dompdf->loadHtml($html);
    //         $dompdf->render();
    //         return $dompdf->stream('cetak.pdf');
    //     }
}
