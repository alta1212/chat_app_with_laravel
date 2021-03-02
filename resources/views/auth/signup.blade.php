<!doctype html>
<html lang="en">

<!-- Mirrored from tinno.laborasyon.com/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 Jan 2021 12:28:42 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tinno - HTML5 Chat App Template</title>

    <!-- Favicon -->
    <link rel="icon" href="{{asset('dist/media/img/favicon.png')}}" type="image/png">

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:600,700&amp;display=swap" rel="stylesheet">

    <!-- Material design icons -->
    <link href="{{asset('dist/icons/materialicons/css/materialdesignicons.min.css')}}" rel="stylesheet">

    <!-- Bundle Styles -->
    <link rel="stylesheet" href="{{asset('dist/vendor/bundle.css')}}">

    <!-- Landing page styles -->
    <link rel="stylesheet" href="{{asset('dist/css/landing-page.min.css')}}">
</head>
<body class="auth" style="background: url(dist/media/img/auth.jpg)">

<div class="form-wrapper">

    <!-- logo -->
    <div class="logo my-5">
        <img src="{{asset('dist/media/img/logo-full-2x.png')}}" alt="logo">
    </div>
    <!-- ./ logo -->

    <h5>Create account</h5>

    <!-- form -->
    <form action="{{route('auth.createUser')}}" method="POST">
        @csrf
        @if(Session::get('xong'))
            <div class="alert alert-success">{{ Session::get('xong') }}<a href="login"> Đăng nhập</a></div>
        @endif
        @if(Session::get('loi'))
            <div class="alert alert-danger">{{ Session::get('loi') }}</div>
        @endif
        <div class="form-group">
            <input value="{{old('nameuser')}}" type="text" name="nameuser" class="form-control" placeholder="Tên của bạn"   autofocus>
            @error('nameuser')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <input value="{{old('email')}}" type="text" name="email" class="form-control" placeholder="Email" >
            @error('email')
                <div class="alert alert-danger ">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <input  type="password" name="password" class="form-control" placeholder="Mật khẩu" >
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-primary">Sign Up</button>
        <div class="my-5">
            Already have an account? <a href="login">Sign in now!</a>
        </div>
    </form>
    <!-- ./ form -->

</div>

<!-- Bundle -->
<script src="{{asset('dist/vendor/bundle.js')}}"></script>

</body>

<!-- Mirrored from tinno.laborasyon.com/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 Jan 2021 12:28:42 GMT -->
</html>
