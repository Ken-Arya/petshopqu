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
            'nama_produk' => 'required',
            'deskripsi_produk' => 'required',
            'harga_produk' => 'required',
            'slug' => 'required',
            'stock' => 'required',
            'gambar_produk' => 'required'
        ]);
        $image = base64_encode(file_get_contents($request->file('gambar_produk')));
        // dd($request->all());
        // $produk = Produk::create([
        //     'nama_produk' => ($request->input('nama_produk')),
        //     'deskripsi_produk' => ($request->input('deskripsi_produk')),
        //     'harga_produk' => ($request->input('harga_produk')),
        //     'slug' => ($request->input('slug')),
        //     'stock' => ($request->input('stock'))
        // ]);
        // Produk::create($validatedData);
        Produk::create([
            'nama_produk' => ($request->input('nama_produk')),
            'deskripsi_produk' => ($request->input('deskripsi_produk')),
            'harga_produk' => ($request->input('harga_produk')),
            'slug' => ($request->input('slug')),
            'stock' => ($request->input('stock')),
            'gambar_produk' => ($image)
        ]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $productID)
    {
        $validatedData = $request->validate([
            'nama_produk' => ['required'],
            'deskripsi_produk' => ['required'],
            'harga_produk' => ['required'],
            'slug' => ['required'],
            'stock' => ['required'],
            'gambar_produk' => ['required']
        ]);
        $image = base64_encode(file_get_contents($request->file('gambar_produk')));
        // Produk::where('ID_produk', $productID->ID_produk)
                // ->update($validatedData);   
        $product=Produk::find($productID);
        $product=$product->update([
            'nama_produk' => ($request->input('nama_produk')),
            'deskripsi_produk' => ($request->input('deskripsi_produk')),
            'harga_produk' => ($request->input('harga_produk')),
            'slug' => ($request->input('slug')),
            'stock' => ($request->input('stock')),
            'gambar_produk' => ($image)
        ]);
        // dd($request->slug);      
        // dd($validatedData);
        return back()->with('berhasilEdit', 'Data produk berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy($product)
    {
        $product = Produk::find($product);
        $product->delete();
        return back()->with('berhasilHapus', 'Data produk berhasil dihapus');
    }
}
