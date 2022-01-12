@extends('Layoutadmin')


@section('content')
<div>
    <form action="/users">
        <div class="d-flex">
            <label for="search" class="mt-1 px-3">Search :</label>

            <div class="col-md-6 px-5">
                <input type="text" name="search_query" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary col-2 bg-dark">Search</button>
        </div>
    </form>
</div>
<div class="d-flex justify-content-evenly flex-wrap ">
    @foreach ( $user as $u )
    @if ($u->role != "admin")
    <div class="card mt-3" style="width: 18rem;">
        <img width="100px" height="300px" src="{{ Storage::url($u->user_img) }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h6 class="card-title">{{ $u->name }}</h6>
          <a href="{{ route('user.edit', $u->id) }}" class="btn btn-danger col-8 mb-3">Update Data</a>
          <a href="{{ route('user.show',$u->id) }}" class="btn btn-primary col-8 ">Detail Data</a>
        </div>
    </div>
    @endif
    @endforeach
</div>

<div class="page mt-3">
    {{ $user->links()}}
</div>

@endsection


