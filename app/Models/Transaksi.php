<?php

namespace App\Models;

use App\Models\Sekolah;
use App\Models\Wilayah;
use App\Models\Perusahaan;
use App\Models\TransaksiDetil;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Transaksi extends Model
{
    protected $table = 'transaksi';

protected $fillable = ['autonumber', /* ... kolom lain */];

public static function generate_auto_number()
    {
        $today = now();
        $formatted_date = $today->format('Ymd');

        $lastautonumber = static::whereDate('created_at', $today)->orderByDesc('created_at')->value('autonumber');
        $nextautonumber = $lastautonumber ? ($lastautonumber + 1) : 1;

        static::create([
            'autonumber' => $nextautonumber,
        ]);

        return $formatted_date . str_pad($nextautonumber, 4, '0', STR_PAD_LEFT);
    }
 
    // use HasFactory;
    public function Perusahaan()
    {
        // return $this->belongsToMany(Wilayah::Class, 'number');
        return $this->hasOne(Perusahaan::class, 'number', 'kodeperusahaan');
    }
    // public function Wilayah()
    // {
    //     // return $this->belongsToMany(Wilayah::Class, 'number');
    //     return $this->hasOne(Wilayah::class, 'number', 'kodewilayah');
    // }
    public function Sekolah()
    {
        // return $this->belongsToMany(Wilayah::Class, 'number');
        // return $this->hasmany(Sekolah::class,'kodesekolah','number');
        return $this->hasOne(Sekolah::class, 'number', 'kodesekolah');
    }
    public function Wilayah()
    {
        // return $this->belongsToMany(Wilayah::Class, 'number');
        // return $this->hasmany(Sekolah::class,'kodesekolah','number');
        return $this->hasOne(Wilayah::class, 'number', 'kodewilayah');
    }
    public function Perusahaan1()
    {
        // return $this->belongsToMany(Wilayah::Class, 'number');
        // return $this->hasmany(Sekolah::class,'kodesekolah','number');
        return $this->hasOne(Perusahaan::class, 'number', 'kodeperusahaan');
    }

    /**
     * Get all of the comments for the Transaksi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transaksidetil()
    {
        return $this->hasMany(TransaksiDetil::class, 'autonumber_id', 'autonumber');
    }
}
