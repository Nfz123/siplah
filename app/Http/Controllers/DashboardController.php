<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wilayah;

class DashboardController extends Controller
{
    public function dashboardlayout()
    {
        // $wil = Wilayah::select('id')->count();
        // dd($wil);
        // $pen = KartuKeluargaAnggota::select('id')->count();
    return view('layouts.head');
    }
}
