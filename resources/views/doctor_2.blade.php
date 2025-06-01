<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Bác sĩ</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('ad/style.css') }}" rel="stylesheet">


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
                    <a href="{{ route('doctor') }}" class="nav-item nav-link "><i class="far fa-id-card"></i>Thông tin
                        cá nhân</a>
                    <a href="{{ route('lichlamviec') }}" class="nav-item nav-link active"><i
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
                <h4>Lịch làm việc</h4>

                <div id="calendar"></div>


            </div>
            <!-- Blank End -->



            <table id="appointmentTable" class="table table-striped table-bordered table-hover mt-4"
                style="border:1px solid #d4d4d4 ;border-radius: 12px; overflow: hidden;border-collapse: separate; border-spacing: 0;">
                <thead class="thead-light" style="background-color: #9beeff; color: #333333;">
                    <tr style="transition: background-color 0.3s, transform 0.3s; cursor: pointer;"
                        onmouseover="this.style.backgroundColor='#f1f1f1';" onmouseout="this.style.backgroundColor='';">
                        <th>Mã lịch</th>
                        <th>Ngày khám</th>
                        <th>Giờ khám (dự kiến)</th>
                        <th class="text-center">Tùy chọn</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($results)
                        @foreach ($results as $appointment)
                            <tr>
                                <td>{{ $appointment->id_appointment }}</td>
                                <td>{{ $appointment->day }}</td>
                                <td>{{ substr($appointment->time, 0, 5) }}-{{ substr($appointment->finishtime, 0, 5) }}
                                </td>

                                <td class="text-center">
                                    <a class="btn btn-warning btn-edit"
                                        style=" border-radius: 6px; box-shadow: 0 4px 8px rgba(0,0,0,0.3); border: none; transition: background-color 0.3s, transform 0.3s;"
                                        href="{{ route('lichlamviecdetail', ['id' => $appointment->id_appointment]) }}">Thông
                                        tin bệnh nhân</a>
                                </td>
                            </tr>
                        @endforeach
                    @endisset
                </tbody>
            </table>

            @isset($results)
                <div class="container-footer-kt">
                    <nav aria-label="Page navigation example" class="ml-5 footer-kt">
                        {{ $results->links('pagination::bootstrap-4') }}
                    </nav>
                </div>
            @endisset

        </div>
        <!-- Content End -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
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







        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        <!-- Template Javascript -->
        <script src="{{ asset('ad/main.js') }}"></script>


        <script>
            $(document).ready(function() {
                var markedDates = @json($markedDates);
                $("#calendar").datepicker({
                    beforeShowDay: function(date) {
                        //  var markedDates = ["2024-06-15", "2024-06-20", "2024-06-25"];
                        var formattedDate = $.datepicker.formatDate('yy-mm-dd', date);

                        if (markedDates.indexOf(formattedDate) != -1) {
                            return [true, "marked-day", "Marked Day"];
                        } else {
                            return [false, "", ""]; // Disable unmarked days
                        }
                    },
                    onSelect: function(dateText, inst) {
                        var formattedDate = dateText.replace(/\//g,
                        '-'); // Thay thế tất cả các '/' thành '-'
                        var url = '/lichlamviecf/' + formattedDate;
                        window.location.href = url;
                    }
                    // Restrict to single selection (optional)
                });
            });
        </script>
</body>

</html>
