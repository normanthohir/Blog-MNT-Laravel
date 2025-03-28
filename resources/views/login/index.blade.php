@extends('layouts.main')


@section('container')
    <div class="row justify-content-center">
        <div class="col-md-4 mt-4">

            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
           
            @if (session()->has('LoginEror'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('LoginEror') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <main class="form-signin w-100 m-auto">
                <div class="card shadow mt-5 ">
                    <div class="card-body p-4">
                        <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
                        <form action="/login" method="POST">
                            @csrf  {{-- @csrf token form untuk tidak di bajak --}}
                            <div class="form-floating">
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                    placeholder="name@gmail.com" autofocus required value="{{ old('email') }}">
                                <label for="email">Email address</label>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <input type="password" name="password" class="form-control" id="password" 
                                placeholder="Password" required>
                                <label for="password">Password</label>
                            </div>

                            <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Login</button>

                        </form>
                        <small class="d-block text-center mt-2">
                            Not Register <a href="/register" class="text-decoration-none">Register Now!</a>
                        </small>
                    </div>
                </div>

            </main>

        </div>
    </div>
@endsection
