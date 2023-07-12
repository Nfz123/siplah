<?php

namespace App\Models;

use App\Models\Sekolah;
use App\Models\Wilayah;
use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sekolah extends Model
{
    protected $table = 'sekolah';


    
    public function Wilayah()
    {
        // return $this->belongsToMany(Wilayah::Class, 'number');
        return $this->hasOne(Wilayah::class, 'number', 'kodewilayah');
    }
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
            return 'S001'; // Nomor awal jika belum ada entri
        }

        $latestNumber = substr($latestEntry->number, 1);
        $newNumber = 'S' . str_pad($latestNumber + 1, 3, '0', STR_PAD_LEFT);

        return $newNumber;
    }
    // public static function getSekolahData()
    // {
    //     return Sekolah::with('Wilayah') // Ganti 'relationName' dengan nama relasi yang sesuai pada model School
    //     ->select('number', 'namasekolah', 'namawilayah')
    //     ->get(); 
    //     // return self::select('number', 'namasekolah', 'wilayah')->get();
    // }
    use HasFactory;
    // public function Transaksi()
    // {
    //     // return $this->belongsToMany(Wilayah::Class, 'number');
    //     return $this->belongsTo(Transaksi::class, 'kodesekolah', 'number');
    // }

    
    public function transaksi()
    {
        return $this->hasOne(Transaksi::class, 'kodesekolah', 'number');
    }

}
