@extends("main.layouts.master")
@section("title", "Home")
@section("content")
<section class="ftco-section">
  <div class="container">
    <div class="row no-gutters justify-content-center mb-4">
      <div class="col-md-6 text-center heading-section ftco-animate">
        <h2 class="mb-2">{{ucwords($name)}} Category</h2>
      </div>
    </div>
    <div class="row" style="display:flex;justify-content:center;">
        @foreach($product as $p)
        <div class="col-md-6 col-lg-4 ftco-animate" style="margin-top:30px;">
            <div style="background-color:#4e73df;border-radius:10px;padding-left:30px;padding-right:30px;;padding-bottom  :30px;padding-top:30px;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;" >
                <img src="{{asset('assets/images/products/'.$p->photo)}}" alt="" style="width:170px;border-radius:10px;display:block;margin-left:auto;margin-right:auto; height:170px;">
                <h5 style="color:white;text-align:center;margin-top:10px;font-weight:bold;">{{$p->name}}</h5>
                @if(strlen($p->description) < 120)
                    <p style="color:lightgrey">{{$p->description}}</p>
                @else
                    <p style="color:lightgrey">{{substr($p->description,0,120)."...."}}</p>
                @endif
                <p style="color:white;font-weight:bold;">Price : {{$p->price}}</p>
                <a href="{{route('main.product', $p->id)}}" class="btn btn-dark">Read More</a>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection
