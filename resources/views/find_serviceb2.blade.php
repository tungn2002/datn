<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <title>Thông tin bác sĩ</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <link href="{{ asset('main/theme.css') }}" rel="stylesheet">
</head>

<body>

    <header>
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 text-sm">
                        <div class="site-info">
                            <a href="#"style="color: #000000"><i class="fas fa-phone-alt text-primary mr-1"></i>
                                0969128038</a>
                            <span class="divider">|</span>
                            <a href="#" style="color: #000000"> <i class="fas fa-envelope text-primary mr-1"></i>
                                lmtung2002@gmail.com</a>

                        </div>
                    </div>
                    <div class="col-sm-4 text-right text-sm">
                        <div class="social-mini-button">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-dribbble"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div> <!-- .row -->
            </div> <!-- .container -->
        </div> <!-- .topbar -->

        <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('trangchu') }}" style="padding:0px;margin:0px;"><img
                        src="{{ asset('logo.png') }}" width="45px" style="margin-bottom:5px;"><span
                        class="text-primary"> Bệnh viện</span></a>


                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport"
                    aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupport">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('trangchu') }}"style="color: #000000">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('servicef') }}"style="color: #000000">Dịch vụ</a>
                        </li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"style="color: #000000">Tư vấn</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('trochuyenuser') }}"style="color: #000000">Tư vấn</a>
                            </li>
                        @endguest
                        <li class="nav-item">
                            <a class="nav-link" href="#inf" style="color: #000000">Thông tin</a>
                        </li>
                        @guest
                            <li class="nav-item">
                                <a class="btn btn-primary ml-lg-3" href="{{ route('login') }}">Đăng nhập / đăng ký</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="btn btn-primary ml-lg-3 dropdown-toggle" href="#" id="navbarDropdown"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('profile') }}"><i class="far fa-user"></i> Thông
                                        tin cá nhân</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}">
                                        <i class="fas fa-sign-out-alt"></i> Đăng xuất
                                    </a>

                                </div>
                            </li>
                        @endguest
                    </ul>
                </div> <!-- .navbar-collapse -->
            </div> <!-- .container -->
        </nav>
    </header>

    <div class="page-hero bg-image overlay-dark"
        style=" height: 200px;background-image: url({{ asset('main/image/bg_image_1.jpg') }});">
        <div class="banner-section">
            <div class="container text-center wow fadeInUp">
                <nav aria-label="Breadcrumb">
                    <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
                        <li class="breadcrumb-item"><a href="{{ route('trangchu') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Bác sĩ</li>
                    </ol>
                </nav>
            </div> <!-- .container -->
        </div> <!-- .banner-section -->
    </div> <!-- .page-banner -->

    <div class="page-section">
        <div class="container">
            <div class="card mb-3" style="height: 30%; overflow: hidden;">
                <div class="row no-gutters"
                    style="height: auto; overflow: hidden; border: 2px solid #049371; background-color: #f9f9f9; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius: 10px;">
                    <div class="col-md-4" style="height: 15em;">
                        <img src="{{ asset('image/' . $doctor->avatar) }}" class="card-img" alt="..."
                            style="height: 15em; object-fit: cover; width:15em;">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">

                            <h5 class="card-title">Tên: {{ $doctor->name }}</h5>
                            <p class="card-text">Chuyên khoa: {{ $doctor->spname }}</p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3"
                style="height: 300px; overflow-y: auto; border: 2px solid #049371; background-color: #f9f9f9; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius: 10px;">
                <div class="row" style="height: 100%;">

                    @isset($clinic)
                        @foreach ($clinic as $item)
                            <div class="col-sm-3 py-3">
                                <div class="card-blog h-100">
                                    <div class="header">
                                        <div class="post-category">
                                            <a href="#">{{ $item->price }} đ</a>
                                        </div>
                                        <img src="{{ asset('image/' . $item->image) }}"
                                            style="width: 100%; height: auto; object-fit: cover;" alt="">
                                    </div>
                                    <div class="body">
                                        <h5 class="post-title" style="font-size:16px"><a
                                                href="{{ route('serviceff', ['id' => $item->id_clinic]) }}"><b>{{ $item->servicename }}</b></a>
                                        </h5>
                                        <div class="site-info">
                                            <div class="site-info" style="font-size:14px">Phòng: {{ $item->clinicname }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endisset

                </div>

                @isset($clinic)
                    <div class="container-footer-kt mt-3">
                        <nav aria-label="Page navigation example" class="ml-5 footer-kt">
                            {{ $clinic->links('pagination::bootstrap-4') }}
                        </nav>
                    </div>
                @endisset

            </div>



        </div> <!-- .container -->

    </div> <!-- .page-section -->

    <footer class="page-footer">
        <div class="container">
            <div class="row px-md-3">
                <div class="col-sm-6 col-lg-3 py-3">
                    <h5>Dịch vụ y tế</h5>
                    <ul class="footer-menu">
                        <li><a href="#hed">Đặt lịch khám</a></li>
                        <li><a href="#hed">Tư vấn kê đơn thuốc</a></li>
                        <li><a href="#hed">Hỗ trợ khách hàng</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-lg-3 py-3">
                    <h5>Khác</h5>
                    <ul class="footer-menu">
                        <li><a href="#inf">Thông tin</a></li>

                    </ul>
                </div>
                <div class="col-sm-6 col-lg-3 py-3">
                    <h5>Tuyển dụng</h5>
                    <ul class="footer-menu">

                    </ul>
                </div>
                <div class="col-sm-6 col-lg-3 py-3">
                    <h5>Liên hệ</h5>
                    <a href="#" class="footer-link">0969128038</a>
                    <a href="#" class="footer-link">lmtung2002@gmail.com</a>

                    <div class="footer-sosmed mt-3">
                        <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>

            <hr>

        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>


    <script src="{{ asset('main/theme.js') }}"></script>

</body>

</html>
