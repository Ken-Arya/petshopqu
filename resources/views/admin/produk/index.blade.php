@extends('admin.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">List Data Produk</h1>
    </div>

    @if (session()->has('berhasilTambah'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('berhasilTambah') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('berhasilEdit'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('berhasilEdit') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('berhasilHapus'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('berhasilHapus') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    {{-- TABEL --}}
    <div class="table-responsive">
        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#tambahModal"
            data-bs-whatever="@getbootstrap">Tambah data produk</button>
        <br><br>
        <table class="table table-hover table-bordered table-striped" style="table-layout: fixed; width: 100%;">
            <thead>
                <tr>
                    <th scope="col" style="width: 5%">
                        ID</th>
                    <th scope="col" style="width: 20%">Nama</th>
                    {{-- <th scope="col" style="width: 15%">Gambar</th> --}}
                    <th scope="col" style="width: 20%">Deskripsi</th>
                    <th scope="col" style="width: 5%">Harga</th>
                    <th scope="col" style="width: 5%">Stock</th>
                    <th scope="col" style="width: 15%">Slug</th>
                    <th scope="col" style="width: 20%">Gambar</th>
                    <th scope="col" style="width: 10%">Action</th>
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
                        <td><img src="data:image/jpg;charset=utf8;base64,{{ $product->gambar_produk }}" width=100%
                                height=100%></td>
                        <td>
                            <center>
                                <a href="/produk/{{ $product->slug }}" target="_blank" class="badge bg-info">
                                    <span data-feather="eye">
                                    </span>
                                </a>
                                <a href="" target="_blank" class="badge bg-warning" data-bs-toggle="modal"
                                    data-bs-target="#editModal{{ $product->ID_produk }}"
                                    data-bs-whatever="@getbootstrap">
                                    <span data-feather="edit">
                                    </span>
                                </a>
                                {{-- <a>
                                    <form action="/admin/data-produk" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="badge bg-danger border-0">
                                            <span data-feather="trash-2">
                                            </span>
                                        </button>
                                    </form>
                                </a> --}}
                                <a href="" target="_blank" class="badge bg-danger" data-bs-toggle="modal"
                                    data-bs-target="#hapusModal{{ $product->ID_produk }}"
                                    data-bs-whatever="@getbootstrap">
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

    {{-- MODAL TAMBAH --}}
    <form action="/admin/data-produk" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahModalLabel">Tambah data produk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nama_produk" class="col-form-label">Nama: </label>
                            <input type="text" class="form-control" name="nama_produk" id="nama_produk">
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi_produk" class="col-form-label">Deskripsi:</label>
                            <textarea class="form-control" name="deskripsi_produk" id="deskripsi_produk" rows="10"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="harga_produk" class="col-form-label">Harga: </label>
                            <input type="text" class="form-control" name="harga_produk" id="harga_produk">
                        </div>
                        <div class="mb-3">
                            <label for="slug" class="col-form-label">Slug: </label>
                            <input type="text" class="form-control" name="slug" id="slug">
                        </div>
                        <div class="mb-3">
                            <label for="stock" class="col-form-label">Stock: </label>
                            <input type="text" class="form-control" name="stock" id="stock">
                        </div>
                        <div class="mb-3">
                            <label for="gambar_produk" class="form-label">Gambar: </label>
                            <input type="file" class="form-control" name="gambar_produk" id="gambar_produk">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    {{-- MODAL EDIT --}}
    @foreach ($produk as $product)
        <div class="modal fade" id="editModal{{ $product->ID_produk }}" tabindex="-1"
            aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="/admin/data-produk/{{ $product->ID_produk }}" method="POST" class="d-inline"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="eeditModalLabel">Edit data produk</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="ID_produk" class="col-form-label">ID: </label>
                                <input type="text" class="form-control" name="ID_produk" id="ID_produk"
                                    value="{{ $product->ID_produk }}">
                            </div>
                            <div class="mb-3">
                                <label for="nama_produk" class="col-form-label">Nama: </label>
                                <input type="text" class="form-control" name="nama_produk" id="nama_produk"
                                    value="{{ $product->nama_produk }}">
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi_produk" class="col-form-label">Deskripsi:</label>
                                <textarea class="form-control" name="deskripsi_produk" id="deskripsi_produk" rows="10">
                                    {{ $product->deskripsi_produk }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="harga_produk" class="col-form-label">Harga: </label>
                                <input type="text" class="form-control" name="harga_produk" id="harga_produk"
                                    value="{{ $product->harga_produk }}">
                            </div>
                            <div class="mb-3">
                                <label for="slug" class="col-form-label">Slug: </label>
                                <input type="text" class="form-control" name="slug" id="slug"
                                    value="{{ $product->slug }}">
                            </div>
                            <div class="mb-3">
                                <label for="stock" class="col-form-label">Stock: </label>
                                <input type="text" class="form-control" name="stock" id="stock"
                                    value="{{ $product->stock }}">
                            </div>
                            <div class="mb-3">
                                <label for="gambar_produk" class="col-form-label">Gambar: </label>

                                <img src="data:image/jpg;charset=utf8;base64,{{ $product->gambar_produk }}" width=100%
                                    height=100%>
                                <input type="file" class="form-control" name="gambar_produk" id="gambar_produk"
                                    value="{{ $product->gambar_produk }}">
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

    {{-- MODAL HAPUS --}}
    @foreach ($produk as $product)
        <div class="modal fade" id="hapusModal{{ $product->ID_produk }}" tabindex="-1" role="dialog"
            aria-labelledby="hapusModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hapusModalLongTitle">Hapus data produk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin ingin menghapus
                        <b> {{ $product->nama_produk }} </b>
                        dari data produk?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <form action="/admin/data-produk/{{ $product->ID_produk }}" method="post" class="d-inline">
                            @method('DELETE')
                            @csrf
                            {{-- <div class="mb-3">
                                <label for="ID_produk" class="col-form-label">Stock: </label>
                                <input type="text" class="form-control" name="ID_produk" id="ID_produk">
                            </div> --}}
                            <button type="submit" class="btn btn-primary">Yes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
