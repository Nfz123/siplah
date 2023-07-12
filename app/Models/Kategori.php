<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';

    protected $fillable = ['number', /* ... kolom lain */];
    
    public function Perusahaan()
    {
        // return $this->belongsToMany(Wilayah::Class, 'number');
        return $this->hasOne(Perusahaan::class, 'number', 'kodeperusahaan');
    }



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
            return 'K001'; // Nomor awal jika belum ada entri
        }

        $latestNumber = substr($latestEntry->number, 1);
        $newNumber = 'K' . str_pad($latestNumber + 1, 3, '0', STR_PAD_LEFT);

        return $newNumber;
    }

    use HasFactory;
}
