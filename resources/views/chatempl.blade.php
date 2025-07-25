<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Nhân viên</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->


    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('ad/style.css') }}" rel="stylesheet">
    <style>
        .chat {
            margin-top: auto;
            margin-bottom: auto;
        }

        .card {
            height: 500px;
            border-radius: 15px !important;
            background-color: rgba(0, 0, 0, 0.4) !important;
        }

        .contacts_body {
            padding: 0.75rem 0 !important;
            overflow-y: auto;
            white-space: nowrap;
        }

        .msg_card_body {
            overflow-y: auto;
        }

        .card-header {
            border-radius: 15px 15px 0 0 !important;
            border-bottom: 0 !important;
        }

        .card-footer {
            border-radius: 0 0 15px 15px !important;
            border-top: 0 !important;
        }

        .container {
            align-content: center;
        }

        .search {
            border-radius: 15px 0 0 15px !important;
            background-color: rgba(0, 0, 0, 0.3) !important;
            border: 0 !important;
            color: white !important;
        }

        .search:focus {
            box-shadow: none !important;
            outline: 0px !important;
        }

        .type_msg {
            background-color: rgba(0, 0, 0, 0.3) !important;
            border: 0 !important;
            color: white !important;
            height: 60px !important;
            overflow-y: auto;
        }

        .type_msg:focus {
            box-shadow: none !important;
            outline: 0px !important;
        }

        .attach_btn {
            border-radius: 15px 0 0 15px !important;
            background-color: rgba(0, 0, 0, 0.3) !important;
            border: 0 !important;
            color: white !important;
            cursor: pointer;
        }

        .send_btn {
            border-radius: 0 15px 15px 0 !important;
            background-color: rgba(0, 0, 0, 0.3) !important;
            border: 0 !important;
            color: white !important;
            cursor: pointer;
        }

        .search_btn {
            border-radius: 0 15px 15px 0 !important;
            background-color: rgba(0, 0, 0, 0.3) !important;
            border: 0 !important;
            color: white !important;
            cursor: pointer;
        }

        .contacts {
            list-style: none;
            padding: 0;
        }

        .contacts li {
            width: 100% !important;
            padding: 5px 10px;
            margin-bottom: 15px !important;
        }

        .active {
            background-color: rgba(0, 0, 0, 0.3);
        }

        .user_img {
            height: 70px;
            width: 70px;
            border: 1.5px solid #f5f6fa;

        }

        .user_img_msg {
            height: 40px;
            width: 40px;
            border: 1.5px solid #f5f6fa;

        }

        .img_cont {
            position: relative;
            height: 70px;
            width: 70px;
        }

        .img_cont_msg {
            height: 40px;
            width: 40px;
        }

        .online_icon {
            position: absolute;
            height: 15px;
            width: 15px;
            background-color: #4cd137;
            border-radius: 50%;
            bottom: 0.2em;
            right: 0.4em;
            border: 1.5px solid white;
        }

        .offline {
            background-color: #c23616 !important;
        }

        .user_info {
            margin-top: auto;
            margin-bottom: auto;
            margin-left: 15px;
        }

        .user_info span {
            font-size: 20px;
            color: white;
        }

        .user_info p {
            font-size: 10px;
            color: rgba(255, 255, 255, 0.6);
        }

        .video_cam {
            margin-left: 50px;
            margin-top: 5px;
        }

        .video_cam span {
            color: white;
            font-size: 20px;
            cursor: pointer;
            margin-right: 20px;
        }

        .msg_cotainer {
            margin-top: auto;
            margin-bottom: auto;
            margin-left: 10px;
            border-radius: 25px;
            background-color: #82ccdd;
            padding: 10px;
            position: relative;
        }

        .msg_cotainer_send {
            margin-top: auto;
            margin-bottom: auto;
            margin-right: 10px;
            border-radius: 25px;
            background-color: #78e08f;
            padding: 10px;
            position: relative;
        }

        .msg_time {
            position: absolute;
            left: 0;
            bottom: -15px;
            color: rgba(255, 255, 255, 0.5);
            font-size: 10px;
        }

        .msg_time_send {
            position: absolute;
            right: 0;
            bottom: -15px;
            color: rgba(255, 255, 255, 0.5);
            font-size: 10px;
        }

        .msg_head {
            position: relative;
        }

        #action_menu_btn {
            position: absolute;
            right: 10px;
            top: 10px;
            color: white;
            cursor: pointer;
            font-size: 20px;
        }

        .action_menu {
            z-index: 1;
            position: absolute;
            padding: 15px 0;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border-radius: 15px;
            top: 30px;
            right: 15px;
            display: none;
        }

        .action_menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .action_menu ul li {
            width: 100%;
            padding: 10px 15px;
            margin-bottom: 5px;
        }

        .action_menu ul li i {
            padding-right: 10px;

        }

        .action_menu ul li:hover {
            cursor: pointer;
            background-color: rgba(0, 0, 0, 0.2);
        }

        @media(max-width: 576px) {
            .contacts_card {
                margin-bottom: 15px !important;
            }
        }
    </style>
</head>

<body>


    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3"
            style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border: 1px solid rgba(0, 0, 0, 0.1);">
            <nav class="navbar bg-light navbar-light">
                <a href="{{ route('empl') }}" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fas fa-user-check"></i> Nhân viên</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">

                </div>
                <div class="navbar-nav w-100">
                    <a href="{{ route('empl') }}" class="nav-item nav-link "><i class="fas fa-id-card"></i>Thông tin cá
                        nhân</a>
                    <a href="{{ route('empl_choduyet') }}" class="nav-item nav-link"><i
                            class="far fa-check-square"></i>Xác nhận đơn</a>

                    <a href="{{ route('trochuyenempl') }}" class="nav-item nav-link active"><i
                            class="fas fa-sms"></i>Trò chuyện</a>



                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0"
                style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border: 1px solid rgba(0, 0, 0, 0.1);">
                <a href="{{ route('empl') }}" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fas fa-user-check"></i></h2>
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
                <h4>Hỗ trợ khách hàng</h4>




                <div class="container">

                    <div class="row d-flex align-items-stretch">
                        <div class="col-md-8 col-xl-10 chat">
                            <div class="card"
                                style="	
   background: -webkit-linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);
    background: linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);">
                                <div class="card-header msg_head">
                                    <div class="d-flex bd-highlight">
                                        <div class="img_cont">
                                            <img src="{{ asset('anhnv.png') }}" class="rounded-circle user_img">
                                        </div>
                                        <div class="user_info">
                                            <span> @isset($u)
                                                    Trò chuyện với {{ $u->name }}
                                                @endisset
                                            </span>
                                        </div>
                                    </div>
                                    <span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
                                </div>

                                <div class="card-body msg_card_body" id="sc">
                                    <div id="message-container">
                                        <!-- Messages will be dynamically loaded here -->
                                    </div>
                                </div>

                                <form action="{{ url('addmessage2') }}" method="post" id="addpost">
                                    @csrf
                                    <div class="card-footer">
                                        <div class="input-group">
                                            <input hidden value="{{ $idcon }}" name="idcon" type="text">
                                            <div class="input-group-append">
                                                <span class="input-group-text attach_btn" style="height: 100%;"></span>
                                            </div>
                                            <textarea name="message" class="form-control type_msg"></textarea>
                                            <div class="input-group-append">
                                                <span class="input-group-text send_btn" style="height: 100%;"><button
                                                        type="submit"
                                                        style="color: #fff; background: none; border: none; padding: 0; "><i
                                                            class="fas fa-location-arrow"></i> </button></span>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>















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



            @isset($hospital)
                <div class="container-footer-kt">
                    <nav aria-label="Page navigation example" class="ml-5 footer-kt">
                        {{ $hospital->links('pagination::bootstrap-4') }}
                    </nav>
                </div>
            @endisset
        </div>
        <!-- Content End -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <form method="POST" action="{{ route('xoahos') }}" id="deleteForm">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Xác nhận xóa</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Bạn có chắc chắn muốn xóa bệnh viện này?
                            <input type="hidden" name="id_hospital" id="hospitalIdInput">
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
                        <h5 class="modal-title" id="editModalLabel">Sửa Thông Tin Bệnh Viện</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editForm" action="" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="hospitalname" class="form-label">Tên Bệnh Viện</label>
                                <input type="text" class="form-control" id="hospitalname" name="hospitalname">
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Địa Chỉ</label>
                                <input type="text" class="form-control" id="address" name="address">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                <button type="submit" class="btn btn-primary" id="btnUpdate">Lưu Thay Đổi</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- Back to Top -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

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
            var hospitalName = row.find('td:eq(1)').text(); // Ô thứ 2 chứa tên bệnh viện
            var address = row.find('td:eq(2)').text(); // Ô thứ 3 chứa địa chỉ

            // Điền dữ liệu vào form
            $('#editHospitalId').val(hospitalId);
            $('#hospitalname').val(hospitalName);
            $('#address').val(address);
            $('#editForm').attr('action', '{{ url('capnhathos') }}/id=' + hospitalId);

        });
    </script>

    <script>
        //load tin nhắn mỗi 3 giây
        var k = @json($idcon);
        var isFirstLoad = true;

        function reloadData() {

            $.ajax({

                url: `/messages2/` + k,
                type: 'GET',
                dataType: 'json', //định dạng trao đổi dl
                success(response) {

                    // Xóa dl trước khi hiện lại
                    $('#message-container').empty();
                    // hiện tin mới
                    response.forEach(function(item) { //nếu là người đang dùng thì hiện tin bên phải 
                        if (item.sender_id != {{ Auth::user()->id_user }}) {
                            $('#message-container').append(`
                            <div class="d-flex justify-content-start mb-4">
                                <div class="img_cont_msg">
                                    <img src="{{ asset('anhnv.png') }}" class="rounded-circle user_img_msg">
                                </div>
                                <div class="msg_cotainer">
                                    ${item.content}
                                </div>
                            </div>
                        `);
                        } else {
                            $('#message-container').append(`
                            <div class="d-flex justify-content-end mb-4">
                                <div class="msg_cotainer_send">
                                    ${item.content}
                                </div>
                                <div class="img_cont_msg">
                                </div>
                            </div>
                        `);
                        }
                    });
                    if (isFirstLoad) {
                        $('#sc')[0].scrollTop = 999;
                        isFirstLoad = false; // Đánh dấu đã tải trang lần đầu đưa xuống tin cuối
                    }
                    setTimeout(reloadData, 3000); //sau 3 giây
                }
            });
        }
        reloadData();
    </script>


    <script>
        //gửi tin không load trang-chuỗi gửi dl qua form
        $(document).ready(function() {
            $('#addpost').on('submit', function(event)

                {
                    event.preventDefault();
                    jQuery.ajax({
                        url: "{{ url('addmessage2') }}",
                        data: jQuery('#addpost').serialize(),
                        type: 'post',

                        success: function(result) {

                            jQuery('#addpost').find('textarea[name="message"]').val('');
                        }
                    })
                }
            );
        });
    </script>

</body>

</html>
