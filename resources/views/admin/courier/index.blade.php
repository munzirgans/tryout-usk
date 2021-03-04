@extends("admin.layouts.admin")
@section("title", "Configuration Courier")
@section("judul", "Configuration Courier")
@section("content")
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Courier</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row" style="justify-content:space-between;">
                <h6 class="m-0 font-weight-bold text-primary" style="margin-left:15px !important;align-items:center;display:flex;">Courier Data</h6>
                <a href="{{route('courier.add')}}" class="btn btn-success"> <i class="fas fa-plus" style="margin-right:5px;"></i> Add Courier</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Photo</th>
                            <th>Fullname</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Handphone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $u)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <img src="{{asset('assets/images/users/'.$u->photo)}}" alt="" style="width:80px;height:100px;justify-content:center;display:block;margin-left:auto;margin-right:auto;">
                                </td>
                                <td>{{$u->fullname}}</td>
                                <td>{{$u->address}}</td>
                                <td>{{$u->email}}</td>
                                <td>{{$u->handphone}}</td>
                                <td>
                                    <a href="{{route('courier.edit', $u->id)}}" class="btn btn-warning">Edit</a>
                                    <a href="{{route('courier.delete',$u->id)}}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection

