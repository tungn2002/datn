<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
@extends('layouts.app')
@section('content')

      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container mx-auto px-4 py-8">
    <div class="text-sm text-gray-600 mb-6">
        <a href="#" class="hover:underline">Trang chủ</a> > Hồ sơ bệnh nhân
    </div>

    <div class="flex flex-col md:flex-row gap-8">
        <div class="w-full md:w-1/4 bg-white rounded-lg shadow-md p-6">
            <h3 class="font-semibold text-lg mb-4"></h3>
            <ul class="space-y-4">
                <li>
                    <a href="{{ route('themhoso') }} "class="flex items-center space-x-3 text-blue-600 font-semibold p-3 bg-blue-50 rounded-lg transition duration-300 hover:bg-blue-100">
                        <i class="fas fa-plus-circle text-xl"></i>
                        <span>Thêm hồ sơ</span>
                    </a>
                </li>
            <li>
                  <a href="{{ route('profile2') }}"
                    class="flex items-center space-x-3 text-gray-700 p-3 rounded-lg transition duration-300 hover:bg-gray-100
                    {{ request()->routeIs('profile2') ? 'border-2 border-blue-500' : '' }}">
                      <i class="fas fa-user-injured text-xl"></i>
                      <span>Hồ sơ bệnh nhân</span>
                  </a>
              </li>

                    <li>
                    <a href="{{ route('profile') }}" class="flex items-center space-x-3 text-gray-700 p-3 rounded-lg transition duration-300 hover:bg-gray-100  {{ request()->routeIs('profile') ? 'border-2 border-blue-500' : '' }}">
                          <i class="fas fa-user text-xl"></i>
                        <span>Thông tin cá nhân</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('profile3') }}" class="flex items-center space-x-3 text-gray-700 p-3 rounded-lg transition duration-300 hover:bg-gray-100">
                        <i class="fas fa-file-medical text-xl"></i>
                        <span>Đơn khám bệnh</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('trochuyenuser') }}" class="flex items-center space-x-3 text-gray-700 p-3 rounded-lg transition duration-300 hover:bg-gray-100 relative">
                        <i class="fas fa-message text-xl"></i>
                        <span>Trò chuyện</span>
                    </a>
                </li>
            </ul>
        </div>

          <div class="w-full md:w-3/4 border-l-4 border-blue-500 pl-4">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Thông tin tài khoản</h2>
                <div class="mt-5 w-full max-w-2xl mx-auto">
                  <div class="border-2 border-blue-600 shadow-lg rounded-xl p-6 bg-white">
                      <p class="mb-2">
                          <i class="fas fa-user mr-2"></i> Tên:
                          <span class="text-[blue] font-bold">{{ $user->name }}</span>
                      </p>
                      <p class="mb-2">
                          <i class="fas fa-envelope mr-2"></i> Email:
                          <span class="text-[black] font-bold">{{ $user->email }}</span>
                      </p>
                      <p class="mb-4">
                          <i class="fas fa-phone-alt mr-2"></i> Số điện thoại:
                          <span class="text-[black] font-bold">{{ $user->phonenumber }}</span>
                      </p>
                      <hr class="my-4 border-gray-300">
                      <div class="flex justify-end">
                          <button type="button"
                              class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-200"
                              data-toggle="modal" data-target="#editModal">
                              <i class="fas fa-edit mr-1"></i> Sửa thông tin
                          </button>
                      </div>
                  </div>
                </div>

        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Sửa Thông Tin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('editprofile') }}" method="post" >
                  					@csrf

                    <div class="form-group">
                        <label for="name">Tên</label>
                        <input type="text" class="form-control" id="name" value="{{$user->name}}" name="name" placeholder="Nhập tên">
                    </div>
                    <div class="form-group">
                        <label for="phone">Số điện thoại</label>
                        <input type="tel" class="form-control" id="phone" name="phonenumber" value="{{$user->phonenumber}}" placeholder="Nhập số điện thoại">
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu">
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">Nhập lại mật khẩu</label>
                        <input type="password" class="form-control" id="confirm-password" name="confirm_password" placeholder="Nhập lại mật khẩu">
                    </div>
                    <button type="submit" class="btn btn-primary">Sửa</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

@if(Session::has('message'))
<script>
toastr.options={
  "progressBar": true,
  "closeButton": true
};
toastr.success("{{Session::get('message')}}",'Thành công!')
</script>
@endif


