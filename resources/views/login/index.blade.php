@extends('layouts.main')

@section('container')
    <main class="form-signin">
        @if (session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form action="/login" method="post">
            @csrf
            <h1 class="h3 mb-3 fw-normal text-center">Silahkan Log In</h1>
            <div class="form-floating">
                <input type="username" name="username" class="form-control" id="username" placeholder="Username" required
                    autofocus>
                <label for="username">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                <label for="password">Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Log In</button>

            <small class="d-block text-center mt-3">
                Belum menjadi member?
            </small>
            <small class="d-block text-center">
                <a href="/register">Silahkan registrasi disini
                </a>
            </small>
        </form>
    </main>
    <br>
    <br>
    <br>
    <br>
@endsection
