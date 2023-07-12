<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutoNumber extends Model
{
    use HasFactory;
    
    public static function generateAutoNumber($jenis)
    {
        $tanggal = now()->format('Y-m-d');
        $autoNumber = static::where('jenis', $jenis)->where('tanggal', $tanggal)->first();

        if (!$autoNumber) {
            $autoNumber = new static;
            $autoNumber->jenis = $jenis;
            $autoNumber->tanggal = $tanggal;
        }

        $nomor = $autoNumber->nomor;
        $autoNumber->nomor = $nomor + 1;
        $autoNumber->save();

        return $jenis . $tanggal . str_pad($nomor, 4, '0', STR_PAD_LEFT);
    }
}
