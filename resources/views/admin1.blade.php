
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
                    <a href="{{ route('admin1') }}" class="nav-item nav-link active"><i class="fa fa-tachometer-alt"></i>Thông tin cá nhân</a>
                  
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
                    <a href="{{ route('mr-index') }}" class="nav-item nav-link"><i class="fas fa-poll"></i>Đơn khám bệnh</a>
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


            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
            <h4>Thông tin người quản trị:</h4>
            
            <div class="col-sm-12 col-xl-6" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-right: 3px solid rgba(0, 0, 0, 0.1); border-left: 3px solid lightblue; border-top: 3px solid lightblue; border-bottom: 1px solid lightblue; padding: 20px; border-radius: 10px;width: 50em">
                    <p><i class="fas fa-user"></i> Tên: <b style="color: #003553">{{ Auth::user()->name }}</b></p>
                    <p><i class="fas fa-envelope"></i> Email: <b style="color: #003553">{{ Auth::user()->email }}</b></p>
                    <p><i class="fas fa-phone-alt"></i> Số điện thoại: <b style="color: #003553">{{ Auth::user()->phonenumber }}</b></p>
                  
               </div>
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
</body>

</html>