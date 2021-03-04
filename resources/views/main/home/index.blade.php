@extends("main.layouts.master")
@section("title", "Home")
@section("content")
<section class="ftco-section">
  <div class="container">
    <div class="row no-gutters justify-content-center mb-4">
      <div class="col-md-6 text-center heading-section ftco-animate">
        <h2 class="mb-2">Category</h2>
      </div>
    </div>
    <div class="row" style="display:flex;justify-content:center;a">
        @foreach($config as $c)
        <div class="col-md-6 col-lg-3 ftco-animate" style="margin-top:30px;">
            <a href="{{route('main.category', $c->category)}}">
            <div style="" >
                <img src="{{asset('assets/images/category/'.$c->photo)}}" alt="" style="width:200px;border-radius:20px;display:block;margin-left:auto;margin-right:auto; height:170px;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                <h5 style="color:black;text-align:center;margin-top:20px;font-weight:bold;">{{$c->category}}</h5>
            </div>
            </a>
        </div>
        @endforeach
    </div>
</section>
@endsection
