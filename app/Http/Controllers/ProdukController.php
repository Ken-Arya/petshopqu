<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function produk()
    {
        return view('produks', [
            "title" => "Produk",
            "produk" => Produk::all()
        ]);
    }

    public function produkshow(Produk $post)
    {
        return view('produk', [
            "title" => $post->nama_produk,
            // "product" => $post
        ]);
    }
}
