<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin</title>
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
                <a href="{{ route('admin1') }}" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fas fa-user-cog"></i> ADMIN</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4" >
               
                </div>
                <div class="navbar-nav w-100" >
                    <a href="{{ route('admin1') }}" class="nav-item nav-link "><i class="fa fa-tachometer-alt"></i>Thông tin cá nhân</a>
                  
                    <a href="{{ route('hospital-index') }}" class="nav-item nav-link"><i class="fas fa-hospital"></i>Bệnh viện</a>
                    <a href="{{ route('specialist-index') }}" class="nav-item nav-link"><i class="fas fa-brain"></i>Chuyên khoa</a>
                    <a href="{{ route('service-index') }}" class="nav-item nav-link"><i class="fas fa-laptop-medical"></i>Dịch vụ</a>
                    <a href="{{ route('medicine-index') }}" class="nav-item nav-link"><i class="fas fa-capsules"></i>Thuốc</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt"></i>Người dùng</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ route('qldoctor') }}" class="dropdown-item"><i class="fas fa-user-md"></i> Bác sĩ</a>
                            <a href="{{ route('qlnhanvien') }}" class="dropdown-item"><i class="fas fa-users-cog"></i> Nhân viên</a>
                            <a href="{{ route('qlkhachhang') }}" class="dropdown-item"><i class="fas fa-user"></i> Khách hàng</a>
                        </div>
                    </div>
                    <a href="{{ route('clinic-index') }}" class="nav-item nav-link"><i class="fas fa-clinic-medical"></i>Phòng khám</a>
                    <a href="{{ route('pre-index') }}" class="nav-item nav-link"><i class="fas fa-prescription-bottle"></i>Đơn thuốc</a>
                    <a href="{{ route('pr-index') }}" class="nav-item nav-link"><i class="fas fa-user-injured"></i>Hồ sơ</a>
                    <a href="{{ route('mr-index') }}" class="nav-item nav-link active"><i class="fas fa-poll"></i>Đơn khám bệnh</a>
                    <a href="{{ route('consult-index') }}" class="nav-item nav-link"><i class="fas fa-comment-dots"></i>Phòng trò chuyện</a>

                  
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
                            <img class="rounded-circle me-lg-2" src="{{ asset('anhnv.png') }}" alt="" style="width: 40px; height: 40px;">
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
    <h4>Đơn khám bệnh đã đặt</h4>


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
    <div class="row mt-5" style="width: 40%">
                    <form action="{{ route('findmr') }}" class="w-100 d-flex" >
    <div class="col-md-8">
        <input type="date" class="form-control" name="dl" placeholder="Nhập từ khóa...">
    </div>
    <div class="col-md-4">
        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Tìm kiếm</button>
    </div>   
    <div class="col-md-4">
        <a class="btn btn-primary" href="{{ route('mr-index') }}">Tất cả</a>
    </div>   
</form>
</div>
    <table class="table table-striped custab mt-4 table-bordered">
        <thead>
            <tr style="  text-align: center;">
                <th>ID</th>
                <th>Trạng thái</th>
                <th>Lý do</th>
                <th>Kết quả</th>
                <th>Ngày đặt khám</th>
                <th>Mã bệnh án</th>
                <th>Mã lịch hẹn</th>
                <th>Mã đơn thuốc</th>
                <th>Ảnh</th>
                <th class="text-center">Tùy Chọn</th>
            </tr>
        </thead>
        @isset($medicalResults)
            @foreach ($medicalResults as $item)
            <tr>
                <td>{{ $item->id_result }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ substr($item->reason, 0, 25) }}...</td>
                <td>
                    @if ($item->detail!='.')                  
                    {{ substr($item->detail, 0, 25) }}...
            @else
            @endif
                </td>
                <td>{{ $item->booking_date }}</td>
                <td>{{ $item->id_mr }}</td>
                <td>{{ $item->id_sch }}</td>
                <td>{{ $item->id_prescription }}</td>
                <td>
                @if (!empty($item->image))                  
                 <img style="width: 40px; height: 40px"class="" src="{{ asset('image/' . $item->image) }}" >

            @else
            @endif
                
            
            </td>

                <td class="text-center">
                    <button class="btn btn-danger btn-delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $item->id_result }}">Xóa</button>
                </td>
            </tr>
            @endforeach
        @endisset
    </table>

    @isset($medicalResults)
    <div class="container-footer-kt">
        <nav aria-label="Page navigation example" class="ml-5 footer-kt">
            {{ $medicalResults->withQueryString()->links('pagination::bootstrap-4') }}
        </nav>
    </div>
    @endisset
</div>
        <!-- Content End -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('xoamr') }}" id="deleteForm">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Xác nhận xóa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn xóa đơn khám bệnh này?
                    <input type="hidden" name="id_result" id="resultIdInput"> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Không</button>
                    <button type="submit" class="btn btn-danger">Có, xóa!</button>
                </div>
            </div>
        </form>
    </div>
</div>

        <!-- Back to Top -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('ad/main.js') }}"></script>
<script>
  $(document).ready(function () {
    // Xử lý modal xóa
    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var resultId = button.data('id');

        var modal = $(this);
        modal.find('#resultIdInput').val(resultId); // Điền ID vào input ẩn

        // Cập nhật action của form xóa
        var form = modal.find('#deleteForm');
        form.attr('action', form.attr('action').replace(':resultId', resultId));
    });
});
</script>

</body>

</html>
