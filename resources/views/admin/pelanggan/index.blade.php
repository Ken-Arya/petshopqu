@extends('admin.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">List Data Pelanggan</h1>
    </div>
    @if (session()->has('berhasilHapus'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('berhasilHapus') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    {{-- TABEL --}}
    <div class="table-responsive">
        <table class="table table-hover table-bordered table-striped" style="table-layout: fixed; width: 100%;">
            <thead>
                <tr>
                    <th scope="col" style="width: 5%">
                        ID</th>
                    <th scope="col" style="width: 10%">Username</th>
                    {{-- <th scope="col" style="width: 15%">Gambar</th> --}}
                    <th scope="col" style="width: 5%">Role</th>
                    <th scope="col" style="width: 25%">Nama</th>
                    <th scope="col" style="width: 25%">Alamat</th>
                    <th scope="col" style="width: 15%">No. HP</th>
                    <th scope="col" style="width: 15%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pelanggan as $member)
                    <tr>
                        <th scope="row">{{ $member->ID_pelanggan }}</th>
                        <td>{{ $member->username }}</td>
                        <td>{{ $member->role }}</td>
                        <td>
                            {{ $member->nama_pelanggan }}
                        </td>
                        <td>{{ $member->alamat_pelanggan }}</td>
                        <td>{{ $member->no_hp }}</td>
                        <td>
                            <center>
                                <a href="" target="_blank" class="badge bg-danger" data-bs-toggle="modal"
                                    data-bs-target="#hapusModal{{ $member->ID_pelanggan }}"
                                    data-bs-whatever="@getbootstrap">
                                    <span data-feather="trash-2">
                                    </span>
                                </a>
                            </center>
                        </td>
                        {{-- //KALAU RELASI --}}
                        {{-- <td>{{$member->table relasu->slug }}</td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- MODAL HAPUS --}}
    @foreach ($pelanggan as $member)
        <div class="modal fade" id="hapusModal{{ $member->ID_pelanggan }}" tabindex="-1" role="dialog"
            aria-labelledby="hapusModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hapusModalLongTitle">Hapus data pelanggan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin ingin menghapus
                        <b> {{ $member->nama_pelanggan }} </b>
                        dari data pelanggan?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <form action="/admin/data-pelanggan/{{ $member->ID_pelanggan }}" method="post" class="d-inline">
                            @method('DELETE')
                            @csrf
                            {{-- <div class="mb-3">
                                <label for="ID_pelanggan" class="col-form-label">Stock: </label>
                                <input type="text" class="form-control" name="ID_pelanggan" id="ID_pelanggan">
                            </div> --}}
                            <button type="submit" class="btn btn-primary">Yes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
