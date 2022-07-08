<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class AdminProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //UNTUK NANTI PAS KERANJANG
        // return Produk::where('id_pelanggan', auth()->user()->id_pelanggan)->get();
        return view('admin.produk.index', [
            'produk' => Produk::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.produk.index', [
            'produk' => Produk::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_produk' => ['required'],
            'deskripsi_produk' => ['required'],
            'harga_produk' => ['required'],
            'slug' => ['required'],
            'stock' => ['required']
        ]);
        
        // dd($request->all());
        // $produk = Produk::create([
        //     'nama_produk' => ($request->input('nama_produk')),
        //     'deskripsi_produk' => ($request->input('deskripsi_produk')),
        //     'harga_produk' => ($request->input('harga_produk')),
        //     'slug' => ($request->input('slug')),
        //     'stock' => ($request->input('stock'))
        // ]);
        Produk::create($validatedData);
        return back()->with('berhasilTambah', 'Data produk berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        return view('admin.produk.index', [
            'produk' => Produk::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $product)
    {
        // dd($produk->all());
        // Produk::destroy($product->ID_produk);
        // return back()->with('berhasilHapus', 'Data produk berhasil dihapus');
        return view('admin.index', [
            "title" => "Admin Dashboard"
        ]);
    }
}
