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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                <i class="fas fa-sign-out-alt"></i> Đăng xuất
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
            <li class="breadcrumb-item active" aria-current="page">Thông tin tài khoản</li>
          </ol>
        </nav>
        
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->

  <div class="page-section">
  <h2 style="margin-bottom:20px;" class="text-center wow fadeInUp"><b>Thông tin tài khoản</b></h2>

    <div class="container">


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
  <div class="row">
    <div class="col-md-3 mb-3 " style="border-right: 2px solid black;">
        <ul class="nav nav-pills flex-column" id="myTab" role="tablist" >
  
   <li class="nav-item" style="margin-bottom: 4px;">
    <a class="nav-link active" href="{{ route('themhoso') }}" style="background-image: linear-gradient(to left, #4cf5bc 0%, #07d590 100%); color: #fff"><i class="fas fa-user-plus"></i> <b>Thêm hồ sơ</b></a>
  </li>
  <li class="nav-item" style="margin-bottom: 4px;">
    <a class="nav-link"href="{{ route('profile2') }}" role="tab" aria-controls="home" aria-selected="false"  style="    color: #07be94;
    background-color: #fff;
    border: 2px solid #4CF5BC;"><i class="far fa-id-badge"></i> <b>Hồ sơ bệnh nhân</b></a>
  </li>
  <li class="nav-item" style="margin-bottom: 4px;">
    <a class="nav-link" href="{{ route('profile') }}" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-user-circle"></i> <b>Thông tin cá nhân</b></a>
  </li>
  <li class="nav-item"style="margin-bottom: 4px;">
    <a class="nav-link" href="{{ route('profile3') }}" role="tab" aria-controls="contact" aria-selected="false" style=""><i class="fas fa-file-medical"></i> <b>Đơn khám bệnh</b></a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="{{ route('trochuyenuser') }}" role="tab" aria-controls="home" aria-selected="true" style="color: #fff;background-image: linear-gradient(to left, #4cf5bc 0%, #07d590 100%);"><i class="fas fa-comments"></i> <b>Trò chuyện</b></a>
  </li>
</ul>


    </div>


    




  





    <!-- /.col-md-4 -->
        <div class="col-md-9">
      <div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show" id="home" role="tabpanel" aria-labelledby="home-tab">

  

    <div class="container mt-5">

</div>

  </div>
  <div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
  <h4><b>Danh sách hồ sơ bệnh nhân</b></h4> @isset($patientRecords)
    @foreach ($patientRecords as $record)
    <div class="container mt-3" >
   
      <div class="card"  style="border: 2px solid #28a745; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2); border-radius: 10px;">
          <div class="card-body">
              <p class="card-text"><i class="fas fa-user"></i> Tên bệnh nhân: <span style="color: #02c697 "><b>{{ $record->prname }}</b></span></p>
              <p class="card-text"><i class="fas fa-birthday-cake"></i> Ngày sinh: <b style="color: #005328"> {{ $record->birthday }} </b></p>
              <p class="card-text"><i class="fas fa-phone-alt"></i> Số điện thoại: <b style="color: #005328">{{ $record->phonenumber }}</b> </p>
              <p class="card-text"><i class="fas fa-venus-mars"></i> Giới tính: <b style="color: #005328">{{ $record->gender == 'male' ? 'Nam' : ($record->gender == 'female' ? 'Nữ' : 'Khác') }} </b></p>
              <p class="card-text"><i class="fas fa-map-marked-alt"></i> Địa chỉ: <b style="color: #005328">{{ $record->address }} </b></p>
              <hr>
              <div class="d-flex justify-content-end">
              <button type="button" class="btn btn-primary mr-2 btn-edit" data-id="{{ $record->id_pr }}" data-name="{{ $record->prname }}" data-birthday="{{ $record->birthday }}" data-phone="{{ $record->phonenumber }}" data-gender="{{ $record->gender }}" data-address="{{ $record->address }}"><i class="fas fa-edit"></i> Sửa hồ sơ</button>
              <button type="button" class="btn btn-danger ms-2 btn-delete" data-id="{{ $record->id_pr }}"><i class="fas fa-trash-alt"></i> Xóa hồ sơ</button>
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

</div>

  <footer class="page-footer" style=" margin-bottom: 0;
  padding-bottom: 0;">
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


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



<script src="{{ asset('main/theme.js') }}"></script>


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