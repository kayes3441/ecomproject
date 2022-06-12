@extends('master.front.master')

@section('title')
    Cart
@endsection

@section('body')
    <main class="main">
        <div class="page-header text-center" style="background-image: url('{{asset('/')}}front/assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title"><span></span></h1>
            </div>
        </div>
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                </ol>
            </div>
        </nav>
        <p class="text-center text-success">{{Session::get('message')}}</p>
        <div class="page-content">
            <div class="cart">
                <div class="container">
                    <div class="row" >
                        <div class="col-lg-9">
                            <table class="table table-cart table-mobile">
                                <thead>
                                <tr>
                                    <th>Product Image</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Total Price</th>
                                    <th></th>
                                </tr>
                                </thead>
                                @php($total=0)
                                @foreach($cartProducts as $product)
                                <tbody>
                                <tr>
                                    <td>
                                        <img src="{{asset($product->attributes->image)}}"  width="80" alt="Product image">
                                    </td>
                                    <td>{{$product->name}}</td>

                                    <td class="mb-15">
                                        <form action="{{route('cart-product-update',['id'=>$product->id])}}" method="POST">
                                            @csrf
                                        <div class="input-group" style="width: 150px ;display: flex">
                                            <input type="number" class="form-control" name="qty" value="{{$product->quantity}}" min="1" style=": 40px">
                                            <div class="input-group-append" >
                                                <button class="btn btn-outline-secondary" type="submit" style="min-width: 80px">Update</button>
                                            </div>
                                        </div>
                                        </form>
                                    </td>
                                    <td>TK.{{$product->price}}</td>
                                    <td>TK.{{$product->quantity * $product->price}}</td>
                                    <form action="{{route('cart-product-remove',['id'=>$product->id])}}" method="POST">
                                        @csrf
                                    <td><button class="btn-remove"><i class="icon-close"></i></button></td>
                                    </form>
                                </tr>
                                </tbody>
                                @php($total =$total + $product->quantity * $product->price)
                                @endforeach
                            </table>
                        </div>
                        <aside class="col-lg-3">
                            <div class="summary summary-cart">
                                <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

                                <table class="table table-summary">
                                    <tbody>
                                    <tr class="summary-subtotal">
                                        <td>Subtotal:</td>
                                        <td>TK.{{number_format($total)}}</td>
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
                                    </tr>
                                    </tbody>
                                </table>

                                <a href="{{route('checkout-product')}}" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
                            </div>

                            <a href="{{route('home')}}" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
