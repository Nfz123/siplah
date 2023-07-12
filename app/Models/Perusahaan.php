<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    protected $table = 'perusahaan';
    protected $fillable = ['number', /* ... kolom lain */];

public static function boot()
{
    parent::boot();

    static::creating(function ($model) {
        $model->number = static::generateNumber();
    });
}

public static function generateNumber()
{
   
    $latestEntry = static::latest()->first();

    if (!$latestEntry) {
        return 'P001'; // Nomor awal jika belum ada entri
    }

    $latestNumber = substr($latestEntry->number, 1);
    $newNumber = 'P' . str_pad($latestNumber + 1, 3, '0', STR_PAD_LEFT);

    return $newNumber;
}
    public static function getPerusahaanData()
    {
        return self::select('number', 'namaperusahaan', 'penanggungjawab', 'status')->get();
    }
    public function Kategori()
    {
        // return $this->belongsToMany(Wilayah::Class, 'number');
        return $this->belongsTo(Kategori::class, 'number', 'Kodeperusahaan');
    }
    // public function Transaksi()
    // {
    //     // return $this->belongsToMany(Wilayah::Class, 'number');
    //     return $this->belongsTo(Transaksi::class, 'number', 'Kodeperusahaan');
    // }
    
}
