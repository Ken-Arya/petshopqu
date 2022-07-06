@extends('admin.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Produk</h1>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-bordered table-striped"
            style="table-layout: fixed; width: 90%;margin-left:auto;margin-right:auto;">
            <thead>
                <tr>
                    <th scope="col" style="width: 5%">
                        ID</th>
                    <th scope="col" style="width: 20%">Nama</th>
                    {{-- <th scope="col" style="width: 15%">Gambar</th> --}}
                    <th scope="col" style="width: 20%">Deskripsi</th>
                    <th scope="col" style="width: 10%">Harga</th>
                    <th scope="col" style="width: 5%">Stock</th>
                    <th scope="col" style="width: 10%">Slug</th>
                    <th scope="col" style="width: 20%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produk as $product)
                    <tr>
                        <th scope="row">{{ $product->ID_produk }}</th>
                        <td>{{ $product->nama_produk }}</td>
                        {{-- <td>{{ $product->gambar_produk}}</td> --}}
                        <td>{{ $product->deskripsi_produk }}</td>
                        <td>{{ $product->harga_produk }}</td>
                        <td>
                            <center>{{ $product->stock }}</center>
                        </td>
                        <td>{{ $product->slug }}</td>
                        <td>
                            <center>
                                <a href="/produk/{{ $product->slug }}" target="_blank" class="badge bg-info">
                                    <span data-feather="eye">
                                    </span>
                                </a>
                                <a href="" target="_blank" class="badge bg-warning">
                                    <span data-feather="edit">
                                    </span>
                                </a>
                                <a href="" target="_blank" class="badge bg-danger">
                                    <span data-feather="trash-2">
                                    </span>
                                </a>
                            </center>
                        </td>
                        {{-- //KALAU RELASI --}}
                        {{-- <td>{{ $product->table relasu->slug }}</td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
