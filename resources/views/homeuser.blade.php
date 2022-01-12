@extends('Layout')


@section('content')
    <h1 class="welcome text-center mt-5">Welcome to Sehat Kuy GYM</h1>
    <div class="homeuserimg mt-5">
        <img src="{{ Storage::url(auth()->user()->user_img) }}" class="img-thumbnail" width="500px" alt="...">
    </div>

@endsection


