<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    protected $table = 'wilayah';
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
        return 'W001'; // Nomor awal jika belum ada entri
    }

    $latestNumber = substr($latestEntry->number, 1);
    $newNumber = 'W' . str_pad($latestNumber + 1, 3, '0', STR_PAD_LEFT);

    return $newNumber;
}
    public static function getWilayahData()
{
    return self::select('number', 'namawilayah')->get();
}
    public function Sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'kodewilayah', 'number');
    }

    public function sekolah1()
    {
        return $this->hasMany(Sekolah::class, 'kodewilayah', 'number');
    }
  
}
