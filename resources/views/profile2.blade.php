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

  <div class="page-banner overlay-dark bg-image" style="background-image: url({{ asset('main/image/bg_image_1.jpg') }});">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Thông tin tài khoản</li>
          </ol>
        </nav>
        
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->

  <div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Thông tin cá nhân</h1>


      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif




      <div class="container">







      <div class="container">
  <div class="row">
    <div class="col-md-2 mb-3 " style="border-right: 2px solid black;">
        <ul class="nav nav-pills flex-column" id="myTab" role="tablist" >
    <li class="nav-item">
    <a class="nav-link active" href="{{ route('themhoso') }}"   style="background-image: linear-gradient(to left, #4cf5bc 0%, #07d590 100%); color: #fff">Thêm hồ sơ</a>
  </li>
  <li class="nav-item" >
    <a class="nav-link"href="{{ route('profile2') }}" role="tab" aria-controls="home" aria-selected="false" style="    color: #07be94;
    background-color: #fff;
    border: 2px solid #4CF5BC;">Hồ sơ bệnh nhân</a>
  </li>
  <li class="nav-item" >
    <a class="nav-link" href="{{ route('profile') }}" role="tab" aria-controls="profile" aria-selected="false" >Thông tin cá nhân</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('profile3') }}" role="tab" aria-controls="contact" aria-selected="false" style="">Đơn khám bệnh</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="" role="tab" aria-controls="home" aria-selected="true" style="background-image: linear-gradient(to left, #4cf5bc 0%, #07d590 100%);">Trò chuyện</a>
  </li>
</ul>


    </div>


    




  





    <!-- /.col-md-4 -->
        <div class="col-md-10">
      <div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show" id="home" role="tabpanel" aria-labelledby="home-tab">

  <h2>Danh sách đơn đặt khám</h2>
  <button type="button" class="btn btn-primary" style="border-radius: 2rem ; border-width: 0px;background-image: linear-gradient(to left, #4cf5bc 0%, #07d590 100%);">Chờ duyệt</button>
  <button type="button" class="btn btn-primary" style="border-radius: 2rem ; border-width: 0px;background-image: linear-gradient(to left, #4cf5bc 0%, #07d590 100%);">Thanh toán</button>
  <button type="button" class="btn btn-primary" style="border-radius: 2rem ; border-width: 0px;background-image: linear-gradient(to left, #4cf5bc 0%, #07d590 100%);">Đã khám</button>
  <button type="button" class="btn btn-primary" style="border-radius: 2rem ; border-width: 0px;background-image: linear-gradient(to left, #4cf5bc 0%, #07d590 100%);">Đã hủy</button>


    <div class="container mt-5">

</div>

  </div>
  <div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
  <h2>Danh sách hồ sơ bệnh nhân</h2> @isset($patientRecords)
    @foreach ($patientRecords as $record)
    <div class="container mt-5">
   
      <div class="card">
          <div class="card-body">
          <p class="card-text">Mã: {{ $record->id_pr }}</p>

              <p class="card-text">Name: {{ $record->prname }}</p>
              <p class="card-text">Ngày sinh: {{ $record->birthday }}</p>
              <p class="card-text">Số điện thoại: {{ $record->phonenumber }}</p>
              <p class="card-text">Giới tính: {{ $record->gender == 'male' ? 'Nam' : ($record->gender == 'female' ? 'Nữ' : 'Khác') }}</p>
              <p class="card-text">Địa chỉ: {{ $record->address }}</p>
              <hr>
              <div class="d-flex justify-content-end">
              <button type="button" class="btn btn-primary mr-2 btn-edit" data-id="{{ $record->id_pr }}" data-name="{{ $record->prname }}" data-birthday="{{ $record->birthday }}" data-phone="{{ $record->phonenumber }}" data-gender="{{ $record->gender }}" data-address="{{ $record->address }}">Sửa hồ sơ</button>
              <button type="button" class="btn btn-danger ms-2 btn-delete" data-id="{{ $record->id_pr }}">Xóa hồ sơ</button>
                  </div>
          </div>
      </div>
    </div>
 @endforeach
    @endisset
   
 @isset($patientRecords)
    <div class="container-footer-kt">
            <nav aria-label="Page navigation example" class="ml-5 footer-kt">
                {{ $patientRecords->links('pagination::bootstrap-4') }}
            </nav>
        </div>
    @endisset


<!-- Modal xác nhận xóa -->
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="delete-form" action="{{ route('xoahs') }}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa hồ sơ bệnh nhân</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Bạn có chắc chắn muốn xóa hồ sơ này?</p>
          <input type="hidden" name="id_pr" id="delete-id">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
          <button type="submit" class="btn btn-danger">Xóa</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal sửa hồ sơ -->
<div class="modal fade" id="edit-profile-modal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="edit-form" action="{{ route('capnhaths') }}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="editProfileModalLabel">Sửa thông tin hồ sơ bệnh nhân</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id_pr" id="edit-id">
          <div class="form-group">
            <label for="edit-name">Tên</label>
            <input type="text" class="form-control" id="edit-name" name="prname" required>
          </div>
          <div class="form-group">
            <label for="edit-birthday">Ngày sinh</label>
            <input type="date" class="form-control" id="edit-birthday" name="birthday" required>
          </div>
          <div class="form-group">
            <label for="edit-phone">Số điện thoại</label>
            <input type="text" class="form-control" id="edit-phone" name="phonenumber" required>
          </div>
          <div class="form-group">
            <label for="edit-gender">Giới tính</label>
            <select class="form-control" id="edit-gender" name="gender" required>
              <option value="male">Nam</option>
              <option value="female">Nữ</option>
            </select>
          </div>
          <div class="form-group">
            <label for="edit-address">Địa chỉ</label>
            <input type="text" class="form-control" id="edit-address" name="address" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
          <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
        </div>
      </form>
    </div>
  </div>
</div>


</div>   
    </div>
    <!-- /.col-md-8 -->
  </div>
  
  
  
</div>









    </div>
  </div>


  <div class="page-section banner-home bg-image" style="background-image: url({{ asset('main/image/banner-pattern.svg') }});">
    <div class="container py-5 py-lg-0">
      <div class="row align-items-center">
        <div class="col-lg-4 wow animate__animated animate__zoomIn">
          <div class="img-banner d-none d-lg-block">
            <img src="{{ asset('main/image/mobile_app.png') }}" alt="">
          </div>
        </div>
        <div class="col-lg-8 wow animate__animated animate__fadeInRight">
          <h1 class="font-weight-normal mb-3">Get easy access of all features using One Health Application</h1>
          <a href="#"><img src="{{ asset('main/image/google_play.svg') }}" alt=""></a>
          <a href="#" class="ml-2"><img src="{{ asset('main/image/app_store.svg') }}" alt=""></a>
        </div>
      </div>
    </div>
  </div> <!-- .banner-home -->


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
    $('.btn-delete').on('click', function() {
      var id = $(this).data('id');
      $('#delete-id').val(id); // Thiết lập giá trị của input hidden
      $('#confirm-delete').modal('show'); // Hiển thị modal xác nhận
    });

    // Xử lý sau khi form được submit
    $('#delete-form').on('submit', function() {
      // Không cần thêm xử lý JavaScript ở đây nếu không sử dụng Ajax
    });
  });
</script>
<script>
  $(document).ready(function() {
    // Xử lý khi nhấn nút Sửa hồ sơ
    $('.btn-edit').on('click', function() {
      var id = $(this).data('id');
      var name = $(this).data('name');
      var birthday = $(this).data('birthday');
      var phone = $(this).data('phone');
      var gender = $(this).data('gender');
      var address = $(this).data('address');

      $('#edit-id').val(id);
      $('#edit-name').val(name);
      $('#edit-birthday').val(birthday);
      $('#edit-phone').val(phone);
      $('#edit-gender').val(gender);
      $('#edit-address').val(address);

      $('#edit-profile-modal').modal('show');
    });

    // Xử lý sau khi form sửa được submit
    $('#edit-form').on('submit', function() {
      // Không cần thêm xử lý JavaScript ở đây nếu không sử dụng Ajax
    });
  });
</script>
</body>
</html>