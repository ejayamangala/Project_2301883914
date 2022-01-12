@extends('Layout')


@section('content')

    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session()->has('fail'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('fail') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark">Login</div>
                    <div class="card-body">
                        <form action="/login" method="post">
                        @csrf
                            <div class="form-group row mt-3 mb-3">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" autofocus required value={{Cookie::get('email') !== null ? Cookie::get('email') : "" }}>
                                </div>
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input type="password" name="password" class="form-control" id="password" required value={{Cookie::get('password') !== null ? Cookie::get('password') : "" }}>
                                </div>
                            </div>
                    </div>
                    <div class="body-bottom">
                        <div class="offset-md-5">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember"> Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 offset-md-5 mt-3 mb-3">
                            <button type="submit" class="btn btn-primary col-4 bg-black">
                                Login
                            </button>
                        </div>
                        <div class="d-block text-center mt-3"> Not Member? <a href="/register">Register Now!</a></div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</main>

@endsection

