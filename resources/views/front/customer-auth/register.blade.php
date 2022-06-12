@extends('master.front.master')

@section('title')
    Register Page
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
                    <li class="breadcrumb-item"><a href="#">Register</a></li>
                    <li class="breadcrumb-item active" aria-current="page"></li>
                </ol>
            </div><!-- End .container -->
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <form action="{{route('customer-new')}}" method="POST">
                        @csrf
                    <div class="card card-body">
                        <div class="text-center mb-5">
                            <a class="header-brand" href="index-2.html"><i class="fa fa-soccer-ball-o brand-logo"></i></a>
                        </div>
                        <div class="card-body">
                            <div class="card-title">Create new account</div>
                            <div class="form-group">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Email address</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Mobile</label>
                                <input type="number" class="form-control" name="mobile" placeholder="Mobile">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <div class="form-footer">
                                <button type="submit" class="btn btn-primary btn-block">Create new account</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
