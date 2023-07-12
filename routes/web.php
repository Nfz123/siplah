<?php
use Barryvdh\DomPDF\Facade as PDF;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Authentication Routes


  
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
  
Route::get('/', function () {
    return view('index');
});
  
Auth::routes();
  
Route::get('/home', [HomeController::class, 'index'])->name('home');
  
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::get('/menusiplah', function () {
        return view('layouts.mainmenu');
    });
                 
    Route::get('laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('laporantab', [LaporanController::class, 'ceklaporan'])->name('laporan.ceklaporan');
    
    Route::get('print-kwitansi/{id}', [LaporanController::class, 'printKwitansi'])->name('laporan.printKwitansi');
    Route::post('/print-kwitansi', [LaporanController::class, 'printKwitansi'])->name('laporan.kwitansi');

    // Route::post('/update-margin', 'TransaksiController@updateMargin');
    Route::post('/update-margin', [LaporanController::class, 'updateMargin'])->name('laporan.updateMargin');
    // Route::get('/print-kwitansi', 'PrintController@printKwitansi')->name('print.kwitansi');
    Route::get('/cetak-kwitansi/{id}', [LaporanController::class, 'cetakKwitansi'])->name('laporan.cetakKwitansi');
    Route::get('/cetak-pdf/{id}', function ($id) {
        // Mendapatkan data untuk PDF
   
        // Render view ke dalam string HTML
        $transaksi = Transaksi::findOrFail($id);
        return view('layoutadmin.laporan.kwitansi1', compact('transaksi'))->render();
        // $html = view('pdf.template', compact('data'))
        
        // Membuat objek Dompdf
        $dompdf = new Dompdf();
        
        // Mengirimkan HTML ke Dompdf
        $dompdf->loadHtml($html);
        
        // Render PDF
        $dompdf->render();
        
        // Mengirimkan respons dengan file PDF
        return $dompdf->stream('cetak.pdf');
    });

    
    Route::get('/dashobardlayout', function () {
        return view('layouts.mainmenu');
    });
    Route::get('/dashobardlayoutawal', function () {
        return view('layouts.head');
    });
    
    Route::get('tabeldinamis', [TransaksiController::class, 'tabeldinamis'])->name('transaksi.tabeldinamis');
    Route::get('transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::post('transaksi', [TransaksiController::class, 'simpan'])->name('transaksi.simpan');
   
    Route::get('createtransaksipt1', [TransaksiController::class, 'createSNI'])->name('transaksi.createSNI');
    Route::get('invoice', [TransaksiController::class, 'invoice'])->name('transaksi.invoice');
    Route::post('invoice', [TransaksiController::class, 'store'])->name('transaksi.store');
    Route::get('pilih', [TransaksiController::class, 'pilih'])->name('transaksi.pilih');
    Route::get('/invoice/edit/{id}',[TransaksiController::class, 'edit'])->name('transaksi.edit');
    Route::put('/invoice/update/{id}', [TransaksiController::class, 'update'])->name('transaksi.update');
  

    
    Route::get('editinvoice/{id}', [LaporanController::class, 'editinvoice'])->name('laporan.editinvoice');
    Route::get('laporaninvoice', [LaporanController::class, 'laporaninvoice'])->name('laporan.laporaninvoice');
    Route::get('laporanspo/{id}', [LaporanController::class, 'laporanspo'])->name('laporan.laporanspo');
    Route::get('laporanbast/{id}', [LaporanController::class, 'laporanbast'])->name('laporan.laporanbast');
    Route::get('laporanspk/{id}', [LaporanController::class, 'laporanspk'])->name('laporan.laporanspk');
    Route::get('laporaninv/{id}', [LaporanController::class, 'laporaninv'])->name('laporan.laporaninv');
    
    
    
    
    Route::get('kategori', [kategoriController::class, 'index'])->name('kategori.index');
    Route::get('kategoricreate', [kategoriController::class, 'create'])->name('kategori.create');
    Route::post('kategori', [kategoriController::class, 'store'])->name('kategori.store');
    Route::delete('/data/hapus/{id}',[kategoriController::class, 'hapus'])->name('kategori.hapus');
    Route::get('/kategori/edit/{id}',[kategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('/data/update/{id}', [kategoriController::class, 'update'])->name('kategori.update');
    
    
    Route::get('sekolah', [SekolahController::class, 'index'])->name('sekolah.index');
    Route::get('sekolahbaru', [SekolahController::class, 'create'])->name('sekolah.create');
    Route::post('sekolahsim', [SekolahController::class, 'store'])->name('sekolah.store');
    Route::delete('/sekolah/hapus/{id}',[SekolahController::class, 'hapus'])->name('sekolah.hapus');
    Route::get('/sekolah/edit/{id}',[SekolahController::class, 'edit'])->name('sekolah.edit');
    Route::put('/sekolah/update/{id}', [SekolahController::class, 'update'])->name('sekolah.update');
    
    Route::get('perusahaan', [PerusahaanController::class, 'index'])->name('perusahaan.index');
    Route::get('perusahaancreate', [PerusahaanController::class, 'create'])->name('perusahaan.create');
    Route::put('simpanData', [PerusahaanController::class, 'simpanData'])->name('perusahaan.simpanData');
    
    Route::get('wilayah', [WilayahController::class, 'index'])->name('wilayah.index');
    Route::get('wilayahbaru', [WilayahController::class, 'create'])->name('wilayah.create');
    Route::post('wilayahsim', [WilayahController::class, 'store'])->name('wilayah.store');
    // Route::get('wilayah/{id}', [WilayahC ontroller::class, 'destroy'])->name('wilayah.destroy');
    // Route::delete('wilayah/{id}', [WilayahController::class, 'delete'])->name('wilayah.delete');
    // Route::get('wilayah/{id}', function (){return abort(404);});
    // Route::delete('wilayah/{number}', [WilayahController::class, 'destroy']);
    Route::delete('/{wilayah}', [WilayahController::class, 'destroy'])->name('wilayah.destroy');
    Route::get('/generate-pdf', function() {
        $pdf = PDF::loadView('pdf.example');
        return $pdf->stream('gambar.pdf');
    });
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
        
    
    Route::middleware(['auth', 'role:admin'])->group(function () {
        
    
        // Route::group(['prefix' => 'wilayah'], function () {
        //     Route::get('/', [WilayahController::class, 'index'])->name('wilayah.index');
        //     Route::get('/wilayahcreate', [WilayahController::class, 'create'])->name('wilayah.create');
        //     // Route::post('/create', [PostsController::class, 'store'])->name('posts.store');
        //     // Route::get('/{post}/show', [PostsController::class, 'show'])->name('posts.show');
        //     // Route::get('/{post}/edit', [PostsController::class, 'edit'])->name('posts.edit');
        //     // Route::patch('/{post}/update', [PostsController::class, 'update'])->name('posts.update');
        //     // Route::delete('/{post}/delete', [PostsController::class, 'destroy'])->name('posts.destroy');
        // });
    
    
       

    // Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
});
});
    
    // Route::get('/', function () {
    //     return view('');
    // });
   
