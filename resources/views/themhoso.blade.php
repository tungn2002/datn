<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>One Health - Medical Center HTML5 Template</title>

  
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
    @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show alert-popup" role="alert" id="success-alert">
        <i class="fas fa-check-circle mr-1" style="color: #00FF00; font-size: 150%"></i>{{ Session::get('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif





    
  <!-- Back to top button -->
  <div class="back-to-top"></div>

  
  <header>
  <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-sm">
            <div class="site-info">
              <a href="#"><i class="fas fa-phone-alt text-primary mr-1"></i> +00 123 4455 6666</a>
              <span class="divider">|</span>
              <a href="#"> <i class="fas fa-envelope text-primary mr-1"></i> mail@example.com</a>
             
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
        <a class="navbar-brand" href="#"><span class="text-primary">One</span>-Health</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="doctors.html">Doctors</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="blog.html">News</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="contact.html">Contact</a>
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
                <a class="dropdown-item" href="{{ route('profile') }}">Thông tin tài khoản</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}">
                    Đăng xuất<i class="fas fa-sign-out-alt ml-1"></i>
                </a>
              
            </div>
        </li>
            @endguest


          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header>


  <form action="{{ url('addhoso') }}" method="post" style="  max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);"> 
                @csrf
                <h1>Thêm hồ sơ bệnh nhân</h1>
                <div class="row mb-3">
                    <label for="prname" class="col-sm-2 col-form-label">Tên bệnh nhân:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="prname" id="prname" value="{{ old('prname') }}"> 
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="birthday" class="col-sm-2 col-form-label">Ngày sinh:</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="birthday" id="birthday" value="{{ old('birthday') }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="phonenumber" class="col-sm-2 col-form-label">Số điện thoại:</label>
                    <div class="col-sm-10">
                        <input type="tel" class="form-control" name="phonenumber" id="phonenumber" value="{{ old('phonenumber') }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="gender" class="col-sm-2 col-form-label">Giới tính:</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="gender" id="gender">
                            <option value="male" >Nam</option>
                            <option value="female">Nữ</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="address" class="col-sm-2 col-form-label">Địa chỉ:</label>
                    <div class="col-sm-10">
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
          <h5>Company</h5>
          <ul class="footer-menu">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Career</a></li>
            <li><a href="#">Editorial Team</a></li>
            <li><a href="#">Protection</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>More</h5>
          <ul class="footer-menu">
            <li><a href="#">Terms & Condition</a></li>
            <li><a href="#">Privacy</a></li>
            <li><a href="#">Advertise</a></li>
            <li><a href="#">Join as Doctors</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Our partner</h5>
          <ul class="footer-menu">
            <li><a href="#">One-Fitness</a></li>
            <li><a href="#">One-Drugs</a></li>
            <li><a href="#">One-Live</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Contact</h5>
          <p class="footer-link mt-2">351 Willow Street Franklin, MA 02038</p>
          <a href="#" class="footer-link">701-573-7582</a>
          <a href="#" class="footer-link">healthcare@temporary.net</a>

          <h5 class="mt-3">Social Media</h5>
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

      <p id="copyright">Copyright &copy; 2020 <a href="https://macodeid.com/" target="_blank">MACode ID</a>. All right reserved</p>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>

<script src="{{ asset('main/google-maps.js') }}"></script>

<script src="{{ asset('main/theme.js') }}"></script>


<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIA_zqjFMsJM_sxP9-6Pde5vVCTyJmUHM&callback=initMap"></script>
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