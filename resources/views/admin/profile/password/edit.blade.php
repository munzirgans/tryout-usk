@extends("admin.layouts.admin")
@section("title", "Setting Your Profile")
@section("judul", "Setting Your Profile")
@section("content")
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Change Your Password</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{route('profile.password')}}" method="post">
                @csrf
                @if($message != "")
                    <div style="margin-bottom:20px;margin-top:10px;">
                        <li style="font-size:13px;margin-bottom:10px;" class="text-danger">{{$message}}</li>
                    </div>
                @else
                    @if($errors->any())
                        <div style="margin-bottom:20px;margin-top:10px;">
                            @foreach($errors->all() as $e)
                                <li style="font-size:13px;margin-bottom:10px;" class="text-danger">{{$e}}</li>
                            @endforeach
                        </div>
                    @endif
                @endif
                <input type="hidden" value="{{\Session::get('user')->id}}" name="id">
                <div class="form-group">
                    <label for="old_password">Old Password</label>
                    <input type="password" name="old_password" id="old_password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password" class="form-control">
                </div>
                <button class="btn btn-primary">Submit</button>
                <a href="{{route('profile.index')}}" class="btn btn-light">Cancel</a>
            </form>
        </div>
    </div>
@endsection
