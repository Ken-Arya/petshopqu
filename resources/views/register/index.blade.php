@extends('layouts.main')

@section('container')
    <main class="form-registration">
        <h1 class="h3 mb-3 fw-normal text-center">Silahkan Registrasi</h1>
        <form action="/register" method="post">
            @csrf
            <div class="form-floating">
                <input type="text" name="nama_pelanggan" class="form-control" id="nama_pelanggan" placeholder="Nama" required>
                <label for="nama_pelanggan">Nama</label>
            </div>
            <div class="form-floating">
                <input type="text" name="username" class="form-control" id="username" placeholder="Username" required>
                <label for="username">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                <label for="password">Password</label>
            </div>
            <div class="form-floating">
                <input type="text" name="alamat_pelanggan" class="form-control" id="alamat_pelanggan"
                    placeholder="Alamat" required>
                <label for="alamat_pelanggan">Alamat</label>
            </div>
            <div class="form-floating">
                <input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="No. HP" required>
                <label for="no_hp">No. HP</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Registrasi</button>

            <small class="d-block text-center mt-3">
                Sudah menjadi member?
            </small>
            <small class="d-block text-center">
                <a href="/login">Silahkan Log-in disini
                </a>
            </small>
        </form>
    </main>
@endsection
