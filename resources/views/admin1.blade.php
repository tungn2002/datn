<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="shortcut icon" type="x-icon" href="{{ asset('ad/img/user.jpg') }}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Template Stylesheet -->
    <link href="{{ asset('ad/style.css') }}" rel="stylesheet">
    <style>
        .sidebar .dropdown-item {
            white-space: nowrap;
            /* Ngăn các mục dropdown bị cắt ngắn */
        }
    </style>
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
                    <a href="{{ route('admin1') }}" class="nav-item nav-link active"><i
                            class="fa fa-tachometer-alt"></i>Bảng điều khiển</a>

                    <a href="{{ route('hospital-index') }}" class="nav-item nav-link"><i
                            class="fas fa-hospital"></i>Bệnh viện</a>
                    <a href="{{ route('specialist-index') }}" class="nav-item nav-link"><i
                            class="fas fa-brain"></i>Chuyên khoa</a>
                    <a href="{{ route('service-index') }}" class="nav-item nav-link"><i
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


            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <h4>Thông tin người quản trị:</h4>

                <div class="col-sm-12 col-xl-6"
                    style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-right: 3px solid rgba(0, 0, 0, 0.1); border-left: 3px solid lightblue; border-top: 3px solid lightblue; border-bottom: 1px solid lightblue; padding: 20px; border-radius: 10px;width: 50em">
                    <p><i class="fas fa-user"></i> Tên: <b style="color: #003553">{{ Auth::user()->name }}</b></p>
                    <p><i class="fas fa-envelope"></i> Email: <b style="color: #003553">{{ Auth::user()->email }}</b>
                    </p>
                    <p><i class="fas fa-phone-alt"></i> Số điện thoại: <b
                            style="color: #003553">{{ Auth::user()->phonenumber }}</b></p>

                </div>
            </div>

            <div class="container-fluid pt-4 px-4">
                <h4>Số đơn tư vấn của bác sĩ:</h4>
                <table class="table table-striped table-bordered table-hover mt-4"
                    style="border:1px solid #d4d4d4 ;border-radius: 12px; overflow: hidden;border-collapse: separate; border-spacing: 0;">
                    <thead class="thead-light" style="background-color: #9beeff; color: #333333;">
                        <tr style="transition: background-color 0.3s, transform 0.3s; cursor: pointer;"
                            onmouseover="this.style.backgroundColor='#f1f1f1';"
                            onmouseout="this.style.backgroundColor='';">
                            <th>Mã bác sĩ</th>
                            <th>Bác sĩ</th>
                            <th>Số đơn tư vấn</th>
                            <th>Tổng tiền</th>
                        </tr>
                    </thead>
                    @isset($users)
                        @foreach ($users as $item)
                            <tr>
                                <td>{{ $item->id_user }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->consult_count }}</td>
                                <td>{{ $item->total_price }}</td>


                            </tr>
                        @endforeach
                    @endisset



                </table>
                @isset($users)
                    <div class="container-footer-kt">
                        <nav aria-label="Page navigation example" class="ml-5 footer-kt">
                            {{ $users->links('pagination::bootstrap-4') }}
                        </nav>
                    </div>
                @endisset
            </div>

            <div class="container-fluid pt-4 px-4">
                <h4>Biểu đồ tổng tiền theo tháng trong năm {{ $currentYear }}:</h4>


                <canvas id="myChart"></canvas>

                <script>
                    // Lấy dữ liệu từ Blade
                    const months = @json($months);
                    const totals = @json($totals);

                    // Tạo biểu đồ
                    const ctx = document.getElementById('myChart').getContext('2d');
                    const myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: months.map(month => `Tháng ${month}`), // Đổi thành định dạng tháng
                            datasets: [{
                                label: 'Tổng tiền',
                                data: totals,
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                </script>






            </div>
            <!-- JavaScript Libraries -->
            <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

            <!-- Template Javascript -->
            <script src="{{ asset('ad/main.js') }}"></script>
</body>

</html>
