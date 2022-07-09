@extends('admin.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">List Data Pembelian</h1>
    </div>
    {{-- TABEL --}}
    <div class="table-responsive">
        <table class="table table-hover table-bordered table-striped" style="table-layout: fixed; width: 100%;">
            <thead>
                <tr>
                    <th scope="col" style="width: 5%">
                        ID</th>
                    <th scope="col" style="width: 20%">Produk</th>
                    {{-- <th scope="col" style="width: 15%">Gambar</th> --}}
                    <th scope="col" style="width: 20%">Pelanggan</th>
                    <th scope="col" style="width: 20%">Tanggal</th>
                    <th scope="col" style="width: 5%">Jumlah</th>
                    <th scope="col" style="width: 15%">Harga</th>
                    <th scope="col" style="width: 15%">Total</th>
                    {{-- <th scope="col" style="width: 10%">Action</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($pembelian as $purchase)
                    <tr>
                        <th scope="row">{{ $purchase->ID_pembelian }}</th>
                        <td>{{ $purchase->ID_produk }}</td>
                        {{-- <td>{{ $purchase->gambar_produk}}</td> --}}
                        <td>{{ $purchase->ID_pelanggan }}</td>
                        <td>{{ $purchase->tgl_pembelian }}</td>
                        <td>{{ $purchase->jumlah }}</td>
                        <td>{{ $purchase->harga }}</td>
                        <td>{{ $purchase->total }}</td>
                        {{-- <td>
                            <center>
                                <a href="" target="_blank" class="badge bg-primary" data-bs-toggle="modal"
                                    data-bs-target="#editModal{{ $purchase->ID_pembelian }}"
                                    data-bs-whatever="@getbootstrap">
                                    <span data-feather="eye">
                                    </span>
                                </a>
                            </center>
                        </td> --}}
                        {{-- //KALAU RELASI --}}
                        {{-- <td>{{ $product->table relasu->slug }}</td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- MODAL EDIT --}}
    @foreach ($pembelian as $purchase)
        <div class="modal fade" id="editModal{{ $purchase->ID_pembelian }}" tabindex="-1"
            aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="/admin/data-produk/{{ $purchase->ID_pembelian }}" method="POST" class="d-inline"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="eeditModalLabel">Lihat data pembelian</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="ID_produk" class="col-form-label">ID: </label>
                                <input type="text" class="form-control" name="ID_produk" id="ID_produk"
                                    value="{{ $purchase->ID_produk }}">
                            </div>
                            <div class="mb-3">
                                <label for="nama_produk" class="col-form-label">Nama: </label>
                                <input type="text" class="form-control" name="nama_produk" id="nama_produk"
                                    value="{{ $purchase->ID_pembelian }}">
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi_produk" class="col-form-label">Deskripsi:</label>
                                <textarea class="form-control" name="deskripsi_produk" id="deskripsi_produk" rows="10">
                                    {{ $purchase->ID_produk }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="harga_produk" class="col-form-label">Harga: </label>
                                <input type="text" class="form-control" name="harga_produk" id="harga_produk"
                                    value="{{ $purchase->ID_pelanggan }}">
                            </div>
                            <div class="mb-3">
                                <label for="slug" class="col-form-label">Slug: </label>
                                <input type="text" class="form-control" name="slug" id="slug"
                                    value="{{ $purchase->tgl_pembelian }}">
                            </div>
                            <div class="mb-3">
                                <label for="stock" class="col-form-label">Stock: </label>
                                <input type="text" class="form-control" name="stock" id="stock"
                                    value="{{ $purchase->jumlah }}">
                            </div>
                            <div class="mb-3">
                                <label for="stock" class="col-form-label">Stock: </label>
                                <input type="text" class="form-control" name="stock" id="stock"
                                    value="{{ $purchase->harga }}">
                            </div>
                            <div class="mb-3">
                                <label for="stock" class="col-form-label">Stock: </label>
                                <input type="text" class="form-control" name="stock" id="stock"
                                    value="{{ $purchase->total }}">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
