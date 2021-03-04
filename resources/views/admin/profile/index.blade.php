@extends("admin.layouts.admin")
@section("title", "Setting Your Profile")
@section("judul", "Setting Your Profile")
@section("content")
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Your Profile Data</h1>
    </div>
    <div class="card shadow mb-4 col-7" style="display:block; margin-left:auto;margin-right:auto;">
        <div class="card-body ml-3">
            <div style="margin-top:10px;">
                <h6>Profile Photo</h6>
                <img src="{{asset('assets/images/users/'.$user->photo)}}" alt="" style="width:150px;height:150px;border-radius:50%;margin-top:10px;margin-bottom:10px;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
            </div>
            <div style="margin-top:25px;">
                <h6>Fullname</h6>
                <h5 style="font-weight:bold;">{{$user->fullname}}</h5>
            </div>
            <div style="margin-top:25px;">
                <h6>Email Address</h6>
                <h5 style="font-weight:bold;">{{$user->email}}</h5>
            </div>
            <div style="margin-top:25px;">
                <h6>Handphone</h6>
                <h5 style="font-weight:bold;">{{$user->handphone}}</h5>
            </div>
            <div style="margin-top:25px;">
                <h6>Address</h6>
                <h5 style="font-weight:bold;">{{$user->address}}</h5>
            </div>
            <div style="margin-top:25px;">
                <a href="{{route('profile.edit',$user->id)}}" class="btn btn-warning">Edit Profile</a>
                <a href="{{route('profile.password.index')}}" class="btn btn-danger">Change Password</a>
            </div>
        </div>
    </div>
@endsection
