<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Trang chủ</title>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<link href="{{ asset('main/theme.css') }}" rel="stylesheet">

</head>
<body>
  
  

  <header>
    <div class="topbar" id="hed">
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
        <a class="navbar-brand" href="{{ route('trangchu') }}"><span class="text-primary">Bệnh viện</span></a>

      
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
            <a class="btn btn-primary ml-lg-3 dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

  <div class="page-hero bg-image overlay-dark" style="background-image: url({{ asset('main/image/bg_image_1.jpg') }});">
    <div class="hero-section">
      <div class="container text-center ">
        <h3 class="mb-3"><span class="subhead ">Website đặt lịch khám bệnh và kê đơn thuốc</span> </h3>

        <div style="height: 50px"></div>

    
        <a class="mr-4" href="{{ route('servicef') }}" style=" border:2px solid #00CC00;  text-decoration: none; display: inline-block; width: 160px; height: 160px; background-color: #f0f0f0; text-align: center; line-height: 50px; border-radius: 8px;">
          <img src="{{ asset('dat.png') }}" class="pt-2 pl-3" alt="" style="height: 60%; width: 60%">
          <p style="color: #006633	">Đặt lịch khám </p>
        </a>

        @guest
        <a href="{{ route('login') }}" style="   border:2px solid #00CC00;  text-decoration: none; display: inline-block; width: 160px; height: 160px; background-color: #f0f0f0; text-align: center; line-height: 50px; border-radius: 8px;">
          <img src="{{ asset('medicine.png') }}" class="pt-2 pl-3" alt="" style="height: 60%; width: 60%">
          <p style="color: #006633	">Tư vấn kê đơn thuốc </p>
        </a>
        @else
        <a href="{{ route('trochuyenuser') }}" style=" border:2px solid #00CC00;   text-decoration: none; display: inline-block; width: 160px; height: 160px; background-color: #f0f0f0; text-align: center; line-height: 50px; border-radius: 8px;">
          <img src="{{ asset('medicine.png') }}" class="pt-2 pl-3" alt="" style="height: 60%; width: 60%">
          <p  style="color: #006633	">Tư vấn kê đơn thuốc </p>
        </a>
        @endguest

      </div>
    </div>
  </div>


  <div class="bg-light">
    <div class="page-section py-3 mt-md-n5 custom-index">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-4 py-3 py-md-0">
            <div class="card-service">
              <div class="circle-shape bg-secondary text-white">
                <i class="fas fa-comments"></i>              </div>
              <p><span>Trò chuyện</span> với bác sĩ</p>
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card-service ">
              <div class="circle-shape bg-primary text-white">
                <i class="fas fa-check-square"></i>
              </div>
              <p><span>Chữa</span> trị </p>
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card-service ">
              <div class="circle-shape bg-accent text-white">
              <i class="fas fa-briefcase-medical"></i>
              </div>
              <p><span>Khám</span> bệnh</p>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- .page-section -->

    <div class="page-section pb-0" id="inf">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 py-3 ">
            <h1> <b style="color: #00D9A5"> Đặt khám nhanh</b><br> </h1>
            <p class="text-grey mb-4">Chào mừng đến với dịch vụ đặt lịch khám và kê đơn thuốc trực tuyến! Với nền tảng này, việc bệnh nhân có thể dễ dàng đặt lịch hẹn khám và nhận đơn thuốc một cách tiện lợi và nhanh chóng, mà không cần phải trải qua nhiều thủ tục. Bạn có thể tự do chọn lịch khám phù hợp với thời gian của mình và tiếp nhận dịch vụ chuyên nghiệp từ các chuyên gia y tế. Hãy trải nghiệm và cảm nhận sự thuận tiện mà nền tảng của chúng tôi mang lại, giúp bạn quản lý sức khỏe một cách hiệu quả và đơn giản hơn bao giờ hết.</p>
          </div>
          <div class="col-lg-6" data-wow-delay="400ms">
            <div class="img-place custom-img-1">
              <img src="{{ asset('main/image/bg-doctor.png') }}" alt="">
            </div>
          </div>
        </div>
      </div>
    </div> <!-- .bg-light -->
  </div> <!-- .bg-light -->

 
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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script src="{{ asset('main/theme.js') }}"></script>

@if(Session::has('message'))
<script>
toastr.options={
  "progressBar": true,
  "closeButton": true
};
toastr.success("{{Session::get('message')}}",'Thành công!')
</script>
@endif
</body>
</html>