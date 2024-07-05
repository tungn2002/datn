
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

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
                    <h3 class="text-primary"></i>ADMIN</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4" >
                    <div class="position-relative">
                        <img class="rounded-circle" src="{{ asset('ad/img/user.jpg') }}" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Jhon Doe</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100" >
                    <a href="index.html" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                  
                    <a href="{{ route('hospital-index') }}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Bệnh viện</a>
                    <a href="{{ route('specialist-index') }}" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Chuyên khoa</a>
                    <a href="{{ route('service-index') }}" class="nav-item nav-link active"><i class="fa fa-th me-2"></i>Dịch vụ</a>
                    <a href="{{ route('clinic-index') }}" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Phòng khám</a>
                    <a href="{{ route('medicine-index') }}" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Thuốc</a>
                    <a href="{{ route('pre-index') }}" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Đơn</a>
                    <a href="{{ route('app-index') }}" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Lịch khám</a>
                    <a href="{{ route('pr-index') }}" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Hồ sơ bệnh nhân</a>
                    <a href="{{ route('mr-index') }}" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Kết quả khám</a>
                    <a href="{{ route('hospital-index') }}" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Trò chuyện</a>
                    <a href="{{ route('hospital-index') }}" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Tin nhắn</a>

                    <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="signin.html" class="dropdown-item">Sign In</a>
                            <a href="signup.html" class="dropdown-item">Sign Up</a>
                            <a href="404.html" class="dropdown-item">404 Error</a>
                            <a href="blank.html" class="dropdown-item">Blank Page</a>
                        </div>
                    </div>
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
                            <img class="rounded-circle me-lg-2" src="{{ asset('ad/img/user.jpg') }}" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">  {{ Auth::user()->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">Thông tin</a>
                            <a href="{{ route('logout') }}" class="dropdown-item">Đăng xuất</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <!-- Blank Start -->

            <div class="container-fluid pt-4 px-4 ">
            <h4>Quản lý nhân viên </h4>

                <h1></h1>
            <div class="col-sm-12 col-xl-6"  style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; width: 50em">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Horizontal Form</h6>
                            <form  action="{{ url('addqlnhanvien') }}" method="post" enctype="multipart/form-data">
                            @csrf

                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Tên nhân viên</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" id="inputEmail3">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="email" id="inputEmail3">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Mật khẩu</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password" id="inputEmail3">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Số điện thoại</label>
                                    <div class="col-sm-10">
                                        <input type="tel" class="form-control" name="phonenumber" id="inputEmail3">
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
                        </div>
                    </div>
            </div>
            <!-- Blank End -->

            <div class="row mt-5" style="width: 40%">
                    <form action="{{ route('findnhanvien') }}" class="w-100 d-flex" method="post">@csrf
    <div class="col-md-8">
        <input type="text" class="form-control" name="dl" placeholder="Nhập từ khóa...">
    </div>
    <div class="col-md-4">
        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Tìm kiếm</button>
    </div>   
    <div class="col-md-4">
        <a class="btn btn-primary" href="{{ route('qlnhanvien') }}">Tất cả</a>
    </div>   
</form>
</div>
            <table class="table table-striped custab mt-4 table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th class="text-center">Tùy chọn</th>
        </tr>
    </thead>
    
    @isset($user)
                            @foreach ($user as $item)
                            <tr>
                                <td>{{$item->id_user}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->phonenumber}}</td>
                          
                                <td class="text-center">       
                                <button class="btn btn-warning btn-edit" data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{ $item->id_user }}">Sửa</button> 
                                    <button class="btn btn-danger btn-delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{$item->id_user}}">Xóa</button>
                                </td>
                            </tr>
                         
                            @endforeach
                        @endisset

         

    </table>
    @isset($user)
    <div class="container-footer-kt">
            <nav aria-label="Page navigation example" class="ml-5 footer-kt">
                {{ $user->links('pagination::bootstrap-4') }}
            </nav>
        </div>
    @endisset
        </div>
        <!-- Content End -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('xoaqlkhachhang') }}" id="deleteForm"> 
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Xác nhận xóa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn xóa khách hàng này?
                    <input type="hidden" name="id_user" id="hospitalIdInput">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Không</button>
                    <button type="submit" class="btn btn-danger">Có, xóa!</button> </div>
            </div>
        </form>
    </div>
</div>


<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Sửa Thông Tin nhân viên</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" action=""  method="POST" enctype="multipart/form-data">
                @csrf

                    <div class="mb-3">
                        <label for="hospitalname" class="form-label">Tên</label>
                        <input type="text" class="form-control" id="hospitalname" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="hospitalname" class="form-label">Mật khẩu</label>
                        <input type="password" class="form-control" id="" name="password">

                    </div>
                    <div class="mb-3">
                        <label for="hospitalname" class="form-label">email</label>
                        <input type="text" class="form-control" id="detail" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="hospitalname" class="form-label">Số điện thoại</label>
                        <input type="tel" class="form-control" id="price" name="phonenumber">
                    </div>

                
                    <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <button type="submit" class="btn btn-primary" id="btnUpdate">Lưu Thay Đổi</button>
            </div>
                </form>
            </div>
           
        </div>
    </div>
</div>
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
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
    var detail = row.find('td:eq(2)').text(); // Ô thứ 3 chứa địa chỉ
    var price= row.find('td:eq(3)').text(); 


    // Điền dữ liệu vào form
    $('#editHospitalId').val(hospitalId);
    $('#hospitalname').val(hospitalName);
    $('#detail').val(detail);
    $('#price').val(price);



    $('#editForm').attr('action', '{{ url("capnhatqlkhachhang") }}/id=' + hospitalId); 

});
</script>

</body>

</html>
