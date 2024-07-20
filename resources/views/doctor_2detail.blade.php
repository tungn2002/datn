
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Bác sĩ</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">


    <!-- Favicon -->

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

   
    <!-- Customized Bootstrap Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('ad/style.css') }}" rel="stylesheet">


    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <style>
  .ui-datepicker-calendar td {
    border: 1px solid #ddd; /* Add borders to cells */
    padding: 5px; /* Add padding for spacing */
  }

    .marked-day {
      background-color: #ff9900;
    }

    .ui-datepicker-calendar .ui-datepicker-other-month .ui-state-disabled {
      display: none; /* Hide days from other months */
    }
  </style>

</head>

<body>
    

<div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border: 1px solid rgba(0, 0, 0, 0.1);">
            <nav class="navbar bg-light navbar-light" >
                <a href="{{ route('doctor') }}" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fas fa-user-nurse"></i> Bác sĩ</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4" >
                    
                </div>
                <div class="navbar-nav w-100" >
                    <a href="{{ route('doctor') }}" class="nav-item nav-link"><i class="far fa-id-card"></i>Thông tin cá nhân</a>
                    <a href="{{ route('lichlamviec') }}" class="nav-item nav-link active"><i class="fas fa-calendar-alt"></i>Lịch làm việc</a>
                    <a href="{{ route('trochuyendoctor') }}" class="nav-item nav-link "><i class="fas fa-comment-dots"></i>Trò chuyện</a>
                

                  
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border: 1px solid rgba(0, 0, 0, 0.1);">
            <a href="{{ route('doctor') }}" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fas fa-user-nurse"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
              
                <div class="navbar-nav align-items-center ms-auto">
                   
                   
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2"src="{{ asset('image/' . Auth::user()->avatar) }}" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">  {{ Auth::user()->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="{{ route('logout') }}" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->
            <!-- Blank Start -->

            <div class="container-fluid pt-4 px-4 ">
            <h4>Thông tin bệnh nhân</h4>

            <div class="container mt-5">
            <div class="custom-div" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-right: 3px solid rgba(0, 0, 0, 0.1); border-left: 3px solid lightblue; border-top: 3px solid lightblue; border-bottom: 1px solid lightblue; padding: 20px; border-radius: 10px;">
            <p><h4 style="color: #33CCFF	;"><i class="fas fa-user"></i> Bệnh nhân: {{$patientRecords->prname}}</h4></p>
    <p><i class="fas fa-birthday-cake"></i> Ngày sinh: <b style="color: #003553">{{$patientRecords->birthday}}</b></p>
    <p><i class="fas fa-phone-alt"></i> Số điện thoại: <b style="color: #003553">{{$patientRecords->phonenumber}}</b></p>
    <p><i class="fas fa-venus-mars"></i> Giới tính: <b style="color: #003553">{{ $patientRecords->gender == 'male' ? 'Nam' : ($patientRecords->gender == 'female' ? 'Nữ' : 'Khác') }}</b></p>
    <p><i class="fas fa-map-marked-alt"></i> Địa chỉ: <b style="color: #003553">{{$patientRecords->address}}</b></p>
    <hr style=" border-top: 1px dashed black">

    <p><i class="fas fa-comment-medical"></i> Lý do khám: {{$patientRecords->reason}}</p>
</div>


@isset($updatekq)
<div class="custom-div mt-4" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-right: 3px solid rgba(0, 0, 0, 0.1); border-left: 3px solid lightblue; border-top: 3px solid lightblue; border-bottom: 1px solid lightblue; padding: 20px; border-radius: 10px;">
<h4 style="color: #33CCFF	;">Kết quả: </h4>
<p>{{$updatekq->detail}}</p>
@if($updatekq->image != null)

<img class="img-fluid" style="border:2px solid #33CCFF; width: 400px; height: auto;"  src="{{ asset('image/' . $updatekq->image) }}" alt="">

@else
@endif
</div>
<div class="custom-div mt-4" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-right: 3px solid rgba(0, 0, 0, 0.1); border-left: 3px solid lightblue; border-top: 3px solid lightblue; border-bottom: 1px solid lightblue; padding: 20px; border-radius: 10px;">
<h4 style="color: #33CCFF	;">Viết kết quả:</h4>
<form  action="{{ url('capnhatkq/'.$updatekq->id_result) }}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Kết quả: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="detail" id="inputEmail3">
            </div>
        </div>
        <div class="row mb-3 mt-4">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Ảnh khám: </label>
            <div class="col-sm-10">
            <input type="file" name="image" id="image">
            </div>
        </div>
        <div class="d-flex justify-content-end">

        <button type="submit" style="margin-right:20px;" class="btn btn-primary"><i class="far fa-edit"></i> Cập nhật</button>
        @isset($dk)
<a href="{{ route('themdonthuoc', ['id' => $dk]) }}" class="btn btn-primary"><i class="fas fa-first-aid"></i> Đơn thuốc </a>

@endisset
        </div>
</div>
@endisset
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

<div style="height: 100px;"></div>
</div>
                    
            </div>
            <!-- Blank End -->


   
        </div>
        <!-- Content End -->
  





    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!-- Template Javascript -->
    <script src="{{ asset('ad/main.js') }}"></script>

</body>

</html>
