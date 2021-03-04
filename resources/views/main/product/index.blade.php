@extends("main.layouts.master")
@section("title", "Product")
    <style>
        .star i:not(:first-child){
            margin-left:5px;
        }
    </style>
@section("content")
    <section class="ftco-section">
        <div class="container" style="display:flex;align-items:center;justify-content:center">
            <div class="col-12">
                <div class="card" style="overflow:hidden;box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;border-radius:10px;">
                    <div class="card-body"style="padding-left:0px;padding-right:0px;padding-top:0px;padding-bottom:0px;display:flex;">
                        <div>
                            <img src="{{asset('assets/images/products/'.$p->photo)}}" alt="" style="width:500px;box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;height:400px;">
                        </div>
                        <div style="padding-left:30px;padding-right:30px;padding-top:20px;padding-bottom:20px;width:100%;">
                            <h3>{{$p->name}}</h3>
                            <div style="display:flex" class="star">
                                @if($p->star == 5)
                                    @for($i=0;$i < $p->star;$i++)
                                        <i class="fas fa-star" style="color:#fdb827"></i>
                                    @endfor
                                @else
                                    @for($i=0;$i < $p->star;$i++)
                                        <i class="fas fa-star" style="color:#fdb827"></i>
                                    @endfor
                                    @for($i=0;$i < 5 - $p->star;$i++)
                                        <i class="far fa-star" style="color:#fdb827"></i>
                                    @endfor
                                @endif
                                <!-- <i class="fas fa-star" style="color:#fdb827"></i>
                                <i class="fas fa-star" style="color:#fdb827"></i>
                                <i class="fas fa-star" style="color:#fdb827"></i>
                                <i class="fas fa-star" style="color:#fdb827"></i>
                                <i class="fas fa-star" style="color:#fdb827"></i> -->
                            </div>
                            <p style="margin-top:10px;margin-bottom:15px;">Stock : {{$p->stock}}</p>
                            <h6 style="font-size:16px;">{{$p->description}}</h6>
                            <div style='float:right;display:block;margin-top:auto;'>
                                <form action="{{route('main.cart.store')}}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{\Session::get('user')->id}}" name="id">
                                    <div class="form-group">
                                        <label for="qty">Buy Qty</label>
                                        <input type="number" class="form-control" value="1" min="1" style="width:70px;" name="qty">
                                        <button class="btn btn-success" style="margin-top:10px">Put To Cart</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
