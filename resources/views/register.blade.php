@extends('Layout')


@section('content')

<main class="register-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark">Register Member</div>
                    <div class="card-body">
                        <form action="/register" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group row mt-3 mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" required value="{{ old('name') }}">
                                </div>
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group row mt-3 mb-3">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" required value="{{ old('email') }}">
                                </div>
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group row mt-3 mb-3">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">Phone </label>
                                <div class="col-md-6">
                                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" required value="{{ old('phone') }}">
                                </div>
                                @error('phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>


                            <div class="form-group row mt-3 mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input type="password" name="password"class="form-control @error('password') is-invalid @enderror" id="password" required>
                                </div>
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group row mt-3 mb-3">
                                <label for="confirmpassword" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                                <div class="col-md-6">
                                    <input type="password" name="confirmpassword" class="form-control @error('confirmpassword') is-invalid @enderror" id="password" required>
                                </div>
                                @error('confirmpassword')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>


                            <div class="form-group row mt-3 mb-3 ">
                                <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>
                                <select class="select col-md-6" name="gender" id="gender" required>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>

                            <div class="form-group row mt-3 mb-3">
                                <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>
                                <div class="col-md-6">
                                    <input class="form-control @error('user_img') is-invalid @enderror" name="user_img" type="file" id="image">
                                </div>
                                @error('user_img')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="body-bottom">

                                <div class="col-md-6 offset-md-4 mt-4 mb-3">
                                    <button type="submit" class="btn btn-primary col-md-9 bg-black">
                                        Register
                                    </button>
                                </div>
                            </div>

                    </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</main>


@endsection

