
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
                <a href="index.html" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                  
                  <a href="{{ route('hospital-index') }}" class="nav-item nav-link"><i class="fas fa-hospital"></i>Bệnh viện</a>
                  <a href="{{ route('specialist-index') }}" class="nav-item nav-link"><i class="fas fa-brain"></i>Chuyên khoa</a>
                  <a href="{{ route('service-index') }}" class="nav-item nav-link"><i class="fas fa-laptop-medical"></i>Dịch vụ</a>
                  <a href="{{ route('clinic-index') }}" class="nav-item nav-link"><i class="fas fa-clinic-medical"></i>Phòng khám</a>
                  <a href="{{ route('medicine-index') }}" class="nav-item nav-link"><i class="fas fa-capsules"></i>Thuốc</a>
                  <a href="{{ route('pre-index') }}" class="nav-item nav-link"><i class="fas fa-prescription-bottle"></i>Đơn thuốc</a>
                  <a href="{{ route('pr-index') }}" class="nav-item nav-link"><i class="fas fa-user-injured"></i>Hồ sơ</a>
                  <a href="{{ route('mr-index') }}" class="nav-item nav-link"><i class="fas fa-poll"></i>Kết quả khám</a>
                  <a href="" class="nav-item nav-link"><i class="fas fa-comment-dots"></i>Đơn tư vấn</a>

                  <div class="nav-item dropdown">
                      <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Người dùng</a>
                      <div class="dropdown-menu bg-transparent border-0">
                          <a href="{{ route('qldoctor') }}" class="dropdown-item"><i class="fas fa-user-md"></i> Bác sĩ</a>
                          <a href="{{ route('qlnhanvien') }}" class="dropdown-item"><i class="fas fa-users-cog"></i> Nhân viên</a>
                          <a href="{{ route('qlnhanvien') }}" class="dropdown-item"><i class="fas fa-user"></i> Khách hàng</a>
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
    <h4>Kết Quả Khám bệnh và lịch đã đặt</h4>

    <div class="col-sm-12 col-xl-6" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; width: 50em">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Thêm Kết Quả</h6>
            <form action="{{ url('addmr') }}" method="post"  enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Trạng Thái</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="status">
                            <option value="chờ duyệt">Chờ Duyệt</option>
                            <option value="chưa thanh toán">Chưa Thanh Toán</option>
                            <option value="đã thanh toán">Đã Thanh Toán</option>
                            <option value="đã khám">Đã khám</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Lý Do</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="reason" id="inputEmail3">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Chi Tiết</label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control" name="detail" id="inputEmail3"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Ngày Khám</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="booking_date" id="inputEmail3">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Bệnh Án:</label>
                    <div class="col-sm-10">
                        <select class="inp-tmnv form-select" name="id_mr" id="phongban" >
                            <option value=""></option>
                            @foreach ($patientRecords as $item)
                                <option value="{{$item->id_pr}}">{{$item->prname}}</option>
                            @endforeach
                        </select>
                    </div> 
                </div>
                
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Lịch Hẹn</label>
                    <div class="col-sm-10">
                        <select class="inp-tmnv form-select" name="id_sch" id="phongban" >
                            <option value=""></option>
                            @foreach ($appointments as $item)
                                <option value="{{$item->id_appointment}}">{{$item->id_appointment}}</option>
                            @endforeach
                        </select>
                    </div> 
                </div>

                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Đơn Thuốc</label>
                    <div class="col-sm-10">
                        <select class="inp-tmnv form-select" name="id_prescription" id="phongban" >
                            <option value=""></option>
                            @foreach ($prescriptions as $item)
                                <option value="{{$item->id_pre}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div> 
                </div>
                        
                                
                <div class="row mb-3 mt-4">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Ảnh: </label>
                                    <div class="col-sm-10">
                                    <input type="file" name="image" id="image">
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
    <div class="row mt-5" style="width: 40%">
                    <form action="{{ route('findmr') }}" class="w-100 d-flex" method="post">@csrf
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
            <tr>
                <th>ID</th>
                <th>Trạng Thái</th>
                <th>Lý Do</th>
                <th>Chi Tiết</th>
                <th>Ngày đặt Khám</th>
                <th>Mã Bệnh Án</th>
                <th>Mã Lịch Hẹn</th>
                <th>Mã Đơn Thuốc</th>
                <th>Ảnh</th>
                <th class="text-center">Tùy Chọn</th>
            </tr>
        </thead>
        @isset($medicalResults)
            @foreach ($medicalResults as $item)
            <tr>
                <td>{{ $item->id_result }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->reason }}</td>
                <td>{{ $item->detail }}</td>
                <td>{{ $item->booking_date }}</td>
                <td>{{ $item->id_mr }}</td>
                <td>{{ $item->id_sch }}</td>
                <td>{{ $item->id_prescription }}</td>
                <td><img style="width: 40px; height: 40px"class="" src="{{ asset('image/' . $item->image) }}" ></td>

                <td class="text-center">
                    <button class="btn btn-warning btn-edit" data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{ $item->id_result }}">Sửa</button>
                    <button class="btn btn-danger btn-delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $item->id_result }}">Xóa</button>
                </td>
            </tr>
            @endforeach
        @endisset
    </table>

    @isset($medicalResults)
    <div class="container-footer-kt">
        <nav aria-label="Page navigation example" class="ml-5 footer-kt">
            {{ $medicalResults->links('pagination::bootstrap-4') }}
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
                    Bạn có chắc chắn muốn xóa kết quả khám bệnh này?
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
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Sửa Thông Tin Kết Quả Khám Bệnh</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="editResultId" name="id_result"> <div class="mb-3">
                        <label for="status" class="form-label">Trạng thái</label>
                        <select class="form-select" name="status" id="status">
                            <option value="chờ duyệt">Chờ Duyệt</option>
                            <option value="chưa thanh toán">Chưa Thanh Toán</option>
                            <option value="đã thanh toán">Đã Thanh Toán</option>
                            <option value="đã khám">Đã khám</option>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="reason" class="form-label">Lý do</label>
                        <input type="text" class="form-control" id="reason" name="reason">
                    </div>
                    <div class="mb-3">
                        <label for="detail" class="form-label">Chi tiết</label>
                        <textarea class="form-control" id="detail" name="detail"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="booking_date" class="form-label">Ngày khám</label>
                        <input type="date" class="form-control" id="booking_date" name="booking_date">
                    </div>
                    
                    <div class="row mb-3">
                        <label for="id_mr" class="col-sm-2 col-form-label">Bệnh án:</label>
                        <div class="col-sm-10">
                            <select class="inp-tmnv form-select" name="id_mr" id="phongban" >
                                <option value=""></option>
                                @isset($patientRecords)
                                    @foreach ($patientRecords as $item)
                                        <option value="{{$item->id_pr}}">{{$item->prname}}</option>
                                    @endforeach
                                @endisset
                            </select>
                        </div> 
                    </div>
                    <div class="row mb-3">
                        <label for="id_sch" class="col-sm-2 col-form-label">Lịch hẹn:</label>
                        <div class="col-sm-10">
                            <select class="inp-tmnv form-select" name="id_sch" id="phongban2" >
                                <option value=""></option>
                                @isset($appointments)
                                    @foreach ($appointments as $item)
                                        <option value="{{$item->id_appointment}}">{{$item->id_appointment}}</option>
                                    @endforeach
                                @endisset
                            </select>
                        </div> 
                    </div>
                    <div class="row mb-3">
                        <label for="id_prescription" class="col-sm-2 col-form-label">Đơn thuốc:</label>
                        <div class="col-sm-10">
                            <select class="inp-tmnv form-select" name="id_prescription" id="phongban3" >
                                <option value=""></option>
                                @isset($prescriptions)
                                    @foreach ($prescriptions as $item)
                                        <option value="{{$item->id_pre}}">{{$item->name}}</option>
                                    @endforeach
                                @endisset
                            </select>
                        </div> 
                    </div>
                    <div class="row mb-3 mt-4">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Ảnh dich vụ: </label>
                                    <div class="col-sm-10">
                                    <input type="file" name="image" id="image">
                                    </div>
                                </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
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

    // Xử lý modal sửa
    $('.btn-edit').click(function() {
        var resultId = $(this).data('id');
        var row = $(this).closest('tr');

        // Lấy dữ liệu từ các ô trong hàng
        var status = row.find('td:eq(1)').text().trim();
        var reason = row.find('td:eq(2)').text().trim();
        var detail = row.find('td:eq(3)').text().trim();
        var bookingDate = row.find('td:eq(4)').text().trim();
        var patientRecordId = row.find('td:eq(5)').text().trim();
        var appointmentId = row.find('td:eq(6)').text().trim();
        var prescriptionId = row.find('td:eq(7)').text().trim();

        // Điền dữ liệu vào form sửa
        $('#editResultId').val(resultId);
        $('#status').val(status);
        $('#reason').val(reason);
        $('#detail').val(detail);
        $('#booking_date').val(bookingDate);

        $('#phongban option[value="' + patientRecordId + '"]').prop('selected', true);
        $('#phongban2 option[value="' + appointmentId + '"]').prop('selected', true);
        $('#phongban3 option[value="' + prescriptionId + '"]').prop('selected', true);

        // Cập nhật action của form sửa
        $('#editForm').attr('action', '{{ url("capnhatmr") }}/id=' + resultId);
    });
});
</script>

</body>

</html>
