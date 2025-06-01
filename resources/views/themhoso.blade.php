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

    <section class="py-16 bg-white border-t border-gray-300">
        <div class="container mx-auto px-4">
            <div class="text-sm text-gray-600 mb-6 ">
                <a href="#" class="hover:underline">Trang chủ</a> > Thêm bệnh nhân
            </div>
            <h2 class="text-2xl font-extrabold text-blue-800 text-center mb-12">Tạo hồ sơ mới</h2>


            <div>
                <form action="{{ url('addhoso') }}" method="post"
                    class="max-w-2xl mx-auto p-6 bg-gray-100 rounded-lg shadow-md">
                    @csrf
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
                    <!-- Tên bệnh nhân -->
                    <div class="mb-4">
                        <label for="prname" class="block font-medium text-gray-700 mb-1">Tên bệnh nhân:</label>
                        <input type="text" name="prname" id="prname" value="{{ old('prname') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    </div>

                    <!-- Ngày sinh -->
                    <div class="mb-4">
                        <label for="birthday" class="block font-medium text-gray-700 mb-1">Ngày sinh:</label>
                        <input type="date" name="birthday" id="birthday" value="{{ old('birthday') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    </div>

                    <!-- Số điện thoại -->
                    <div class="mb-4">
                        <label for="phonenumber" class="block font-medium text-gray-700 mb-1">Số điện thoại:</label>
                        <input type="tel" name="phonenumber" id="phonenumber" value="{{ old('phonenumber') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    </div>

                    <!-- Giới tính -->
                    <div class="mb-4">
                        <label for="gender" class="block font-medium text-gray-700 mb-1">Giới tính:</label>
                        <select name="gender" id="gender"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Nam</option>
                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Nữ</option>
                        </select>
                    </div>

                    <!-- Địa chỉ -->
                    <div class="mb-6">
                        <label for="address" class="block font-medium text-gray-700 mb-1">Địa chỉ:</label>
                        <input type="text" name="address" id="address" value="{{ old('address') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    </div>

                    <!-- Nút gửi -->
                    <div class="text-right">
                        <button type="submit"
                            class="bg-blue-600 text-white px-5 py-2 rounded-md hover:bg-blue-700 transition duration-200">
                            Thêm
                        </button>
                    </div>
                </form>

            </div>

        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
