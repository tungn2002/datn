<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Bác sĩ</title>
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <style>
        .ui-datepicker-calendar td {
            border: 1px solid #ddd;
            /* Add borders to cells */
            padding: 5px;
            /* Add padding for spacing */
        }

        .marked-day {
            background-color: #ff9900;
        }

        .ui-datepicker-calendar .ui-datepicker-other-month .ui-state-disabled {
            display: none;
            /* Hide days from other months */
        }
    </style>

</head>

<body>


    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3"
            style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border: 1px solid rgba(0, 0, 0, 0.1);">
            <nav class="navbar bg-light navbar-light">
                <a href="{{ route('doctor') }}" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fas fa-user-nurse"></i> Bác sĩ</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">

                </div>
                <div class="navbar-nav w-100">
                    <a href="{{ route('doctor') }}" class="nav-item nav-link"><i class="far fa-id-card"></i>Thông tin cá
                        nhân</a>
                    <a href="{{ route('lichlamviec') }}" class="nav-item nav-link"><i
                            class="fas fa-calendar-alt"></i>Lịch làm việc</a>
                    <a href="{{ route('trochuyendoctor') }}" class="nav-item nav-link "><i
                            class="fas fa-comment-dots"></i>Trò chuyện</a>



                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0"
                style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border: 1px solid rgba(0, 0, 0, 0.1);">
                <a href="{{ route('doctor') }}" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fas fa-user-nurse"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>

                <div class="navbar-nav align-items-center ms-auto">


                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2"src="{{ asset('image/' . Auth::user()->avatar) }}"
                                alt="" style="width: 40px; height: 40px;">
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
                <h4>Thông tin đơn thuốc</h4>
                <div class="container mt-5">
                    <div class="custom-div mt-4"
                        style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-right: 3px solid rgba(0, 0, 0, 0.1); border-left: 3px solid lightblue; border-top: 3px solid lightblue; border-bottom: 1px solid lightblue; padding: 20px; border-radius: 10px;">
                        @isset($mr)
                            <p><i class="fas fa-file-medical"></i> Mã đơn: {{ $mr->id_pre }}</p>
                            <p><i class="fas fa-user-injured"></i> Tên bệnh nhân: {{ $mr->name }}</p>
                            <p><i class="fas fa-notes-medical"></i> Chẩn đoán: {{ $mr->diagnostic }}</p>
                        @endisset
                    </div>
                    <div class="custom-div mt-4"
                        style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-right: 3px solid rgba(0, 0, 0, 0.1); border-left: 3px solid lightblue; border-top: 3px solid lightblue; border-bottom: 1px solid lightblue; padding: 20px; border-radius: 10px;">
                        <h4 style="color: #33CCFF	;">Cập nhật thông tin đơn thuốc</h4>
                        @isset($mr)
                            <form id="editForm" action="{{ url('capnhatttdt/' . $mr->id_pre) }}" method="POST">
                                @csrf

                                <div class="mb-3" style="display: flex; align-items: center;">
                                    <label for="name" class="form-label" style="margin-right: 10px; width: 150px;">Tên
                                        bệnh nhân:</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        style="flex: 1;">
                                </div>
                                <div class="mb-3" style="display: flex; align-items: center;">
                                    <label for="diagnostic" class="form-label"
                                        style="margin-right: 10px; width: 150px;">Chẩn đoán:</label>
                                    <input type="text" class="form-control" id="address" name="diagnostic"
                                        style="flex: 1;">
                                </div>

                                <div class=" d-flex justify-content-end">

                                    <button type="submit" class="btn btn-primary">Cập nhật thông tin đơn</button>
                                </div>
                        </div>
                        </form>
                    @endisset

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

                <div class="custom-div mt-4"
                    style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-right: 3px solid rgba(0, 0, 0, 0.1); border-left: 3px solid lightblue; border-top: 3px solid lightblue; border-bottom: 1px solid lightblue; padding: 20px; border-radius: 10px;">
                    <h4 style="color: #33CCFF	;">Kê thuốc</h4>
                    @isset($mr)

                        <form id="editForm" action="{{ url('capnhatdt/' . $mr->id_pre) }}" method="POST">
                            @csrf

                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Thuốc:</label>
                                <div class="col-sm-10">


                                    <select class="inp-tmnv form-select" name="id_medicine" id="phongban">

                                        @isset($medi)
                                            @foreach ($medi as $item)
                                                <option value="{{ $item->id_medicine }}">{{ $item->medicinename }}</option>
                                            @endforeach
                                        @endisset
                                    </select>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Liều lượng: </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="address" name="information">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" id="btnUpdate">Cập nhật đơn thuốc</button>

                                @isset($mr)
                                    <a class="btn btn-primary pl-4" href="{{ route('pdf', ['id' => $mr->id_pre]) }}"><i
                                            class="fas fa-file-export"></i> In đơn thuốc</a>
                                @endisset
                            </div>
                        </form>
                    @endisset

                </div>

            </div>
            <div class="container-fluid pt-4 px-4 ">

                <table class="table table-striped table-bordered table-hover mt-4"
                    style="border:1px solid #d4d4d4 ;border-radius: 12px; overflow: hidden;border-collapse: separate; border-spacing: 0;">
                    <thead class="thead-light" style="background-color: #9beeff; color: #333333;">
                        <tr style="transition: background-color 0.3s, transform 0.3s; cursor: pointer;"
                            onmouseover="this.style.backgroundColor='#f1f1f1';"
                            onmouseout="this.style.backgroundColor='';">
                            <th>Tên thuốc</th>
                            <th>Liều lượng</th>
                            <th class="text-center">Tùy chọn</th>
                        </tr>
                    </thead>

                    @isset($pm)
                        @foreach ($pm as $item)
                            <tr>

                                <td>{{ $item->medicinename }}</td>
                                <td>{{ $item->information }}</td>

                                <td class="text-center">
                                    <button class="btn btn-danger btn-delete"
                                        style=" border-radius: 6px; box-shadow: 0 4px 8px rgba(0,0,0,0.3); border: none; transition: background-color 0.3s, transform 0.3s;"
                                        data-bs-toggle="modal" data-bs-target="#deleteModal"
                                        data-id="{{ $item->id_prescription }}-{{ $item->id_medicine }}">Xóa</button>
                                </td>
                            </tr>
                        @endforeach
                    @endisset


                </table>
            </div>

            @isset($clinic)
                <div class="container-footer-kt">
                    <nav aria-label="Page navigation example" class="ml-5 footer-kt">
                        {{ $clinic->links('pagination::bootstrap-4') }}
                    </nav>
                </div>
            @endisset


            @isset($updatekq)
                <div class="custom-div"
                    style="border: 1px solid #ccc; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); padding: 10px; margin-bottom: 10px;">
                    <p>Kết quả: {{ $updatekq->detail }}</p>
                    <img style="width: 40px; height: 40px"class="" src="{{ asset('image/' . $updatekq->image) }}">
                </div>

                <div class="custom-div"
                    style="border: 1px solid #ccc; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); padding: 10px; margin-bottom: 10px;">
                    <h4>Viết kết quả:</h4>
                    <form action="{{ url('capnhatkq/' . $updatekq->id_result) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Kết quả: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="detail" id="inputEmail3">
                            </div>
                        </div>
                        <div class="row mb-3 mt-4">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Ảnh khám: </label>
                            <div class="col-sm-10">
                                <input type="file" name="image" id="image">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>

                </div>
            @endisset

        </div>

    </div>
    <!-- Blank End -->


    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('xoadtd') }}" id="deleteForm">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Xác nhận xóa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Bạn có chắc chắn muốn xóa thuốc này?
                        <input type="hidden" name="id_prescription" id="hospitalIdInput">
                        <input type="hidden" name="id_medicine" id="hospitalIdInput2">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Không</button>
                        <button type="submit" class="btn btn-danger">Có, xóa!</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    </div>
    <!-- Content End -->






    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!-- Template Javascript -->
    <script src="{{ asset('ad/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
<script>
    $(document).ready(function() {
        $('#deleteModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Nút "Xóa" được click
            var hospitalId = button.data('id').split('-'); // Lấy ID từ data-id của nút


            const prescriptionId = hospitalId[0];
            const medicineId = hospitalId[1];


            var modal = $(this);
            modal.find('#hospitalIdInput').val(prescriptionId); // Điền ID vào input
            modal.find('#hospitalIdInput2').val(medicineId);
            // Cập nhật action của form
            var form = modal.find('#deleteForm');
            form.attr('action', form.attr('action').replace(':hospitalId', hospitalId));
        });
    });
</script>
<script type="text/javascript">
    $("#phongban").select2();
</script>

</html>
