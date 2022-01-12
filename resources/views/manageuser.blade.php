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
<table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">User Id</th>
        <th scope="col">Username</th>
      </tr>
    </thead>
    <tbody>
    @foreach ( $user as $u)
    @if ($u->role != "admin")
    <tr class="table-secondary">
        <th scope="row">{{ $u->id }}</th>
        <td>{{ $u->name }}</td>
        <td>
            <form method="POST" action="{{ route('user.destroy', $u) }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-primary" onclick="Delete this User?">Delete</button>
            </form>
        </td>

    </tr>
    @endif
    @endforeach

    </tbody>
  </table>



@endsection


