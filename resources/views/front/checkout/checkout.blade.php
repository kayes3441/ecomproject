@extends('master.front.master')

@section('title')
    Checkout Page
@endsection

@section('body')

    <main class="main">
        <div class="page-header text-center" style="background-image: url('{{asset('/')}}front/assets/images/page-header-bg.jpg')">
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="checkout">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 mb-3">
                            <form action="{{route('new-order')}}" method="POST">
                                @csrf
                                <h2 class="checkout-title">Billing Details</h2>
                                @if(!Session::get('customer_id'))
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>First Name </label>
                                        <input type="text" class="form-control" name="name" required>
                                    </div><!-- End .col-sm-6 -->
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Mobile</label>
                                        <input type="text" class="form-control" name="mobile" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" required>
                                    </div>
                                </div>
                                @endif
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Delivery Address</label>
                                        <div>
                                            <textarea  class="form-control"  name="delivery_address"> </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 mb-2">
                                        <div class="form-check form-check-inline mt-2">
                                            <label class="mx-3">Select Payment Method</label>
                                            <div>
                                                <label class="mx-3"><input class="form-check-input" type="radio" name="payment_method" id="inlineRadio1" value="1">Cash On Delivery</label>
                                                <label><input class="form-check-input" type="radio" name="payment_method" id="inlineRadio2" value="2">Online Payment</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <button type="submit" class="btn btn-success" style="width: 100%;">Confirm Order</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        <div class="col-lg-3 mb-3">
                                <div class="summary">
                                    <h3 class="summary-title">Your Order</h3>

                                    <table class="table table-summary">
                                        <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php($total=0)
                                        @foreach($cartProducts as $product)
                                        <tr>
                                            <td>{{$product->name}}--({{$product->price}}x{{$product->quantity}})</td>
                                            <td>TK.{{number_format($product->price)}}</td>
                                        </tr>
                                        @php($total=$total+$product->price)
                                        @endforeach
                                        <tr class="summary-subtotal">
                                            <td>Subtotal:</td>
                                            <td>Tk.{{number_format($total)}}</td>
                                        </tr><!-- End .summary-subtotal -->
                                        <tr class="summary-subtotal">
                                            <td>Shipping:</td>
                                            <td>TK.{{number_format($shipping=100)}}</td>
                                        </tr>
                                        <tr class="summary-subtotal">
                                            <td>Tax Amount(15%):</td>
                                            <td>TK.{{number_format($tax=($total*15)/100)}}</td>
                                        </tr>
                                        <tr class="summary-total">
                                            <td>Total:</td>
                                            <td>TK.{{number_format($total+$shipping+$tax)}}</td>
                                            <?php
                                            Session::put('total',$total);
                                            Session::put('shipping',$shipping);
                                            Session::put('tax',$tax);
                                            ?>
                                        </tr>
                                        </tbody>
                                    </table><!-- End .table table-summary -->
                                </div><!-- End .summary -->
                            </div><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .checkout -->
        </div><!-- End .page-content -->
    </main>

@endsection
