<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ asset('style.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 form-container">
                <div class="col-lg-8 col-md-12 col-sm-9 col-xs-12 form-box">
                    <div class="logo mt-5 mb-3 text-center">
                        <img src="{{ asset('logo.png') }}" width="100px">
                    </div>
                    <div class="reset-form d-block">

                        <form class="reset-password-form" action="" method="POST" role="form">
                            @csrf

                            <div class="form-input">
                                <label for="">Password</label>
                                <input type="password" name="password" required minlength="6"
                                    title="Mật khẩu dài hơn 6 ký tự">
                                <label for="">Confirm password</label>
                                <input type="password" name="confirm_password" required minlength="6"
                                    title="Mật khẩu dài hơn 6 ký tự">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn">Đặt lại mật khẩu</button>
                            </div>
                        </form>
                        @if (\Session::has('message'))
                            <div class="alert alert-primary">
                                <strong>{!! \Session::get('message') !!}</strong>
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="reset-confirmation d-none">
                        <div class="mb-4">
                            <h4 class="mb-3">Đường dẫn đã được gửi</h4>
                            <h6 class="text-white">Kiểm tra email của bạn</h6>
                        </div>
                        <div>
                            <a href="login.html">
                                <button type="submit" class="btn">Login Now</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 d-none d-md-block image-container"></div>
        </div>
    </div>


</body>

</html>
