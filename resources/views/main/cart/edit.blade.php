@extends("main.layouts.master")
@section("title", "Cart")
@section("content")
<section class="ftco-section">
    <div class="container">
        <div class="row no-gutters justify-content-center mb-4">
            <div class="col-md-6 text-center heading-section ftco-animate">
                <h2 class="mb-2">Edit Your Cart Stock</h2>
            </div>
        </div>
        <div class="col-4 " style="display:block;margin-left:auto;margin-right:auto;">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('main.cart.update',$cart->id)}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="number" class="form-control" name="qty" value="{{$cart->qty}}">
                        </div>
                        <button class="btn btn-success">Submit</button>
                        <a href="{{route('main.cart')}}" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
