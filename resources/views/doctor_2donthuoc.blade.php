
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('ad/style.css') }}" rel="stylesheet">


    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <style>
  .ui-datepicker-calendar td {
    border: 1px solid #ddd; /* Add borders to cells */
    padding: 5px; /* Add padding for spacing */
  }

    .marked-day {
      background-color: #ff9900;
    }

    .ui-datepicker-calendar .ui-datepicker-other-month .ui-state-disabled {
      display: none; /* Hide days from other months */
    }
  </style>

</head>

<body>
    

    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border: 1px solid rgba(0, 0, 0, 0.1);">
            <nav class="navbar bg-light navbar-light" >
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"></i>DOCTOR</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4" >
                    <div class="position-relative">
                        <img class="rounded-circle" src="{{ asset('ad/img/user.jpg') }}" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"> {{ Auth::user()->name }}</h6>
                        <span>Doctor</span>
                    </div>
                </div>
                <div class="navbar-nav w-100" >
                    <a href="" class="nav-item nav-link "><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="{{ route('lichlamviec') }}" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Lịch làm việc</a>
                    <a href="" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Cập nhật kết quả khám</a>
                    <a href="" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Kê đơn thuốc</a>
                    <a href="" class="nav-item nav-link "><i class="fa fa-th me-2"></i>Trò chuyên</a>
                

                  
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border: 1px solid rgba(0, 0, 0, 0.1);">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
              
                <div class="navbar-nav align-items-center ms-auto">
                   
                   
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="{{ asset('ad/img/user.jpg') }}" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">  {{ Auth::user()->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">Thông tin</a>
                            <a href="{{ route('logout') }}" class="dropdown-item">Đăng xuất</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <!-- Blank Start -->

            <div class="container-fluid pt-4 px-4 ">
            <h4>Thông tin đơn thuốc</h4>
            <div class="container mt-5">
            <div class="custom-div" style="border: 1px solid #ccc; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); padding: 10px; margin-bottom: 10px;">
    @isset($mr)
    <p>Mã đơn: {{$mr->id_pre}}</p>
    <p>Tên bệnh nhân: {{$mr->name}}</p>
    <p>Chuẩn đoán: {{$mr->diagnostic}}</p>
    @endisset
</div>
<div class="custom-div" style="border: 1px solid #ccc; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); padding: 10px; margin-bottom: 10px;">
<h4>Cập nhật thông tin đơn thuốc</h4>
@isset($mr)

<form id="editForm" action="{{ url('capnhatttdt/'.$mr->id_pre) }}"  method="POST">
                @csrf

                <div class="mb-3">
                        <label for="hospitalname" class="form-label"> Tên bệnh nhân: </label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Chuẩn đoán: </label>
                        <input type="text" class="form-control" id="address" name="diagnostic">
                    </div> 
               
                <button type="submit" class="btn btn-primary">Cập nhật thông tin đơn</button>
            </div>
                </form>
                @endisset

</div>

<h4>Kê thuốc</h4>
<div class="custom-div" style="border: 1px solid #ccc; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); padding: 10px; margin-bottom: 10px;">
@isset($mr)

<form id="editForm" action="{{ url('capnhatdt/'.$mr->id_pre) }}"  method="POST">
                @csrf

                <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Thuốc:</label>
                                <div class="col-sm-10">

                                    @empty($medi)
                                    @endempty
                                    <select class="inp-tmnv form-select" name="id_medicine" id="phongban" >
                                        <option value=""></option> 
                                        @isset($medi)
                                            @foreach ($medi as $item)
                                            <option value="{{$item->id_medicine}}">{{$item->medicinename}}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                
                                   </div> 
                                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Liều lượng: </label>
                        <input type="text" class="form-control" id="address" name="information">
                    </div> 
                    <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Thuốc:</label>
                                <div class="col-sm-10">
                    
                    <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="btnUpdate">Cập nhật đơn thuốc</button>
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
</div>
<table class="table table-striped custab mt-4">
    <thead>
        <tr>
            <th>Tên thuốc</th>
            <th>Liều lượng</th>
            <th class="text-center">Tùy chọn</th>
        </tr>
    </thead>
    
    @isset($pm)
                            @foreach ($pm as $item)
                            <tr>
                        
                                <td>{{$item->id_prescription}}</td>
                                <td>{{$item->id_medicine}}</td>

                                <td class="text-center">       
                                    <button class="btn btn-danger btn-delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{$item->id_prescription}}-{{$item->id_medicine}}">Xóa lay ca 2 id</button>
                                </td>
                            </tr>
                         
                            @endforeach
                        @endisset

         

    </table>
    @isset($clinic)
    <div class="container-footer-kt">
            <nav aria-label="Page navigation example" class="ml-5 footer-kt">
                {{ $clinic->links('pagination::bootstrap-4') }}
            </nav>
        </div>
    @endisset


@isset($updatekq)
<div class="custom-div" style="border: 1px solid #ccc; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); padding: 10px; margin-bottom: 10px;">
<p>Kết quả: {{$updatekq->detail}}</p>
<img style="width: 40px; height: 40px"class="" src="{{ asset('image/' . $updatekq->image) }}" ></div>

<div class="custom-div" style="border: 1px solid #ccc; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); padding: 10px; margin-bottom: 10px;">
<h4>Viết kết quả:</h4>
<form  action="{{ url('capnhatkq/'.$updatekq->id_result) }}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Kết quả: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="detail" id="inputEmail3">
            </div>
        </div>
        <div class="row mb-3 mt-4">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Ảnh xét nghiệm: </label>
            <div class="col-sm-10">
            <input type="file" name="image" id="image">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>

</div>

@endisset

@isset($dk)
<a href="" class="btn btn-primary"> Đơn thuốc </a>

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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn xóa dịch vụ này này?
                    <input type="hidden" name="id_prescription" id="hospitalIdInput">
                    <input type="hidden" name="id_medicine" id="hospitalIdInput2">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Không</button>
                    <button type="submit" class="btn btn-danger">Có, xóa!</button> </div>
            </div>
        </form>
    </div>
</div>
        </div>
        <!-- Content End -->
  





    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.45/moment-timezone.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!-- Template Javascript -->
    <script src="{{ asset('ad/main.js') }}"></script>

</body>
<script>
  $(document).ready(function() {
    $('#deleteModal').on('show.bs.modal', function (event) {
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

</html>
