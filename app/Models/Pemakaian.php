<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemakaian extends Model
{
    use HasFactory;
    protected $table='pemakaians';
    protected $fillable=['pelanggan_id','bulan','jumlah_pakai','tahun'];
}
