<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="shortcut icon" type="x-icon" href="{{ asset('ad/img/user.jpg') }}">


    <!-- Favicon -->

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('ad/style.css') }}" rel="stylesheet">
</head>

<body>

    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3"
            style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border: 1px solid rgba(0, 0, 0, 0.1);">
            <nav class="navbar bg-light navbar-light">
                <a href="{{ route('admin1') }}" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fas fa-user-cog"></i> ADMIN</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">

                </div>
                <div class="navbar-nav w-100">
                    <a href="{{ route('admin1') }}" class="nav-item nav-link"><i class="fa fa-tachometer-alt"></i>Bảng
                        điều khiển</a>

                    <a href="{{ route('hospital-index') }}" class="nav-item nav-link"><i
                            class="fas fa-hospital"></i>Bệnh viện</a>
                    <a href="{{ route('specialist-index') }}" class="nav-item nav-link"><i
                            class="fas fa-brain"></i>Chuyên khoa</a>
                    <a href="{{ route('service-index') }}" class="nav-item nav-link active"><i
                            class="fas fa-laptop-medical"></i>Dịch vụ</a>
                    <a href="{{ route('medicine-index') }}" class="nav-item nav-link"><i
                            class="fas fa-capsules"></i>Thuốc</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="far fa-file-alt"></i>Người dùng</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ route('qldoctor') }}" class="dropdown-item"><i class="fas fa-user-md"></i> Bác
                                sĩ</a>
                            <a href="{{ route('qlnhanvien') }}" class="dropdown-item"><i class="fas fa-users-cog"></i>
                                Nhân viên</a>
                            <a href="{{ route('qlkhachhang') }}" class="dropdown-item"><i class="fas fa-user"></i>
                                Khách hàng</a>
                        </div>
                    </div>
                    <a href="{{ route('clinic-index') }}" class="nav-item nav-link"><i
                            class="fas fa-clinic-medical"></i>Phòng khám</a>
                    <a href="{{ route('pre-index') }}" class="nav-item nav-link"><i
                            class="fas fa-prescription-bottle"></i>Đơn thuốc</a>
                    <a href="{{ route('pr-index') }}" class="nav-item nav-link"><i class="fas fa-user-injured"></i>Hồ
                        sơ</a>
                    <a href="{{ route('mr-index') }}" class="nav-item nav-link"><i class="fas fa-poll"></i>Đơn khám
                        bệnh</a>
                    <a href="{{ route('consult-index') }}" class="nav-item nav-link"><i
                            class="fas fa-comment-dots"></i>Phòng trò chuyện</a>


                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0"
                style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border: 1px solid rgba(0, 0, 0, 0.1);">
                <a href="{{ route('admin1') }}" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fas fa-user-cog"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>

                <div class="navbar-nav align-items-center ms-auto">


                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="{{ asset('anhnv.png') }}" alt=""
                                style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"> {{ Auth::user()->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="{{ route('logout') }}" class="dropdown-item"><i class="fas fa-sign-out-alt"></i>
                                Đăng xuất</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <!-- Blank Start -->

            <div class="container-fluid pt-4 px-4 ">
                <h4>Dịch vụ</h4>

                <h1></h1>
                <div class="col-sm-12 col-xl-6" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; width: 50em">
                    <div
                        class="bg-light rounded h-100 p-4"style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-right: 3px solid rgba(0, 0, 0, 0.1); border-left: 3px solid lightblue; border-top: 3px solid lightblue; border-bottom: 1px solid lightblue; padding: 20px; border-radius: 10px;">
                        <h6 class="mb-4">Thêm dịch vụ</h6>
                        <form action="{{ url('addservice') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Tên dịch vụ:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="servicename" id="inputEmail3"
                                        required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Chi tiết:</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="detail" rows="3" required></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Giá:</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="price" id="inputEmail3"
                                        required>
                                </div>
                            </div>



                            <div class="row mb-3 mt-4">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Ảnh dịch vụ: </label>
                                <div class="col-sm-10">
                                    <input type="file" name="image" id="image" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">

                                    <label for="time" class="form-label">Thời gian hoàn thành (dự kiến):</label>
                                </div>
                                <div class="col-md-8">

                                    <input type="text" class="form-control" name="time" id="time"
                                        placeholder="Giờ:phút" required>
                                </div>
                            </div>
                            <div class=" d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Thêm</button>
                            </div>
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
                <form action="{{ route('findsv') }}" class="w-100 d-flex">
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="dl" placeholder="Nhập tên dịch vụ...">
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Tìm
                            kiếm</button>
                    </div>
                    <div class="col-md-4">
                        <a class="btn btn-primary" href="{{ route('service-index') }}">Tất cả</a>
                    </div>
                </form>
            </div>


            <table class="table table-striped table-bordered table-hover mt-4"
                style="border:1px solid #d4d4d4 ;border-radius: 12px; overflow: hidden;border-collapse: separate; border-spacing: 0;">
                <thead class="thead-light" style="background-color: #9beeff; color: #333333;">
                    <tr style="transition: background-color 0.3s, transform 0.3s; cursor: pointer;"
                        onmouseover="this.style.backgroundColor='#f1f1f1';"
                        onmouseout="this.style.backgroundColor='';">
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Chi tiết</th>
                        <th>Giá</th>
                        <th>Ảnh</th>
                        <th>Thời gian hoàn thành (dự kiến)</th>

                        <th class="text-center">Tùy chọn</th>
                    </tr>
                </thead>

                @isset($service)
                    @foreach ($service as $item)
                        <tr>
                            <td>{{ $item->id_service }}</td>
                            <td>
                                @if (mb_strlen($item->servicename) > 20)
                                    {{ mb_substr($item->servicename, 0, 20) . '...' }}
                                @else
                                    {{ $item->servicename }}
                                @endif
                            </td>
                            <td>
                                @if (mb_strlen($item->detail) > 30)
                                    {{ mb_substr($item->detail, 0, 30) . '...' }}
                                @else
                                    {{ $item->detail }}
                                @endif
                            </td>

                            <td>{{ $item->price }}</td>


                            <td><img style="width: 40px; height: 40px"class=""
                                    src="{{ asset('image/' . $item->image) }}"></td>

                            <td>{{ substr($item->time, 0, 5) }}</td>
                            <td hidden>{{ $item->servicename }}</td>
                            <td hidden>{{ $item->detail }}</td>

                            <td class="text-center">
                                <button class="btn btn-warning btn-edit" data-bs-toggle="modal"
                                    data-bs-target="#editModal"
                                    style=" border-radius: 6px; box-shadow: 0 4px 8px rgba(0,0,0,0.3); border: none; transition: background-color 0.3s, transform 0.3s;"
                                    data-id="{{ $item->id_service }}">Sửa</button>
                                <button class="btn btn-danger btn-delete" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal" data-id="{{ $item->id_service }}"
                                    style=" border-radius: 6px; box-shadow: 0 4px 8px rgba(0,0,0,0.3); border: none; transition: background-color 0.3s, transform 0.3s;">Xóa</button>
                            </td>
                        </tr>
                    @endforeach
                @endisset



            </table>
            @isset($service)
                <div class="container-footer-kt">
                    <nav aria-label="Page navigation example" class="ml-5 footer-kt"
                        style="display: flex; justify-content: center;">
                        {{ $service->withQueryString()->links('pagination::bootstrap-4') }}
                    </nav>
                </div>
            @endisset
        </div>
        <!-- Content End -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <form method="POST" action="{{ route('xoaservice') }}" id="deleteForm">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Xác nhận xóa</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Bạn có chắc chắn muốn xóa dịch vụ này?
                            <input type="hidden" name="id_service" id="hospitalIdInput">
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
                        <h5 class="modal-title" id="editModalLabel">Sửa thông tin dịch vụ</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editForm" action="" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="hospitalname" class="form-label">Tên dịch vụ:</label>
                                <input type="text" class="form-control" id="hospitalname" name="servicename"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="hospitalname" class="form-label">Chi tiết:</label>
                                <textarea class="form-control" id="detail" name="detail"name="detail" rows="3"required></textarea>

                            </div>
                            <div class="mb-3">
                                <label for="hospitalname" class="form-label">Giá:</label>
                                <input type="text" class="form-control" id="price" name="price" required>
                            </div>
                            <div class="mb-3">
                                <label for="editTime" class="form-label">Thời gian hoàn thành (dự kiến):</label>
                                <input type="text" class="form-control" name="time" id="editTime"
                                    placeholder="Giờ:phút" required>
                            </div>
                            <div class="row mb-3 mt-4">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Ảnh dịch vụ: </label>
                                <div class="col-sm-10">
                                    <input type="file" name="image" id="image">
                                </div>


                                <div class="modal-footer">

                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Hủy</button>
                                    <button type="submit" class="btn btn-primary" id="btnUpdate">Lưu Thay
                                        Đổi</button>
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
    <!-- Template Javascript -->
    <script src="{{ asset('ad/main.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#deleteModal').on('show.bs.modal', function(event) {
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
            var hospitalName = row.find('td:eq(6)').text(); // Ô thứ 2 chứa tên bệnh viện
            var detail = row.find('td:eq(7)').text(); // Ô thứ 3 chứa địa chỉ
            var price = row.find('td:eq(3)').text();
            var time = row.find('td:eq(5)').text();

            // Điền dữ liệu vào form
            $('#editHospitalId').val(hospitalId);
            $('#hospitalname').val(hospitalName);
            $('#detail').val(detail);
            $('#price').val(price);
            $('#editTime').val(time);

            $('#editForm').attr('action', '{{ url('capnhatservice') }}/id=' + hospitalId);

        });
    </script>

</body>

</html>
