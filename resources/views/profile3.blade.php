
 
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
                    <a href="{{ route('profile3') }}" class=" {{ request()->routeIs('profile3') ? 'border-2 border-blue-500' : '' }} flex items-center space-x-3 text-gray-700 p-3 rounded-lg transition duration-300 hover:bg-gray-100">
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
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Danh sách đơn đặt khám</h2>
                <div class="mt-5 w-full max-w-2xl mx-auto">
                  <a href="{{ route('profile3') }}"
                  class="inline-block px-6 py-2 rounded-full text-white font-semibold bg-gradient-to-l from-[lightblue] to-[blue]">
                  <b>Chờ duyệt</b>
                </a>

                <a href="{{ route('profile32') }}"
                  class="inline-block px-6 py-2 rounded-full text-black font-semibold border-4 border-[#4cf5bc] bg-[#EEEDEB] hover:bg-[#e5e4e2]">
                  <b>Chưa thanh toán</b>
                </a>

                <a href="{{ route('profile33') }}"
                  class="inline-block px-6 py-2 rounded-full text-black font-semibold border-4 border-[#4cf5bc] bg-[#EEEDEB] hover:bg-[#e5e4e2]">
                  <b>Đã thanh toán và đã khám</b>
                </a>
                </div>
                <div>
                  @isset($results)
    @foreach ($results as $record)
        <div class="mb-4 mt-2 border-2 border-blue-600 rounded-xl shadow-md p-4 bg-white">
            <div>
                <p class="text-center text-xl font-bold text-blue-900">
                    Mã đơn khám: {{ $record->id_result }}
                </p>

                <p class="flex justify-between mt-2 text-base">
                    <span><i class="far fa-user"></i> Tên bệnh nhân:</span>
                    <span class="text-[blue] font-semibold text-right break-words">
                        {{ $record->prname }}
                    </span>
                </p>

                <p class="flex justify-between mt-2 text-base">
                    <span><i class="far fa-hospital"></i> Phòng khám:</span>
                    <span class="text-green-900 font-semibold text-right break-words">
                        {{ $record->clinicname }}
                    </span>
                </p>

                <p class="flex justify-between mt-2 text-base">
                    <span><i class="fas fa-calendar-alt"></i> Thời gian khám:</span>
                    <span class="text-green-900 font-semibold whitespace-nowrap text-right">
                    {{$record->time}}-{{ $record->day}}</span>
                </p>

                <hr class="my-3 border-t border-dashed border-gray-500" />

                <p class="flex justify-between mt-2 text-base">
                    <span><i class="fas fa-stopwatch"></i> Giờ kết thúc:</span>
                  {{$record->finishtime}}
                  </p>
              <p class="flex justify-between mt-2 text-base">
                    <span><i class="fas fa-calendar-alt"></i> Ngày đặt:</span>
                    <span class="text-green-900 font-semibold whitespace-nowrap text-right">
                     {{$record->booking_date}}</span>
                </p>

                <p class="flex justify-between mt-2 text-base">
                    <span><i class="fas fa-stethoscope"></i> Dịch vụ:</span>
                    <span class="text-right break-words">{{ $record->servicename }}</span>
                </p>

                <hr class="my-3 border-t border-dashed border-gray-500" />

                <p class="flex justify-between mt-2 text-base">
                    <span><i class="fas fa-notes-medical"></i> Lưu ý:</span>
                    <span class="text-right break-words">
                        Giờ khám và giờ kết thúc chỉ mang tính dự kiến, có thể sẽ muộn hơn.
                    </span>
                </p>

                <p class="flex justify-between mt-2 text-base">
                    <span><i class="fas fa-dollar-sign"></i> Giá dịch vụ:</span>
                    <span class="text-right text-[#fc4a5f] font-bold whitespace-nowrap">
                        {{ number_format($record->price, 0, '', '.') }}đ
                    </span>
                </p>

                <div class="flex justify-end mt-4">
                    <button type="button"
                        class="btn-delete bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md text-sm font-semibold"
                        data-id="{{ $record->id_result }}">
                        <i class="fas fa-trash-alt"></i> Hủy đơn
                    </button>
                </div>
            </div>
        </div>
    @endforeach
@endisset

@isset($results)
    <div class="container-footer-kt">
            <nav aria-label="Page navigation example" class="ml-5 footer-kt">
                {{ $results->links('pagination::bootstrap-4') }}
            </nav>
        </div>
    @endisset

  

<!-- Modal xác nhận xóa -->
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="delete-form" action="{{ route('xoaddk') }}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa đơn đã đặt</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Bạn có chắc chắn muốn xóa đơn này?</p>
          <input type="hidden" name="id_result" id="delete-id">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
          <button type="submit" class="btn btn-danger">Xóa</button>
        </div>
      </form>
    </div>
  </div>
</div>
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
<script>
  $(document).ready(function() {
    $('.btn-delete').on('click', function() {
      var id = $(this).data('id');
      $('#delete-id').val(id); // Thiết lập giá trị của input hidden
      $('#confirm-delete').modal('show'); // Hiển thị modal xác nhận
    });

    // Xử lý sau khi form được submit
    $('#delete-form').on('submit', function() {
      // Không cần thêm xử lý JavaScript ở đây nếu không sử dụng Ajax
    });
  });
</script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  