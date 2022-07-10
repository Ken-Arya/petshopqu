<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;
    protected $table = 'tabel_pembelian';
    protected $primaryKey = 'ID_pembelian';
    protected $guarded = 'ID_pembelian';
    public $timestamps = false;
    protected $fillable = [
    'ID_produk',
    'ID_pelanggan',
    'tgl_pembelian',
    'jumlah',
    'harga',
    'total'
    ];
    
}
