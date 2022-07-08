<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
     
    protected $table = 'tabel_pelanggan';
    protected $primaryKey = 'ID_pelanggan';
    protected $guarded = 'ID_pelanggan';
    public $timestamps = false;
    protected $fillable = ['nama_produk',
    'deskripsi_produk',
    'harga_produk',
    'slug',
    'stock'
    ];
    
}
