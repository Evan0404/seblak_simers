<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kasir extends Model
{
    use HasFactory;
    protected $fillable = ['nota', 'nama_menu', 'harga', 'jumlah', 'total', 'status'];
}
