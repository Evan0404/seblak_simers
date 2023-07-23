<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemasukan_lain extends Model
{
    use HasFactory;
    protected $fillable=['nama_pemasukan', 'keterangan_pemasukan', 'pemasukan'];
}
