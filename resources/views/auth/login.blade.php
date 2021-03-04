<!doctype html>
<html lang="en">

<!-- Mirrored from tinno.laborasyon.com/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 Jan 2021 12:27:35 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tinno chat</title>

    <!-- Favicon -->
    <link rel="icon" href="{{asset('dist/media/img/favicon.png')}}" type="image/png">

    <!-- Google Nunito font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700&amp;display=swap" rel="stylesheet">

    <!-- Material design icons -->
    <link href="{{asset('dist/icons/materialicons/css/materialdesignicons.min.css')}}" rel="stylesheet">

    <!-- Bundle Styles -->
    <link rel="stylesheet" href="{{asset('dist/vendor/bundle.css')}}">

    <!-- Landing page styles -->
    <link rel="stylesheet" href="{{asset('dist/css/landing-page.min.css')}}">
</head>
<body class="auth" style="background: url(https://static.fandomspot.com/images/08/8574/00-featured-tom-reading-newspaper-meme-template-preview.jpg)">

<div class="form-wrapper">

    <!-- logo -->
    <div class="logo my-5">
        <img src="{{asset('dist/media/img/logo-full-2x.png')}}" alt="logo">
    </div>
    <!-- ./ logo -->

    <h5>Đăng nhập</h5>

    <!-- form -->
    <form action="{{route('auth.doLogin')}}" method="POST">
    @csrf
        @if(Session::get('loi'))
            <div class="alert alert-danger">{{ Session::get('loi') }}</div>
        @endif
        @if(Session::get('xong'))
            <div class="alert alert-success">{{ Session::get('xong') }}</div>
        @endif
        <div class="form-group">
            <input type="text" value="{{old('email')}}" name="email" class="form-control" placeholder="email"  autofocus>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Mật khẩu" >
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group d-flex justify-content-between">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" checked="" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Duy trì đăng nhập</label>
            </div>
            <a href="reset-password.html">Reset password</a>
        </div>
        <button class="btn btn-primary">Đăng nhập</button>
        <div class="my-5">
            <p>Hoặc sử dụng mạng xá hội.</p>
            <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="#" class="btn btn-floating btn-sm btn-facebook">
                        <i class="mdi mdi-facebook"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="#" class="btn btn-floating btn-sm btn-twitter">
                        <i class="mdi mdi-twitter"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="#" class="btn btn-floating btn-sm btn-linkedin">
                        <i class="mdi mdi-linkedin"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="#" class="btn btn-floating btn-sm btn-google">
                        <i class="mdi mdi-google"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="#" class="btn btn-floating btn-sm btn-instagram">
                        <i class="mdi mdi-instagram"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="my-5">
            <p>Chưa có tài khoản ? <a href="signup">Đăng ký ngay!</a></p>
        </div>
    </form>
    <!-- ./ form -->

</div>

<!-- Bundle -->
<script src="{{asset('dist/vendor/bundle.js')}}"></script>



</body>

<!-- Mirrored from tinno.laborasyon.com/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 Jan 2021 12:27:57 GMT -->
</html>
