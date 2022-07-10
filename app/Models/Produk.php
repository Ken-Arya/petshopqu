<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;



class Produk extends Model
{
    use HasFactory;
    
    protected $table = 'tabel_produk';
    protected $primaryKey = 'ID_produk';
    public $timestamps = false;
    protected $fillable = ['nama_produk',
    'deskripsi_produk',
    'harga_produk',
    'slug',
    'stock',
    'gambar_produk'
    ];
}
