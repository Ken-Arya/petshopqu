<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use App\Models\Pembelian;
use App\Models\Produk;
use App\Models\User;
use voku\helper\ASCII;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // return Pembelian::find(auth()->user()->ID_pelanggan);
        return view('keranjang', [
            // 'keranjang' => Pembelian::where('ID_pelanggan',"=", auth()->user()->ID_pelanggan),
            
            'keranjang' => $pembelian = Pembelian::where('ID_pelanggan', auth()->user()->ID_pelanggan)->get(),
            'pelanggan' => $pelanggan = Pelanggan::where('ID_pelanggan', auth()->user()->ID_pelanggan)->get(),
            'produk' => $produk = Produk::find(Pembelian::where('ID_pelanggan', auth()->user()->ID_pelanggan)->get('ID_produk')),
            // $id = Pembelian::where('ID_pelanggan', auth()->user()->ID_pelanggan)->first()->ID_pelanggan,
            // 'keranjang' => Pembelian::all(),
            // 'keranjang' => Pembelian::find($id),
            // dd($produk),
            "title" => "Keranjang",
            'produks' => Produk::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('keranjang', [
            'keranjang' => Pembelian::all(),
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
        // dd($request->all());

        $user = Pembelian::create([
            'ID_produk' => ($request->input('ID_produk')),
            'ID_pelanggan' => ($request->input('ID_pelanggan')),
            'tgl_pembelian' => (now()->toDateString()),
            'jumlah' => ($request->input('jumlah')),
            'harga' => ($request->input('harga_produk')),
            'total' => ($request->input('jumlah')*$request->input('harga_produk'))
        ]);
        return redirect('/keranjang');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $product=Produk::find($id);
        dd($product);
        $product=$product->update([
            'stock' => ($request->input('stock'))
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
