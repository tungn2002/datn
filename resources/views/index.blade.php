
@extends('layouts.app')
@section('content')
   <!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
<style>
    #service-slider::-webkit-scrollbar {
        display: none;
    }
    #service-slider {
        scrollbar-width: none;
    }
</style>

 <header class="hero-background relative py-16 md:py-24 overflow-hidden">
        <div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-4 relative z-10">
            <div class="text-center md:text-left md:w-1/2 mb-8 md:mb-0">
                <h1 class="text-4xl md:text-6xl font-extrabold text-blue-800 leading-tight mb-4">
                    MediBooking
                </h1>
                <p class="text-xl md:text-2xl text-blue-700 mb-8">
                    Ứng dụng đặt lịch khám bệnh
                </p>
                <div class="flex flex-col sm:flex-row justify-center md:justify-start space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="{{ route('servicef') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-full shadow-lg transition duration-300 transform hover:scale-105">
                        <i class="fas fa-calendar-check mr-2"></i> Đặt khám
                    </a>
                    <a  href="{{ route('trochuyenuser') }}" class="bg-white text-blue-600 border border-blue-600 font-semibold py-3 px-6 rounded-full shadow-lg transition duration-300 transform hover:scale-105 hover:bg-blue-50">
                        <i class="fas fa-question-circle mr-2"></i> Hỏi đáp bác sĩ
                    </a>
                </div>
            </div>
        </div>
    </header>
   <section class="py-10 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-2xl shadow-xl p-6 text-center transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                <div class="w-16 h-16 mx-auto mb-4 bg-green-100 rounded-full flex items-center justify-center text-green-600 text-3xl">
                    <i class="fas fa-user-md"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Bác sĩ tư vấn từ xa</h3>
                <p class="text-gray-600 text-sm">Nhận đơn thuốc từ bác sĩ</p>
            </div>

            <div class="bg-white rounded-2xl shadow-xl p-6 text-center transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                <div class="w-16 h-16 mx-auto mb-4 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 text-3xl">
                    <i class="fas fa-hospital"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Khám tại CSYT</h3>
                <p class="text-gray-600 text-sm">Đặt khám ưu tiên tại bệnh viện, phòng khám</p>
            </div>

            <div class="bg-white rounded-2xl shadow-xl p-6 text-center transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                <div class="w-16 h-16 mx-auto mb-4 bg-purple-100 rounded-full flex items-center justify-center text-purple-600 text-3xl">
                    <i class="fas fa-comments"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Hỏi đáp bác sĩ</h3>
                <p class="text-gray-600 text-sm">Chat với bác sĩ chuyên khoa</p>
            </div>
        </div>
    </div>
</section>
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-extrabold text-blue-800 text-center mb-12">CHĂM SÓC SỨC KHỎE TOÀN DIỆN</h2>

        <!-- Swiper container -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach($service as $item)
                    <div class="swiper-slide p-4">
                        <div class="bg-white rounded-2xl 
                                    shadow-[0_10px_30px_-5px_rgba(30,64,175,0.5)] 
                                    hover:shadow-[0_15px_45px_-5px_rgba(30,64,175,0.6)] 
                                    p-6 text-center flex flex-col items-center 
                                    transform transition duration-300 
                                    hover:scale-105 relative">
                            
                            <img src="{{ asset('image/' . $item->image) }}" alt="{{ $item->servicename }}" class="rounded-lg mb-4">
                            
                            <h3 class="text-xl font-bold text-gray-900 mb-1">{{ $item->servicename }}</h3>
                            
                            <p class="text-blue-600 font-medium mb-2">
                                <i class="fas fa-hospital-alt mr-1"></i> {{ $item->clinicname }}
                            </p>
                            
                            <p class="text-gray-700 font-semibold mb-4">
                                <i class="fas fa-money-bill-wave mr-1"></i> {{ number_format($item->price, 0, ',', '.') }} ₫
                            </p>
                            
                            <a href="{{ route('serviceff', ['id' => $item->id_clinic]) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-6 rounded-full shadow-lg transition duration-300 w-full">
                                Đặt khám ngay
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Nút điều hướng -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>

        <div class="text-center mt-8">
            <a href="#" class="text-blue-600 hover:text-blue-800 font-semibold text-lg transition duration-300">Xem tất cả &gt;&gt;</a>
        </div>
    </div>
</section>


   
<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-extrabold text-blue-800 text-center mb-12">BÁC SĨ TƯ VẤN KHÁM BỆNH VÀ KÊ ĐƠN</h2>

        <!-- Swiper -->
        <div class="relative">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @isset($docter)
                    @foreach ($docter as $item)
                    <div class="swiper-slide">
                        <div class="ml-3 mb-3 bg-white rounded-2xl p-6 text-center flex flex-col items-center transform transition duration-300 hover:scale-105"
                            style="box-shadow: 0 15px 30px rgba(59, 130, 246, 0.35), 0 10px 20px rgba(59, 130, 246, 0.25);">

                            <div class="w-32 h-32 rounded-full overflow-hidden mb-4 border-4 border-blue-400">
                                <img src="{{ asset('image/' . $item->avatar) }}" class="w-full h-full object-cover">
                            </div>
                            <div class="text-sm text-gray-600 mb-2">
                                <i class="fas fa-star text-yellow-400"></i> Đánh giá : ... | Lượt khám : ...
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-1">{{$item->name}}</h3>
                            <p class="text-blue-600 font-medium mb-2"><i class="fas fa-stethoscope mr-1"></i>{{$item->spname}}</p>
                            <p class="text-gray-500 text-sm mb-4"><i class="fas fa-user-tie mr-1"></i> Bác sĩ Chuyên Khoa</p>
                            <a href="{{ route('servicebf', ['id' => $item->id_user]) }}"
                                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-6 rounded-full shadow-lg transition duration-300 w-full">
                                Tư vấn ngay
                            </a>
                        </div>
                    </div>
                    @endforeach
                    @endisset
                </div>

                <!-- Nút điều hướng -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>

        <div class="text-center mt-8">
            <a href="#" class="text-blue-600 hover:text-blue-800 font-semibold text-lg transition duration-300">Xem tất cả &gt;&gt;</a>
        </div>
    </div>
</section>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const swiper = new Swiper('.mySwiper', {
      slidesPerView: 4,
      spaceBetween: 20,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      breakpoints: {
        // Responsive từng kích thước màn hình
        320: {
          slidesPerView: 1,
          spaceBetween: 10,
        },
        640: {
          slidesPerView: 2,
          spaceBetween: 15,
        },
        1024: {
          slidesPerView: 4,
          spaceBetween: 20,
        },
      },
    });
  });
</script>
<script>
    new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 4,
            }
        }
    });
</script>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

@endsection