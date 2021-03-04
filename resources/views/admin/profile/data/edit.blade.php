@extends("admin.layouts.admin")
@section("title", "Setting Your Profile")
@section("judul", "Setting Your Profile")
@section("content")
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Your Profile Data</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{route('profile.update', $u->id)}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="photo">Profile Photo</label>
                    <input type="file" class="form-control" id="photo" name="photo" >
                </div>
                <div class="form-group">
                    <label for="fullname">Fullname</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" value="{{$u->fullname}}">
                </div>
                <div class="form-group">
                    <label for="fullname">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{$u->email}}">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea name="address" id="address" cols="30" rows="7" class="form-control">{{$u->address}}</textarea>
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
                <a href="{{route('profile.index')}}" class="btn btn-light">Cancel</a>
            </form>
        </div>
    </div>
@endsection
