
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Bác sĩ</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">


    <!-- Favicon -->

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('ad/style.css') }}" rel="stylesheet">
</head>

<body>
    
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border: 1px solid rgba(0, 0, 0, 0.1);">
            <nav class="navbar bg-light navbar-light" >
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fas fa-user-nurse"></i> Bác sĩ</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4" >
                    
                </div>
                <div class="navbar-nav w-100" >
                    <a href="{{ route('doctor') }}" class="nav-item nav-link active"><i class="far fa-id-card"></i>Thông tin cá nhân</a>
                    <a href="{{ route('lichlamviec') }}" class="nav-item nav-link"><i class="fas fa-calendar-alt"></i>Lịch làm việc</a>
                    <a href="{{ route('trochuyendoctor') }}" class="nav-item nav-link "><i class="fas fa-comment-dots"></i>Trò chuyện</a>
                

                  
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border: 1px solid rgba(0, 0, 0, 0.1);">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
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
                            <a href="{{ route('logout') }}" class="dropdown-item">Đăng xuất</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <!-- Blank Start -->

            <div class="container-fluid pt-4 px-4 ">
            <h4>Thông tin bác sĩ:</h4>
            
            <div class="col-sm-12 col-xl-6" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-right: 3px solid rgba(0, 0, 0, 0.1); border-left: 3px solid lightblue; border-top: 3px solid lightblue; border-bottom: 1px solid lightblue; padding: 20px; border-radius: 10px;width: 50em">
                    <p><i class="fas fa-user"></i> Tên: {{ Auth::user()->name }}</p>
                    <p><i class="fas fa-envelope"></i> Email: {{ Auth::user()->email }}</p>
                    <p><i class="fas fa-phone-alt"></i> Số điện thoại: {{ Auth::user()->phonenumber }}</p>
                    <p><i class="fas fa-stethoscope"></i> Mã chuyên khoa: {{ Auth::user()->id_specialist }}</p>
                    <p><i class="far fa-image"></i> Ảnh đại diện và chữ ký:</p>
                    <div class="image-container">
                    <img style="height: 150px;width: 150px" src="{{ asset('image/' . Auth::user()->avatar) }}" alt="Left Image" class="left-image">
                    <img style="height: 100px;width: 100px" src="{{ asset('image/' . Auth::user()->signature) }}" alt="Right Image" class="right-image">
                    </div>
                    <p><i class="far fa-calendar-check"></i> Thời gian khung giờ làm việc:</p>
                    <p>{!! nl2br(Auth::user()->working_hours) !!}</p>
            </div>

            <div class="col-sm-12 col-xl-6 mt-4" style=" box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-right: 3px solid rgba(0, 0, 0, 0.1); border-left: 3px solid lightblue; border-top: 3px solid lightblue; border-bottom: 1px solid lightblue; padding: 20px; border-radius: 10px;width: 50em">
                <p>Cập nhật khung giờ làm việc </p>  
                <form id="editForm" action="{{ route('updatewh') }}"  method="POST" >
                @csrf
                
                <div class="mb-3">
                        <label for="hospitalname" class="form-label">Khung giờ làm việc:</label>
                        <textarea class="form-control"  id="detailz" name="wh" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật khung giờ</button>
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
        </div>

        <h4 class="mt-4">Tra cứu thuốc:</h4>
        <div class="row mt-5" style="width: 40%">
                    <form action="{{ route('findthuoc') }}" class="w-100 d-flex" >
    <div class="col-md-8">
        <input type="text" class="form-control" name="dl" placeholder="Nhập từ khóa...">
    </div>
    <div class="col-md-4">
        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Tìm kiếm</button>
    </div>   
    <div class="col-md-4">
        <a class="btn btn-primary" href="{{ route('doctor') }}">Tất cả</a>
    </div>   
</form>
</div>

        <table class="table table-striped custab mt-4 table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên thuốc</th>
            <th>Chi tiết</th>
            <th>Thành phần</th>
        </tr>
    </thead>
    @isset($medicine)
                            @foreach ($medicine as $item)
                            <tr>
                                <td>{{$item->id_medicine}}</td>
                                <td >{{$item->medicinename}}</td>
                                <td class=" text-wrap">{{ $item->detail}}</td>
                                <td>{{$item->ingredient}}</td>

                            
                            </tr>
                         
                            @endforeach
                        @endisset

         

    </table>
    @isset($medicine)
    <div class="container-footer-kt">
            <nav aria-label="Page navigation example" class="ml-5 footer-kt">
                {{ $medicine->withQueryString()->links('pagination::bootstrap-4') }}
            </nav>
        </div>
    @endisset
            </div>
            <!-- Blank End -->
        </div>
      
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.45/moment-timezone.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('ad/main.js') }}"></script>
<script>
  $(document).ready(function() {
    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Nút "Xóa" được click
        var hospitalId = button.data('id'); // Lấy ID từ data-id của nút

        var modal = $(this);
        modal.find('#hospitalIdInput').val(hospitalId); // Điền ID vào input

        // Cập nhật action của form
        var form = modal.find('#deleteForm');
        form.attr('action', form.attr('action').replace(':hospitalId', hospitalId)); 
    });
});


$('.btn-edit').click(function() {
    var hospitalId = $(this).data('id');
    var row = $(this).closest('tr'); // Lấy hàng chứa nút "Sửa"

    // Lấy dữ liệu từ các ô trong hàng
    var hospitalName = row.find('td:eq(1)').text(); // Ô thứ 2 chứa tên bệnh viện
    var address = row.find('td:eq(2)').text(); // Ô thứ 3 chứa địa chỉ

    // Điền dữ liệu vào form
    $('#editHospitalId').val(hospitalId);
    $('#hospitalname').val(hospitalName);
    $('#address').val(address);
    $('#editForm').attr('action', '{{ url("capnhathos") }}/id=' + hospitalId); 

});
</script>

</body>

</html>
