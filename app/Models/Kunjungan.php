<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    protected $fillable = ['nama_pengunjung', 'tanggal_kunjungan', 'keperluan'];
}   

