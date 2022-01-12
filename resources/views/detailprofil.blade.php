@extends('Layoutadmin')


@section('content')

<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-25 col-md-50">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25"> <img src="{{ Storage::url($user->user_img) }}" class="img-thumbnail" width="500px" alt="User-Profile-Image"> </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <h3 class="m-b-20 p-b-5 b-b-default f-w-600">My Profile</h3>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Name</p>
                                        <h6 class="text-muted f-w-400">{{ $user->name }}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Email</p>
                                        <h6 class="text-muted f-w-400">{{ $user->email }}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Phone</p>
                                        <h6 class="text-muted f-w-400">{{ $user->phone }}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Gender</p>
                                        <h6 class="text-muted f-w-400">{{ $user->gender }}</h6>
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

