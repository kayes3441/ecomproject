@extends('master.front.master')

@section('title')
    Checkout Page
@endsection

@section('body')

    <main class="main">
        <div class="page-header text-center" style="background-image: url('{{asset('/')}}front/assets/images/page-header-bg.jpg')">
        </div>
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </div>
        </nav>

        <div class="page-content">
            <div class="checkout">
                <div class="container">
                    <div class="row">
                        <p class="text-success text-center">{{Session::get('message')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
