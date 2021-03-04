@extends("admin.layouts.admin")
@section("title", "Configuration Courier")
@section("judul", "Configuration Courier")
@section("content")
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Courier</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{route('courier.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                @if($errors->any())
                    <div style="margin-bottom:20px;margin-top:10px;">
                        @foreach($errors->all() as $e)
                            <li style="font-size:13px;margin-bottom:10px;" class="text-danger">{{$e}}</li>
                        @endforeach
                    </div>
                @endif
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" name="photo" class="form-control" id="photo">
                </div>
                <div class="form-group">
                    <label for="fullname">Fullname</label>
                    <input type="text" name="fullname" class="form-control" id="fullname">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="handphone">Handphone</label>
                    <input type="number" name="handphone" class="form-control" id="handphone">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea name="address" id="address" cols="30" rows="7" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                </div>
                <button class="btn btn-primary">Submit</button>
                <a href="{{route('courier.index')}}" class="btn btn-light">Cancel</a>
            </form>

        </div>
    </div>
@endsection
