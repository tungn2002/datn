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
				<div class="col-lg-8 col-md-12 col-sm-9 col-xs-12 form-box text-center">
					<div class="logo mt-5 mb-3">
						<img src="{{ asset('image/logo.png') }}" width="150px">
					</div>
					<div class="heading mb-3">
						<h4>Nhập tài khoản để đăng nhập</h4>
					</div>
					<form action="{{ url('dangnhap') }}" method="post">@csrf
						<div class="form-input">
							<span><i class="fa fa-envelope"></i></span>
							<input type="email" name="email" placeholder="Email" required>
						</div>
						<div class="form-input">
							<span><i class="fa fa-lock"></i></span>
							<input type="password" name="password" placeholder="Mật khẩu" required>
						</div>
						<div class="row mb-3">
							<div class="col-6 d-flex">
								<div class="custom-control custom-checkbox">
									
								</div>
							</div>
							<div class="col-6 text-right">
								<a href="{{ route('forget') }}" class="forget-link">Quên mật khẩu</a>
							</div>
						</div>

						<div class="mb-3"><button type="submit" class="btn">Đăng nhập</button></div>
					
						<div>Chưa có tài khoản?
							<a href="{{ route('register') }}" class="register-link">Đăng ký</a>

						</div>
					</form>
					@if (\Session::has('message'))
                        <div class="alert alert-success">
                        <strong>{!! \Session::get('message') !!}</strong>
                        </div>
                    @endif
					@if (\Session::has('message2'))
                        <div class="alert alert-danger">
                        <strong>{!! \Session::get('message2') !!}</strong>
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
			</div>

			<div class="col-lg-6 col-md-6 d-none d-md-block image-container"></div>
		</div>
	</div>
</body>
</html>