@extends('Layoutadmin')


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

<div class="d-flex justify-content-evenly flex-wrap ">

    @foreach ( $user as $u )
    @if ($u->role != "admin")
    <div class="card mt-3 " style="width: 18rem;">
        <img width="100px" height="300px" src="{{ Storage::url($u->user_img) }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h6 class="card-title">{{ $u->name }}</h6>
          <a href="{{ route('user.edit', $u->id ) }}" class="btn btn-danger col-8 mb-3">Update Data</a>
          <a href="{{ route('user.show',$u->id ) }}" class="btn btn-primary col-8 ">Detail Data</a>
        </div>
    </div>
    @endif
    @endforeach

</div>

<div class="page mt-3">
    {{ $user->links()}}
</div>

@endsection

