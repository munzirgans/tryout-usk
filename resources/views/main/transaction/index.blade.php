@extends("main.layouts.master")
@section("title", "Cart")
@section("content")
<section class="ftco-section">
    <div class="container">
        <div class="row no-gutters justify-content-center mb-4">
            <div class="col-md-6 text-center heading-section ftco-animate">
                <h2 class="mb-4">Choose Your Payment</h2>
            </div>
        </div>
        <div class="row ftco-animate" style="justify-content:center;display:flex;">
            <div class="col-4">
            <a href="{{route('main.transaksi.payment')}}">
                <div class="card" style="background:#4e73df;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; ">
                    <div class="card-body" style="display:flex;align-items:center;">
                        <p style="text-align:center;color:white;font-weight:bold;margin-top:12px;font-size:20px;display:block;margin-left:auto;margin-right:auto;">
                        <i class="fas fa-dollar-sign" style="color:white;font-size:25px;margin-right:10px;"></i>
                        Cash </p>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-4">
            <a href="">
                <div class="card" style="background:#4e73df;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                    <div class="card-body" style="display:flex;align-items:center;">
                        <p style="text-align:center;color:white;font-weight:bold;margin-top:12px;font-size:20px;display:block;margin-left:auto;margin-right:auto;">
                        <i class="fas fa-university" style="color:white;font-size:25px;margin-right:10px;"></i>
                        Bank BCA </p>
                    </div>
                </div>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
