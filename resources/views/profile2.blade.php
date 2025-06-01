
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
                    <a href="{{ route('profile') }}" class="flex items-center space-x-3 text-gray-700 p-3 rounded-lg transition duration-300 hover:bg-gray-100">
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
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Danh sách hồ sơ bệnh nhân</h2>

          @isset($patientRecords)
              @foreach ($patientRecords as $record)
              
              
               <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-700">
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-user text-blue-500"></i>
                        <p><span class="font-semibold">Họ và tên:</span> {{ $record->prname }}</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-calendar-alt text-blue-500"></i>
                        <p><span class="font-semibold">Ngày sinh:</span>{{ $record->birthday }}</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-phone text-blue-500"></i>
                        <p><span class="font-semibold">Số điện thoại:</span> {{ $record->phonenumber }}</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-venus-mars text-blue-500"></i>
                        <p><span class="font-semibold">Giới tính:</span> {{ $record->gender == 'male' ? 'Nam' : ($record->gender == 'female' ? 'Nữ' : 'Khác') }} </p>
                    </div>
                    <div class="flex items-center space-x-2 col-span-1 md:col-span-2">
                        <i class="fas fa-map-marker-alt text-blue-500"></i>
                        <p><span class="font-semibold">Địa chỉ:</span> {{ $record->address }}</p>
                    </div>
                    
                </div>
                <div class="flex justify-end space-x-4 mt-6 border-t pt-4">
                    <button data-id="{{ $record->id_pr }}" class="btn-delete text-red-500 hover:text-red-700 transition duration-300 flex items-center space-x-1">
                        <i class="fas fa-trash-alt"></i>
                        <span>Xóa hồ sơ</span>
                    </button>
                    <button  data-id="{{ $record->id_pr }}" data-name="{{ $record->prname }}" data-birthday="{{ $record->birthday }}" data-phone="{{ $record->phonenumber }}" data-gender="{{ $record->gender }}" data-address="{{ $record->address }}" class="btn-edit text-blue-500 hover:text-blue-700 transition duration-300 flex items-center space-x-1">
                        <i class="fas fa-edit"></i>
                        <span>Sửa hồ sơ</span>
                    </button>
                </div>
            </div>

          @endforeach
              @endisset
            
          @isset($patientRecords)
              <div class="container-footer-kt flex justify-center">
                      <nav aria-label="Page navigation example" class="ml-5 footer-kt">
                          {{ $patientRecords->links('pagination::bootstrap-4') }}
                      </nav>
                  </div>
              @endisset
        </div>
    </div>
</div>
@endsection
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<!-- Modal xác nhận xóa -->
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="delete-form" action="{{ route('xoahs') }}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa hồ sơ bệnh nhân</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Bạn có chắc chắn muốn xóa hồ sơ này?</p>
          <input type="hidden" name="id_pr" id="delete-id">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
          <button type="submit" class="btn btn-danger">Xóa</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal sửa hồ sơ -->
<div class="modal fade" id="edit-profile-modal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="edit-form" action="{{ route('capnhaths') }}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="editProfileModalLabel">Sửa thông tin hồ sơ bệnh nhân</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id_pr" id="edit-id">
          <div class="form-group">
            <label for="edit-name">Tên</label>
            <input type="text" class="form-control" id="edit-name" name="prname" required>
          </div>
          <div class="form-group">
            <label for="edit-birthday">Ngày sinh</label>
            <input type="date" class="form-control" id="edit-birthday" name="birthday" required>
          </div>
          <div class="form-group">
            <label for="edit-phone">Số điện thoại</label>
            <input type="text" class="form-control" id="edit-phone" name="phonenumber" required>
          </div>
          <div class="form-group">
            <label for="edit-gender">Giới tính</label>
            <select class="form-control" id="edit-gender" name="gender" required>
              <option value="male">Nam</option>
              <option value="female">Nữ</option>
            </select>
          </div>
          <div class="form-group">
            <label for="edit-address">Địa chỉ</label>
            <input type="text" class="form-control" id="edit-address" name="address" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
          <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
        </div>
      </form>
    </div>
  </div>
</div>






  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


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
<script>
  $(document).ready(function() {
    // Xử lý khi nhấn nút Sửa hồ sơ
    $('.btn-edit').on('click', function() {
      var id = $(this).data('id');
      var name = $(this).data('name');
      var birthday = $(this).data('birthday');
      var phone = $(this).data('phone');
      var gender = $(this).data('gender');
      var address = $(this).data('address');

      $('#edit-id').val(id);
      $('#edit-name').val(name);
      $('#edit-birthday').val(birthday);
      $('#edit-phone').val(phone);
      $('#edit-gender').val(gender);
      $('#edit-address').val(address);

      $('#edit-profile-modal').modal('show');
    });

    // Xử lý sau khi form sửa được submit
    $('#edit-form').on('submit', function() {
      // Không cần thêm xử lý JavaScript ở đây nếu không sử dụng Ajax
    });
  });
</script>

