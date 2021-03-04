@extends("main.layouts.master")
@section("title", "Order")
@section("content")
    <section class="ftco-section">
    <div class="container">
        <div class="row no-gutters justify-content-center mb-4">
            <div class="col-md-6 text-center heading-section ftco-animate">
                <h2 class="mb-2">Your Orders</h2>
            </div>
        </div>
        <a href="">
            <div class="card col-8" style="display:block;margin-left:auto;margin-right:auto;">
                <div class="card-body"style="display:flex;">
                    <div>
                        <img src="" alt="" style="width:200px;height:150px; border-radius:10px;box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;" >
                    </div>
                    <div style="margin-left:30px;">
                            <h5>Driver Name</h5>
                            <p style="color:grey;">Date & Time : </p>
                            <p style="color:grey">Status : </p>
                    </div>
                </div>
            </div>
        </a>
    </div>
    </section>
@endsection
