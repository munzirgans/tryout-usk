@extends("admin.layouts.admin")
@section("title", "Manage Products")
@section("judul", "Manage Products")
@section("content")
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Products</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row" style="justify-content:space-between;">
                <h6 class="m-0 font-weight-bold text-primary" style="margin-left:15px !important;align-items:center;display:flex;">Products Data</h6>
                <a href="{{route('manage.products.add')}}" class="btn btn-success"> <i class="fas fa-plus" style="margin-right:5px;"></i> Add Product</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Photo</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Stock</th>
                            <th>Price</th>
                            <th>Star</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $p)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$p->name}}</td>
                                <td>
                                    <img src="{{asset('assets/images/products/'.$p->photo)}}" alt="" style="width:80px;height:100px;justify-content:center;display:block;margin-left:auto;margin-right:auto;">
                                </td>
                                <td>{{$p->description}}</td>
                                <td>{{$p->category}}</td>
                                <td>{{$p->stock}}</td>
                                <td>{{$p->price}}</td>
                                <td>{{$p->star}}</td>
                                <td>
                                    <a href="{{route('manage.products.edit', $p->id)}}" class="btn btn-warning">Edit</a>
                                    <a href="{{route('manage.products.delete', $p->id)}}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

