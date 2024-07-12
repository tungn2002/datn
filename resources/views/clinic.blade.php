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
                    <a href="{{ route('admin1') }}" class="nav-item nav-link "><i class="fa fa-tachometer-alt me-2"></i>Thông tin cá nhân</a>
                  
                    <a href="{{ route('hospital-index') }}" class="nav-item nav-link"><i class="fas fa-hospital"></i>Bệnh viện</a>
                    <a href="{{ route('specialist-index') }}" class="nav-item nav-link"><i class="fas fa-brain"></i>Chuyên khoa</a>
                    <a href="{{ route('service-index') }}" class="nav-item nav-link"><i class="fas fa-laptop-medical"></i>Dịch vụ</a>
                    <a href="{{ route('medicine-index') }}" class="nav-item nav-link"><i class="fas fa-capsules"></i>Thuốc</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Người dùng</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ route('qldoctor') }}" class="dropdown-item"><i class="fas fa-user-md"></i> Bác sĩ</a>
                            <a href="{{ route('qlnhanvien') }}" class="dropdown-item"><i class="fas fa-users-cog"></i> Nhân viên</a>
                            <a href="{{ route('qlkhachhang') }}" class="dropdown-item"><i class="fas fa-user"></i> Khách hàng</a>
                        </div>
                    </div>
                    <a href="{{ route('clinic-index') }}" class="nav-item nav-link active"><i class="fas fa-clinic-medical"></i>Phòng khám</a>
                    <a href="{{ route('pre-index') }}" class="nav-item nav-link"><i class="fas fa-prescription-bottle"></i>Đơn thuốc</a>
                    <a href="{{ route('pr-index') }}" class="nav-item nav-link"><i class="fas fa-user-injured"></i>Hồ sơ</a>
                    <a href="{{ route('mr-index') }}" class="nav-item nav-link"><i class="fas fa-poll"></i>Đơn khám bệnh</a>
                    <a href="{{ route('consult-index') }}" class="nav-item nav-link"><i class="fas fa-comment-dots"></i>Đơn tư vấn</a>

                  
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
            <h4>Phòng</h4>

                <h1></h1>
            <div class="col-sm-12 col-xl-6"  style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; width: 50em">
                        <div class="bg-light rounded h-100 p-4"style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-right: 3px solid rgba(0, 0, 0, 0.1); border-left: 3px solid lightblue; border-top: 3px solid lightblue; border-bottom: 1px solid lightblue; padding: 20px; border-radius: 10px;">
                            <h6 class="mb-4">Horizontal Form</h6>
                            <form  action="{{ url('addclinic') }}" method="post" >
                            @csrf

                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Tên phòng:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="clinicname" id="inputEmail3" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="id_user" class="form-label">Bác sĩ:</label>
                                    <select class="form-select" name="id_user" id="id_user" required>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id_user }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                

                                
                                <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Dịch vụ:</label>
                                <div class="col-sm-10">

                                    @empty($service)
                                    @endempty
                                    <select class="inp-tmnv form-select" name="id_service" id="phongban" required>
                                        <option value=""></option>
                                        @isset($service)
                                            @foreach ($service as $item)
                                            <option value="{{$item->id_service}}">{{$item->servicename}}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                
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
                    <form action="{{ route('findcli') }}" class="w-100 d-flex">
    <div class="col-md-8">
        <input type="text" class="form-control" name="dl" placeholder="Nhập tên phòng...">
    </div>
    <div class="col-md-4">
        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Tìm kiếm</button>
    </div>   
    <div class="col-md-4">
        <a class="btn btn-primary" href="{{ route('clinic-index') }}">Tất cả</a>
    </div>   
</form>
</div>

            <table class="table table-striped custab mt-4 table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Dịch vụ</th>
            <th>Bác sĩ</th>

            <th class="text-center">Tùy chọn</th>
        </tr>
    </thead>
    
    @isset($clinic)
                            @foreach ($clinic as $item)
                            <tr>
                                <td>{{$item->id_clinic}}</td>
                                <td>{{$item->clinicname}}</td>

                                <td>{{$item->id_service}}</td>
                                <td>{{$item->id_user}}</td>

                                <td class="text-center">       
                                <button class="btn btn-warning btn-edit" data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{ $item->id_clinic }}">Sửa</button> 
                                    <button class="btn btn-danger btn-delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{$item->id_clinic}}">Xóa</button>
                                    <a class="btn btn-primary" href="{{ route('app-index2', ['id' => $item->id_clinic ]) }}">Lịch khám</a>

                                </td>
                            </tr>
                         
                            @endforeach
                        @endisset

         

    </table>
    @isset($clinic)
    <div class="container-footer-kt">
            <nav aria-label="Page navigation example" class="ml-5 footer-kt">
                {{ $clinic->withQueryString()->links('pagination::bootstrap-4') }}
            </nav>
        </div>
    @endisset
        </div>
        <!-- Content End -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('xoaclinic') }}" id="deleteForm"> 
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Xác nhận xóa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn xóa phòng này?
                    <input type="hidden" name="id_clinic" id="hospitalIdInput">
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
                <h5 class="modal-title" id="editModalLabel">Sửa thông tin phòng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" action=""  method="POST">
                @csrf

                    <div class="mb-3">
                        <label for="hospitalname" class="form-label">Tên phòng:</label>
                        <input type="text" class="form-control" id="hospitalname" name="clinicname"required>
                    </div>


                                    <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Dịch vụ: </label>
                                <div class="col-sm-10">
                                    @empty($service)
                                    @endempty
                                    <select class="inp-tmnv form-select" name="id_service" id="phongban2" required>
                                        <option value=""></option>
                                        @isset($service)
                                            @foreach ($service as $item)
                                            <option value="{{$item->id_service}}">{{$item->servicename}}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                   </div> 
                                    </div>
                                    <div class="mb-3">
                        <label for="editIdUser" class="form-label">Bác sĩ:</label>
                        <select class="form-select" name="id_user" id="phongban3" >
                        <option value=""></option>

                            @foreach ($users as $user)
                                <option value="{{ $user->id_user }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
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
    var clinicname = row.find('td:eq(1)').text(); // Ô thứ 2 chứa tên bệnh viện
// Ô thứ 3 chứa địa chỉ
    var ser= row.find('td:eq(2)').text(); 

    // Điền dữ liệu vào form
    $('#editHospitalId').val(hospitalId);
    $('#hospitalname').val(clinicname);

    $('#phongban2 option[value="' + ser + '"]').prop('selected', true);

    $('#editForm').attr('action', '{{ url("capnhatclinic") }}/id=' + hospitalId); 

});
</script>

</body>

</html>
