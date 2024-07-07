<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Nhân viên</title>
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
                    <h3 class="text-primary"><i class="fas fa-user-check"></i> Nhân viên</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4" >
                 
                </div>
                <div class="navbar-nav w-100" >
                    <a href="{{ route('empl') }}" class="nav-item nav-link active"><i class="fas fa-id-card"></i>Thông tin cá nhân</a>
                    <a href="{{ route('empl_choduyet') }}" class="nav-item nav-link"><i class="far fa-check-square"></i>Xác nhận đơn</a>

                    <a href="{{ route('trochuyenempl') }}" class="nav-item nav-link "><i class="fas fa-sms"></i>Trò chuyện</a>
                

                  
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
                            <a href="{{ route('logout') }}" class="dropdown-item">Đăng xuất</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4 ">
            <h1>Các đơn đang chờ thanh toán</h1>
            <a href="{{ route('empl_choduyet') }}" class="btn btn-primary" style="border-radius: 2rem ;">Chờ duyệt</a>
  <a href="{{ route('empl_chothanhtoan') }}" type="button" class="btn btn-primary"  style="border-radius: 2rem ; border-width: 0px;background-image: linear-gradient(to left, #4cf5bc 0%, #07d590 100%);">Thanh toán</a>
  <a href="{{ route('empl_dathanhtoan') }}" type="button" class="btn btn-primary"  style="border-radius: 2rem ;">Đã thanh toán</a>  <table class="table table-striped custab mt-4 table-bordered">

 
<div style="display: flex; align-items: center;" class="mt-5" >
<form action="{{ route('findchothanhtoan') }}" method="post">@csrf
    <input  type="tel" style="width: 250px" class="form-control" name="dl" placeholder="Nhập số điện thoại...">
    <button class="btn btn-primary"  type="submit" style="margin-left: 5px;"> <i class="fas fa-search"></i> Tìm kiếm</button>
</form>
    <a class="btn btn-primary" style="margin-left: 5px;"  href="{{ route('empl_chothanhtoan') }}">Tất cả</a>
</div>

  <thead>
            <tr>
            <th>Mã đơn</th>
                <th>Giá tiền</th>
                <th>Ngày khám</th>
                <th>Giờ khám</th>
                <th>Giờ kết thúc</th>
                <th>Tên bệnh nhân</th>
                <th>Số điện thoại</th>
                <th class="text-center">Tùy Chọn</th>
            </tr>
        </thead>
        @isset($medicalResults)
            @foreach ($medicalResults as $item)
            <tr>
            <td>{{ $item->id_result }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->day }}</td>
                <td>{{ substr($item->time, 0, 5) }}</td>
                <td>{{ substr($item->finishtime, 0, 5) }}</td>
                <th>{{$item->prname }}</th>
                <th>{{$item->phonenumber }}</th>
                <td class="text-center">
                    <a class="btn btn-primary" href="{{ route('xacnhanthanhtoan', ['id' => $item->id_result]) }}">Duyệt</a>
                    <button class="btn btn-danger btn-delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $item->id_result }}">Hủy</button>
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
                <form id="editForm" action="" method="POST">
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
