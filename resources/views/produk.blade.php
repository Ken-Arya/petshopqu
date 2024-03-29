@extends('layouts.main')

@section('container')
    <style>
        .center-screen {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 75vh;
        }
    </style>

    <div class="container">
        <div class="center-screen">
            <div class="row">
                <div class="col">
                    <img src="data:image/jpg;charset=utf8;base64,{{ $product->gambar_produk }}" width=100% height=100%>
                    <a href="/produk">Kembali ke menu produk </a>
                </div>
                <div class="col align-self-center">
                    <article class="mb-5">
                        <h2>
                            {{ $product->nama_produk }}
                            <br>
                            <br>
                        </h2>
                        <h5>{{ $product['ex'] }}</h5>
                        {!! $product->deskripsi_produk !!}
                        <h2>
                            Stock:
                            {{ $product->stock }}
                            <br>
                            <br>
                        </h2>

                        <div class="col">
                            <a href="/keranjang">
                                <button type="button" class="btn btn-primary" value="{{ $product->ID_produk }}">Tambahkan
                                    ke
                                    keranjang</button>
                            </a>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
@endsection
