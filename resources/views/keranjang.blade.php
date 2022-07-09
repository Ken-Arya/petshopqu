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
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">List Data Pembelian Anda</h1>
    </div>
    {{-- TABEL --}}
    <div class="table-responsive">
        <table class="table table-hover table-bordered table-striped" style="table-layout: fixed; width: 100%;">
            <thead>
                <tr>
                    <th scope="col" style="width: 5%">
                        ID</th>
                    <th scope="col" style="width: 15%">Produk</th>
                    {{-- <th scope="col" style="width: 15%">Gambar</th> --}}
                    <th scope="col" style="width: 25%">Nama</th>
                    <th scope="col" style="width: 20%">Tanggal</th>
                    <th scope="col" style="width: 5%">Jumlah</th>
                    <th scope="col" style="width: 10%">Harga</th>
                    <th scope="col" style="width: 10%">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($keranjang as $purchase)
                    @foreach ($pelanggan as $member)
                        {{-- @foreach ($produk as $product) --}}
                        <tr>
                            <th scope="row">{{ $purchase->ID_pembelian }}</th>
                            <td>{{ $purchase->ID_produk }}</td>
                            <td>{{ $member->nama_pelanggan }}</td>
                            <td>{{ $purchase->tgl_pembelian }}</td>
                            <td>{{ $purchase->jumlah }}</td>
                            <td>{{ $purchase->harga }}</td>
                            <td>{{ $purchase->total }}</td>
                        </tr>
                        {{-- @endforeach --}}
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
    <hr>
    <hr>

    {{-- <div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="checkoutModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapusModalLongTitle">Hapus data produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin ingin memesan produk tersebut?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <form action="/keranjang/" method="post" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-primary">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

    <main>
        <div class="text-center">
            <h2>Checkout form</h2>
            <p class="lead">Silahkan isi data pembelian dibawah ini saat anda ingin membeli produk.
            </p>
        </div>
        <form action="/keranjang" method="post">
            @csrf
            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-primary">Pilih salah satu</span>
                        <span class="badge bg-primary rounded-pill">Keranjang</span>
                    </h4>
                    <ul class="list-group mb-3">
                        @foreach ($produks as $products)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="ID_produk"
                                    id="{{ $products->ID_produk }}" value="{{ $products->ID_produk }}" required>
                                <li class="list-group-item d-flex justify-content-between lh-sm">
                                    <div class="box">
                                        <h6 class="my-0">{{ $products->nama_produk }}</h6>
                                        <span class="text-muted">Rp.<input style="border:none" class="text" type="text"
                                                name="harga_produk" id="harga_produk"
                                                value="{{ $products->harga_produk }}" readonly>
                                        </span>
                                        <br>
                                        <small class="text-muted">
                                            Stock: {{ $products->stock }}
                                        </small>
                                    </div>
                                </li>
                            </div>
                        @endforeach
                    </ul>
                    <div class="card p-2">
                        <div class="input-group">
                            <input type="text" class="form-control" name="jumlah" id="jumlah" required>
                            <button class="btn btn-secondary"disabled>Jumlah yang ingin dibeli</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Detail</h4>
                    <div>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="ID_pelanggan" class="form-label">ID</label>
                                <input type="text" class="form-control" id="ID_pelanggan" placeholder=""
                                    value="{{ auth()->user()->ID_pelanggan }}" name="ID_pelanggan" required readonly>
                            </div>

                            <div class="col-sm-6">
                                <label for="nama_pelanggan" class="form-label"> Atas Nama</label>
                                <input type="text" class="form-control" id="nama_pelanggan" placeholder=""
                                    value="{{ auth()->user()->nama_pelanggan }}" name="nama_pelanggan" required readonly>
                            </div>

                            <div class="col-12">
                                <label for="alamat_pelanggan" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat_pelanggan" name="alamat_pelanggan"
                                    value="{{ auth()->user()->alamat_pelanggan }}" required readonly>
                            </div>

                            <div class="col-12">
                                <label for="no_hp" class="form-label">No. HP<span
                                        class="text-muted">(Optional)</span></label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp"
                                    value="{{ auth()->user()->no_hp }}" required readonly>
                            </div>
                            <hr class="my-4">
                            {{-- <a href="" target="_blank" class="button btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#checkoutModal" data-bs-whatever="@getbootstrap">
                            Checkout
                        </a> --}}
                        </div>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Checkout</button>
                </div>
            </div>
        </form>
    </main>
@endsection
