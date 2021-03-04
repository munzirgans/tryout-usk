@extends("admin.layouts.admin")
@section("title", "Configuration Category")
@section("judul", "Configuration Category")
@section("content")
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Category</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row" style="justify-content:space-between;">
                <h6 class="m-0 font-weight-bold text-primary" style="margin-left:15px !important;align-items:center;display:flex;">Category Data</h6>
                <a href="{{route('configuration.category.add')}}" class="btn btn-success"> <i class="fas fa-plus" style="margin-right:5px;"></i> Add Category</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Photo</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    @foreach($config as $c)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>
                                <img src="{{asset('assets/images/category/'.$c->photo)}}" alt="" style="width:150px;display:block;margin-right:auto;margin-left:auto;">
                            </td>
                            <td>{{$c->category}}</td>
                            <td>
                                <a href="{{route('configuration.category.edit', $c->id)}}" class="btn btn-warning">Edit</a>
                                <a href="{{route('configuration.category.delete', $c->id)}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
