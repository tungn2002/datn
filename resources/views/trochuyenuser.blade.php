<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">


  <title>Trò chuyện</title>

  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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

<style>
        .card-custom {
            width: 220px;
            height: 270px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .card-custom img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
        }
        .card-custom h5, .card-custom p {
        margin: 0;
    }
    .card-custom form {
        margin-top: auto;
        width: 100%;
    }
    .card-custom .btn {
        width: 100%;
    }
    </style>
</head>
<body>
  
  
  <header>
  <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-sm">
            <div class="site-info">
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

  <div class="page-banner overlay-dark bg-image" style="height: 200px;background-image: url({{ asset('main/image/bg_image_1.jpg') }});">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
          <li class="breadcrumb-item"><a href="{{ route('trangchu') }}">Trang chủ</a></li>
          <li class="breadcrumb-item active" aria-current="page">Trò chuyện</li>
          
          </ol>
        </nav>
        
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->

  <div class="page-section">
    <div class="container">
      <h2 class="text-center wow fadeInUp">Trò chuyện với bác sĩ và nhân viên </h2>
              @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif











        
   <h4> <b> Nhân viên: </b></h4>
   <div class="row d-flex align-items-stretch" style="display: flex; flex-wrap: nowrap; overflow-x: auto;">


        
          
                  @isset($nv)
                            @foreach ($nv as $item)
                
            <div class="col" style="padding-left:100px">
    <div class="card-custom m-2 d-flex flex-column">
    <img src="{{ asset('anhnv.png') }}" alt="Avatar">
        <h5 class="mt-3" style="font-size: 16px;font-weight: bold;">{{$item->name}}</h5>
        <a href="{{ route('chatuser', ['id' => $item->id_user]) }}" class="btn btn-primary mt-auto">Trò chuyện</a>
    </div>
</div>
                            @endforeach
                        @endisset
       
    </div>

<hr>
    <h4> <b> Bác sĩ : </b></h4>
            <div class="row mt-5" style="width: 400px">
                    <form action="{{ route('finddoctorchat') }}" class="w-100 d-flex">
    <div class="col-md-8">
        <input type="text" class="form-control" name="dl" placeholder="Nhập tên bác sĩ...">
    </div>
    <div class="col-md-4">
        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
    </div>   
    <div class="col-md-4">
        <a class="btn btn-primary" href="{{ route('trochuyenuser') }}">Tất cả</a>
    </div>   
</form>
</div>

    <div class="row d-flex align-items-stretch">

                  
                       @isset($chuachat)
                            @foreach ($chuachat as $item)
                        

                            <div class="col" style="padding-left:100px">
    <div class="card-custom m-2 d-flex flex-column">
        <img src="{{ asset('image/' . $item->avatar) }}" alt="Avatar">
        <h5 class="mt-3" style="font-size: 16px;font-weight: bold;">{{$item->name}}</h5>
        <p>Chuyên khoa: {{$item->spname}}</p>
        <p>Giá: {{$item->price}} đ</p>
        <form action="{{ route('online-checkout') }}" method="post" class="w-100">
            @csrf
            <input type="text" name="id" value="{{$item->id_user}}" hidden>
            <button type="submit" class="btn btn-primary w-100 mt-2">Thanh toán</button>
        </form>
    </div>
</div>

        
                            @endforeach
                        @endisset

       

        
    </div>
                        @isset($chuachat)

    <div class="container-footer-kt" style="padding-top: 40px;">
            <nav aria-label="Page navigation example" class="ml-5 footer-kt">
                {{ $chuachat->withQueryString()->links('pagination::bootstrap-4') }}
            </nav>
        </div>
    @endisset
    <hr>
    <h4> <b> Bác sĩ có thể trò chuyện : </b></h4>

    <div class="row d-flex align-items-stretch" style="display: flex; flex-wrap: nowrap; overflow-x: auto;">
    @isset($dachat)
        @foreach ($dachat as $item)
            

            <div class="col" style="padding-left:100px">
    <div class="card-custom m-2 d-flex flex-column">
        <img src="{{ asset('image/' . $item->avatar) }}" alt="Avatar">
        <h5 class="mt-3" style="font-size: 16px;font-weight: bold;">{{$item->name}}</h5>
        <p>Chuyên khoa: {{$item->spname}}</p>
        <a href="{{ route('chatuser2', ['id' => $item->id_user]) }}" class="btn btn-primary mt-auto">Trò chuyện</a>
    </div>
</div>
        @endforeach
    @endisset
</div>


</div>





    <!-- /.col-md-4 -->
        <div class="col-md-10">
  <div class="tab-pane fades show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">


</div>   
    </div>
    <!-- /.col-md-8 -->
  </div>
  
  
  
</div>









    </div>
  </div>


 
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



<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="{{ asset('main/google-maps.js') }}"></script>

<script src="{{ asset('main/theme.js') }}"></script>


<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIA_zqjFMsJM_sxP9-6Pde5vVCTyJmUHM&callback=initMap"></script>
 

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