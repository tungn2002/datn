<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">


  <title>Hồ sơ bệnh nhân</title>

  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

	<link href="{{ asset('main/theme.css') }}" rel="stylesheet">
  <style>
        /* Custom CSS để ghi đè Bootstrap */
        .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
            color:#07be94;
            background-color: #fff; /* Màu sắc bạn muốn thay đổi */
            border: 2px solid #4CF5BC;
        }

        .custom-div {
            border: 1px solid silver;
            border-radius: 10px;
            box-shadow: 3px 3px 5px lightgray;
            padding: 20px;
        }
        


    
    </style>
<style>
    .alert-popup {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 1050; /* Ensure it's above other elements */
        background-color:#fff;
        border-left: 4px solid #00FF00;

        display: grid; /* Kích hoạt grid */
    grid-template-columns: auto 1fr; /* Chia thành 2 cột: icon tự động, chữ chiếm phần còn lại */
    align-items: center; /* Căn giữa theo chiều dọc */
    gap: 10px; /* Khoảng cách giữa icon và chữ */
    }
</style>


</head>
<body>

  <header>
  <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-sm">
          <div class="site-info" >
              <a href="#"style="color: #000000"><i class="fas fa-phone-alt text-primary mr-1"></i> 0969128038</a>
              <span class="divider">|</span>
              <a href="#" style="color: #000000"> <i class="fas fa-envelope text-primary mr-1"></i> lmtung2002@gmail.com</a>
             
            </div>
          </div>
          <div class="col-sm-4 text-right text-sm">
            <div class="social-mini-button">
              <a href="#"><i class="fab fa-facebook-f"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-dribbble"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
          </div>
        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
      <a class="navbar-brand" href="{{ route('trangchu') }}" style="padding:0px;margin:0px;"><img src="{{ asset('logo.png') }}" width="45px" style="margin-bottom:5px;"><span class="text-primary"> Bệnh viện</span></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
          <li class="nav-item">
              <a class="nav-link" href="{{ route('trangchu') }}"style="color: #000000">Trang chủ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('servicef') }}"style="color: #000000">Dịch vụ</a>
            </li>
            @guest
                <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}"style="color: #000000">Tư vấn</a>
            </li>

            @else
            <li class="nav-item">
              <a class="nav-link" href="{{ route('trochuyenuser') }}"style="color: #000000">Tư vấn</a>
            </li>
            @endguest
            <li class="nav-item">
              <a class="nav-link" href="#inf" style="color: #000000">Thông tin</a>
            </li>
            @guest
            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="{{ route('login') }}">Đăng nhập / đăng ký</a>
            </li>
            @else
            <li class="nav-item dropdown">
            <a class="btn btn-primary ml-lg-3 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('profile') }}"><i class="far fa-user"></i> Thông tin tài khoản</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}">
                <i class="fas fa-sign-out-alt"></i>Đăng xuất
                </a>
              
            </div>
        </li>
            @endguest


          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header>


  <form action="{{ url('addhoso') }}" method="post" style="  max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);"> 
                @csrf
                <h3>Thêm hồ sơ bệnh nhân</h3>
                <div class="row mb-3">
                    <label for="prname" class="col-sm-3 col-form-label">Tên bệnh nhân:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="prname" id="prname" value="{{ old('prname') }}"> 
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="birthday" class="col-sm-3 col-form-label">Ngày sinh:</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" name="birthday" id="birthday" value="{{ old('birthday') }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="phonenumber" class="col-sm-3 col-form-label">Số điện thoại:</label>
                    <div class="col-sm-9">
                        <input type="tel" class="form-control" name="phonenumber" id="phonenumber" value="{{ old('phonenumber') }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="gender" class="col-sm-3 col-form-label">Giới tính:</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="gender" id="gender">
                            <option value="male" >Nam</option>
                            <option value="female">Nữ</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="address" class="col-sm-3 col-form-label">Địa chỉ:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="address" id="address" value="{{ old('address') }}">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Thêm</button>
            </form>
                            @if (\Session::has('message'))
                        <div class="alert alert-success">
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


<footer class="page-footer">
    <div class="container">
      <div class="row px-md-3">
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Dịch vụ y tế</h5>
          <ul class="footer-menu">
            <li><a href="#hed">Đặt lịch khám</a></li>
            <li><a href="#hed">Tư vấn kê đơn thuốc</a></li>
            <li><a href="#hed">Hỗ trợ khách hàng</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Khác</h5>
          <ul class="footer-menu">
            <li><a href="#inf">Thông tin</a></li>
         
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Tuyển dụng</h5>
          <ul class="footer-menu">
            
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Liên hệ</h5>
          <a href="#" class="footer-link">0969128038</a>
          <a href="#" class="footer-link">lmtung2002@gmail.com</a>

          <div class="footer-sosmed mt-3">
            <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="#" target="_blank"><i class="fab fa-google-plus-g"></i></a>
            <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="#" target="_blank"><i class="fab fa-linkedin"></i></a>
          </div>
        </div>
      </div>

      <hr>
   
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>


<script src="{{ asset('main/theme.js') }}"></script>


  <script>
   $(document).ready(function() {
  $('.dropdown-menu a').click(function(e) {
    e.preventDefault(); // Ngăn chặn hành vi mặc định của liên kết (chuyển hướng trang)

    // Xóa class 'active' khỏi tất cả các mục trong dropdown
    $('.dropdown-menu a').removeClass('active');

    // Thêm class 'active' vào mục được click
    $(this).addClass('active');

    // Cập nhật nội dung của nút dropdown
    $('#dropdownMenuButton').text($(this).text());

    // Ẩn dropdown sau khi chọn (để tiết kiệm không gian trên mobile)
    $('.dropdown').removeClass('show');
    $('.dropdown-menu').removeClass('show');

    // Lấy id của tab tương ứng từ thuộc tính href của liên kết
    var targetTab = $(this).attr('href');

    // Ẩn tất cả các tab
    $('.tab-content .tab-pane').removeClass('active show');

    // Hiển thị tab được chọn
    $(targetTab).addClass('active show');
  });
});



</body>
</html>