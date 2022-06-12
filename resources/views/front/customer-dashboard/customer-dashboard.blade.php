@extends('master.front.master')

@section('title')
    Customer Dashboard
@endsection

@section('body')

    <div >
        <div class="page-header text-center" style="background-image: url('{{asset('/')}}front/assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title"><span></span></h1>
            </div>
        </div>
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item"><a href="#">Customer Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"></li>
                </ol>
            </div><!-- End .container -->
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-body" >
                        <div class="product-list-action" >
                            <ul><a href="" class="product-list">My account</a></ul>
                            <ul><a href="" class="product-list">My Dashboard</a></ul>
                            <ul><a href="" class="product-list">Settings</a></ul>
                            <ul><a href="" class="product-list">My account</a></ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card card-body">
                        <table class="table table-bordered">
                            <thead class="text-center">
                            <tr>
                                <th>No.</th>
                                <th>Order Id</th>
                                <th>Order Total</th>
                                <th>Order Date</th>
                                <th>Order Status</th>
                                <th>Payment Status</th>
                                <th>Payment Delivery Status</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            @foreach($orders as $order)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$order->id}}</td>
                                <td>TK.{{number_format($order->order_total)}}</td>
                                <td>{{$order->order_date}}</td>
                                <td>{{$order->order_status}}</td>
                                <td>{{$order->payment_status}}</td>
                                <td>{{$order->delivery_address}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$orders->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
