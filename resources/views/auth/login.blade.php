<!doctype html>
<html lang="en" dir="ltr">

<!-- soccer/project/login.html  07 Jan 2020 03:42:43 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>:: Soccer :: Login</title>

    <!-- Bootstrap Core and vandor -->
    <link rel="stylesheet" href="{{asset('/')}}admin/assets/bootstrap/css/bootstrap.min.css" />

    <!-- Core css -->
    <link rel="stylesheet" href="{{asset('/')}}admin/assets/css/main.css"/>
    <link rel="stylesheet" href="{{asset('/')}}admin/assets/css/theme1.css"/>

</head>
<body class="font-montserrat">


<div class="auth">
    <div class="auth_left">
        <div class="card">

            <form action="{{route('login')}}" method="POST">
             @csrf
            <div class="card-body">
                <div class="card-title">Login to your account</div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    @if (Route::has('password.request'))
                        <label class="form-label">Password<a href="{{ route('password.request') }}" class="float-right small">I forgot password</a></label>
                        <input type="password"  name="password" class="form-control" placeholder="Password">
                    @endif
                </div>
                <div class="form-group">
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" id="remember_me" name="remember" class="custom-control-input" />
                        <span class="custom-control-label" >Remember me</span>
                    </label>
                </div>
                <div class="form-footer">
                    <input type="submit" class="btn btn-primary btn-block" value="Login">
                </div>
            </div>
            </form>
            <div class="text-center text-muted">
                Don't have account yet? <a href="{{route('register')}}">Sign up</a>
            </div>
        </div>
    </div>
    <div class="auth_right full_img"></div>
</div>

<script src="{{asset('/')}}admin/assets/bundles/lib.vendor.bundle.js"></script>
<script src="{{asset('/')}}admin/assets/js/core.js"></script>
</body>

<!-- soccer/project/login.html  07 Jan 2020 03:42:43 GMT -->
</html>
