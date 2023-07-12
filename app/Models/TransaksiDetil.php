<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiDetil extends Model
{
    protected $table = 'transaksi_detil';

    protected $fillable = ['transaksi_id', /* ... kolom lain */];

    use HasFactory;
}
