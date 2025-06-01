<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediBooking</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        xintegrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0V4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        /* Custom background for the hero section to mimic the image */
        .hero-background {
            background: url('https://www.tagmedstaffing.com/wp-content/uploads/2023/12/shutterstock_1209689938.jpg') no-repeat center center;
            background-size: cover;
            position: relative;
            overflow: hidden;
        }

        .hero-background::before {
            content: '';
            position: absolute;
            inset: 0;
            /* top: 0; right: 0; bottom: 0; left: 0; */
            background-color: rgba(0, 0, 0, 0.05);
            /* màu trắng với độ mờ */
            z-index: 1;
        }

        .phone-mockup {
            width: 100%;
            max-width: 400px;
            /* Adjust max-width as needed */
            height: auto;
            border-radius: 2rem;
            /* More rounded corners */
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            transform: rotate(10deg);
            /* Slight rotation */
            position: absolute;
            right: 10%;
            top: 50%;
            transform: translateY(-50%) rotate(10deg);
            z-index: 2;
        }

        /* Adjust phone mockup for smaller screens */
        @media (max-width: 768px) {
            .phone-mockup {
                position: static;
                /* Remove absolute positioning */
                transform: none;
                /* Remove rotation */
                margin: 2rem auto;
                /* Center it */
            }

            .hero-background::before {
                height: 80px;
                /* Smaller wave for mobile */
            }
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">
    <div class="bg-blue-500 py-2 px-5 shadow-sm text-white">
        <div class="container mx-auto flex justify-between items-center text-sm">
            <div class="flex items-center">
                <i class="fas fa-phone-alt mr-2 text-white text-base"></i>
                <span class="text-base">Hotline đặt khám : 1900 3333</span>
            </div>


            @guest
                <div class="text-base">
                    <a href="{{ route('register') }}" class="hover:text-gray-200 mr-4">Đăng ký</a> /
                    <a href="{{ route('login') }}" class="hover:text-gray-200 ml-4">Đăng nhập</a>
                </div>
            @else
                <div class="text-base">
                    <a href="{{ route('profile') }}" class="hover:text-gray-200 mr-4">{{ Auth::user()->name }}</a> /
                    <a href="{{ route('logout') }}" class="hover:text-gray-200 ml-4"> Đăng xuất</a>
                </div>
            @endguest

        </div>
    </div>

    <nav class="bg-white py-2 px-2 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('trangchu') }}" class="flex items-center space-x-2 text-blue-600 text-2xl font-bold">
                <img src="{{ asset('logo.png') }}" width="50px">
                MediBooking
            </a>

            <div class="hidden md:flex space-x-8 text-medium font-medium">
                <a href="{{ route('servicef') }}" class="hover:text-blue-600 transition duration-300">Đặt khám</a>

                @guest
                    <a href="{{ route('login') }}" class="hover:text-blue-600 transition duration-300">Hỏi đáp bác sĩ</a>
                    <a ref="{{ route('login') }}" class="hover:text-blue-600 transition duration-300">Hồ sơ sức khỏe</a>
                @else
                    <a href="{{ route('trochuyenuser') }}" class="hover:text-blue-600 transition duration-300">Hỏi đáp bác
                        sĩ</a>
                    <a href="{{ route('profile') }}" class="hover:text-blue-600 transition duration-300">Hồ sơ sức khỏe</a>
                @endguest
            </div>
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-gray-600 hover:text-blue-600 focus:outline-none">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>

        <div id="mobile-menu" class="hidden md:hidden bg-white mt-2 py-2 rounded-lg shadow-lg">
            <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-blue-50 hover:text-blue-600">Đặt khám</a>
            <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-blue-50 hover:text-blue-600">Hỏi đáp bác
                sĩ</a>
            <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-blue-50 hover:text-blue-600">Hồ sơ sức
                khỏe</a>
        </div>
    </nav>



    @yield('content')
    <footer class="bg-gray-800 text-gray-200 py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <a href="#" class="flex items-center space-x-2 text-blue-400 text-2xl font-bold mb-4">
                        <i class="fas fa-plus-circle text-3xl"></i>
                        <span>MediBooking</span>
                    </a>
                    <p class="text-gray-400 text-sm mb-4">CÔNG TY TNHH 1 THÀNH VIÊN ISOFHCARE</p>
                    <p class="text-gray-400 text-sm flex items-center mb-2">
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        Tầng 4, số 35 Nguyễn Đình Chiểu, Lê Đại Hành, Hai Bà Trưng, Hà Nội
                    </p>
                    <p class="text-gray-400 text-sm flex items-center mb-2">
                        <i class="fas fa-phone-alt mr-2"></i>
                        1900 3367
                    </p>
                    <p class="text-gray-400 text-sm flex items-center">
                        <i class="fas fa-envelope mr-2"></i>
                        medibooking@gmail.com
                    </p>
                </div>

                <div>
                    <h4 class="text-white font-semibold text-lg mb-4">IVIE - BÁC SĨ ƠI</h4>
                    <ul class="space-y-2 text-gray-400 text-sm">
                        <li><a href="#" class="hover:text-blue-400 transition duration-300">Đặt lịch</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition duration-300">Bác sĩ</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition duration-300">Chuyên khoa</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition duration-300">Đăng ký bán hàng trên
                                IVIE - Shopping Mall</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-semibold text-lg mb-4">Hỗ trợ</h4>
                    <ul class="space-y-2 text-gray-400 text-sm">
                        <li><a href="#" class="hover:text-blue-400 transition duration-300">Hỏi đáp bác sĩ</a>
                        </li>
                        <li><a href="#" class="hover:text-blue-400 transition duration-300">Trở thành đối tác của
                                IVIE - Bác sĩ ơi</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition duration-300">Cơ sở y tế</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition duration-300">Trung tâm trợ giúp</a>
                        </li>
                    </ul>
                </div>

                <div class="flex flex-col items-center md:items-start">
                    <h4 class="text-white font-semibold text-lg mb-4">Tải app!</h4>
                    <div class="flex flex-col space-y-3 mb-6">
                        <a href="#"
                            class="bg-gray-700 text-white py-2 px-4 rounded-full flex items-center space-x-2 shadow-md transition duration-300 hover:bg-gray-600">
                            <i class="fab fa-google-play text-xl"></i>
                            <span class="text-sm">Google Play</span>
                        </a>
                        <a href="#"
                            class="bg-gray-700 text-white py-2 px-4 rounded-full flex items-center space-x-2 shadow-md transition duration-300 hover:bg-gray-600">
                            <i class="fab fa-apple text-xl"></i>
                            <span class="text-sm">App Store</span>
                        </a>
                    </div>
                    <div class="flex space-x-4 mb-6">
                        <a href="#" class="text-gray-400 hover:text-blue-400 transition duration-300"><i
                                class="fab fa-facebook-f text-xl"></i></a>
                        <a href="#" class="text-gray-400 hover:text-blue-400 transition duration-300"><i
                                class="fab fa-twitter text-xl"></i></a>
                        <a href="#" class="text-gray-400 hover:text-blue-400 transition duration-300"><i
                                class="fab fa-instagram text-xl"></i></a>
                        <a href="#" class="text-gray-400 hover:text-blue-400 transition duration-300"><i
                                class="fab fa-youtube text-xl"></i></a>
                    </div>
                    <div class="flex space-x-4">
                        <img src="https://placehold.co/100x40/0A2540/FFFFFF?text=BoCongThuong" alt="Bộ Công Thương"
                            class="h-10">
                        <img src="https://placehold.co/100x40/0A2540/FFFFFF?text=DMCA" alt="DMCA Protected"
                            class="h-10">
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400 text-xs">
                <p>&copy; 2022 ISOFHCARE. All rights reserved. Giấy phép đăng ký kinh doanh số 0108600757 do Sở Kế hoạch
                    & Đầu tư TP Hà Nội cấp lần đầu ngày 23/01/2019. Người chịu trách nhiệm nội dung: Bà Nguyễn Bích
                    Phượng. Chức vụ: Giám đốc vận hành</p>
            </div>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"
        integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script>
        // JavaScript for mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>

    @if (Session::has('message'))
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true
            };
            toastr.success("{{ Session::get('message') }}", 'Thành công!')
        </script>
    @endif
</body>

</html>
