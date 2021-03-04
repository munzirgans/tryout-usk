@extends("main.layouts.master")
@section("title", "Cart")
@section("content")
    <section class="ftco-section">
    <div class="container">
        <div class="row no-gutters justify-content-center mb-4">
            <div class="col-md-6 text-center heading-section ftco-animate">
                <h2 class="mb-2">Your Cart</h2>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $c)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td style="display:flex;justify-content:center;">
                            <img src="{{asset('assets/images/products/'.$c->photo)}}" alt="" style="width:150px;border-radius:10px;">
                        </td>
                        <td>{{$c->name}}</td>
                        <td>{{$c->qty}}</td>
                        <td>{{"Rp. ".$c->price}}</td>
                        <td>
                            <a href="{{route('main.cart.edit',$c->id)}}" class="btn btn-warning">Edit</a>
                            <a href="{{route('main.cart.delete', $c->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h5 style="margin-top:50px;">Total Price : Rp. {{$total->total}}</h5>
        <a href="{{route('main.transaksi')}}" class="btn btn-success">Payment</a>
    </div>
    </section>
@endsection
