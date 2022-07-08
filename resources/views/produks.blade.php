@extends('layouts.main')

@section('container')
    {{-- @foreach ($tulisan as $product)
        <article class="mb-5">
            <h2>
                <a href="/blog/{{ $product->slug }}">
                    {{ $product->title }}
                </a>
            </h2>
            <h5>{{ $product->penulis }}</h5>
            <p>{{ $product->excerpt }}</p>
        </article>
    @endforeach --}}

    <div class="row py-lg-2 text-center">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-bold">Produk</h1>
            <p class="lead text-muted">Berikut merupakan produk-produk yang sedang tersedia pada
                Toko Petshopqu</p>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($produk as $product)
            <div class="col">
                <div class="card h-100">
                    <img src="data:image/jpg;charset=utf8;base64,{{ $product->gambar_produk }}" width=100% height=100%
                        class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Rp. {{ $product->harga_produk }}</h5>
                        <p class="card-text">{{ $product->nama_produk }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="/produk/{{ $product->slug }}">
                            <button type="button" class="btn btn-primary">Beli</button>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
