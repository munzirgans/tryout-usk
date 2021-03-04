@extends("admin.layouts.admin")
@section("title", "Manage Products")
@section("judul", "Manage Products")
@section("content")
    @if(count($configs))
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Products</h1>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{route('manage.products.update', $p->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if($errors->any())
                        <div style="margin-bottom:20px;margin-top:10px;">
                            @foreach($errors->all() as $e)
                                <li style="font-size:13px;margin-bottom:10px;" class="text-danger">{{$e}}</li>
                            @endforeach
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{$p->name}}">
                    </div>
                    <div class="form-group">
                        <label for="photo">Photo</label>
                        <input type="file" name="photo" class="form-control" id="photo">
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category" id="category" class="form-control">
                            @foreach($configs as $c)
                                @if($p->category == $c->category)
                                    <option selected>{{$c->category}}</option>
                                @else
                                    <option>{{$c->category}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" name="stock" class="form-control" id="stock" placeholder="Stock" value="{{$p->stock}}">
                    </div>
                    <div class="form-group">
                        <label for="star">Star</label>
                        <input type="number" name="star" class="form-control" id="star" placeholder="Star" value="{{$p->star}}">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" name="price" class="form-control" id="price" placeholder="Price" value="{{$p->price}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="30" rows="7" class="form-control" placeholder="Description">{{$p->description}}</textarea>

                    </div>
                    <button class="btn btn-primary">Submit</button>
                    <a href="{{route('manage.products.index')}}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    @else
        <div style="height:70%;align-items:center;display:flex;justify-content:center;">
            <h3 style="font-weight:bold;display:flex;text-align:center;" class="text-danger">The category is empty. <br> Please insert the category in the configuration first!</h3>
        </div>
    @endif
@endsection
