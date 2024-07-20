
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
</head>

<body>
    
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border: 1px solid rgba(0, 0, 0, 0.1);">
            <nav class="navbar bg-light navbar-light" >
                <a href="{{ route('doctor') }}" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fas fa-user-nurse"></i> Bác sĩ</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4" >
                    
                </div>
                <div class="navbar-nav w-100" >
                    <a href="{{ route('doctor') }}" class="nav-item nav-link active"><i class="far fa-id-card"></i>Thông tin cá nhân</a>
                    <a href="{{ route('lichlamviec') }}" class="nav-item nav-link"><i class="fas fa-calendar-alt"></i>Lịch làm việc</a>
                    <a href="{{ route('trochuyendoctor') }}" class="nav-item nav-link "><i class="fas fa-comment-dots"></i>Trò chuyện</a>
                

                  
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border: 1px solid rgba(0, 0, 0, 0.1);">
                <a href="{{ route('doctor') }}" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fas fa-user-nurse"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
              
                <div class="navbar-nav align-items-center ms-auto">
                   
                   
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2"src="{{ asset('image/' . Auth::user()->avatar) }}" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">  {{ Auth::user()->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="{{ route('logout') }}" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <!-- Blank Start -->

            <div class="container-fluid pt-4 px-4 ">
            <h4>Thông tin bác sĩ:</h4>
            
            <div class="col-sm-12 col-xl-6" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-right: 3px solid rgba(0, 0, 0, 0.1); border-left: 3px solid lightblue; border-top: 3px solid lightblue; border-bottom: 1px solid lightblue; padding: 20px; border-radius: 10px;width: 50em">
                    <p><i class="fas fa-user"></i> Tên: <b style="color: #003553">{{ Auth::user()->name }}</b></p>
                    <p><i class="fas fa-envelope"></i> Email: <b style="color: #003553">{{ Auth::user()->email }}</b></p>
                    <p><i class="fas fa-phone-alt"></i> Số điện thoại: <b style="color: #003553">{{ Auth::user()->phonenumber }}</b></p>
                    <p><i class="fas fa-stethoscope"></i> Chuyên khoa: <b>{{$sp->spname}}</b></p>
                    <p><i class="far fa-image"></i> Ảnh đại diện và chữ ký:</p>
                    <div class="image-container">
                    <img style="height: 150px;width: 150px" src="{{ asset('image/' . Auth::user()->avatar) }}" alt="Left Image" class="left-image">
                    <img style="height: 100px;width: 100px" src="{{ asset('image/' . Auth::user()->signature) }}" alt="Right Image" class="right-image">
                    </div>
                    <hr style="  border-top: 1px dashed black">
                    @isset($clinic)
                    <p><i class="fas fa-clinic-medical"></i> Phòng làm việc: <b style="color: #003553">{{ $clinic->clinicname }}</b></p>
                    <p><i class="fas fa-briefcase"></i> Dịch vụ khám: <b style="color: #003553">{{ $clinic->servicename }}</b></p>
                    <p><i class="fas fa-info"></i> Chi tiết dịch vụ:</p>
                    <p style="margin-left: 10px;">{!! nl2br($clinic->detail) !!}</p>

                    <hr style="  border-top: 1px dashed black">

                    @endisset

                    <p><i class="far fa-calendar-check"></i> Khung giờ làm việc:</p>
                    <div style="border-top: 1px solid lightblue;border-left: 1px solid lightblue;   border-radius: 5px; padding: 3px;background-color:#fff7d1;box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2);"><p>{!! nl2br(Auth::user()->working_hours) !!}</p></div>
            </div>

            <div class="col-sm-12 col-xl-6 mt-4" style=" box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-right: 3px solid rgba(0, 0, 0, 0.1); border-left: 3px solid lightblue; border-top: 3px solid lightblue; border-bottom: 1px solid lightblue; padding: 20px; border-radius: 10px;width: 50em">
                <h4 style="color: #33CCFF	;">Cập nhật khung giờ làm việc</h4>  
                <form id="editForm" action="{{ route('updatewh') }}"  method="POST" >
                @csrf
                
                <div class="mb-3">
                        <label for="hospitalname" class="form-label">Khung giờ làm việc:</label>
                        <textarea class="form-control"  id="detailz" name="wh" rows="3"></textarea>
                    </div>
                    <div class="d-flex justify-content-end">

                    <button type="submit" class="btn btn-primary"><i class="far fa-edit"></i> Cập nhật</button>
                    </div>
                </form> 
                
                
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

        <h4 class="mt-4">Tra cứu thuốc:</h4>
        <div class="row mt-5" style="width: 40%">
                    <form action="{{ route('findthuoc') }}" class="w-100 d-flex" >
    <div class="col-md-8">
        <input type="text" class="form-control" name="dl" placeholder="Nhập từ khóa...">
    </div>
    <div class="col-md-4">
        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Tìm kiếm</button>
    </div>   
    <div class="col-md-4">
        <a class="btn btn-primary" href="{{ route('doctor') }}">Tất cả</a>
    </div>   
</form>
</div>

    
<table  class="table table-striped table-bordered table-hover mt-4" style="border:1px solid #d4d4d4 ;border-radius: 12px; overflow: hidden;border-collapse: separate; border-spacing: 0;">
    <thead class="thead-light" style="background-color: #9beeff; color: #333333;">
        <tr style="transition: background-color 0.3s, transform 0.3s; cursor: pointer;" onmouseover="this.style.backgroundColor='#f1f1f1';" onmouseout="this.style.backgroundColor='';">
            <th>ID</th>
            <th>Tên thuốc</th>
            <th>Chi tiết</th>
            <th>Thành phần</th>
        </tr>
    </thead>
    @isset($medicine)
                            @foreach ($medicine as $item)
                            <tr>
                                <td>{{$item->id_medicine}}</td>
                                <td >{{$item->medicinename}}</td>
                                <td class=" text-wrap">{{ $item->detail}}</td>
                                <td>{{$item->ingredient}}</td>

                            
                            </tr>
                         
                            @endforeach
                        @endisset

         

    </table>
    @isset($medicine)
    <div class="container-footer-kt">
            <nav aria-label="Page navigation example" class="ml-5 footer-kt">
                {{ $medicine->withQueryString()->links('pagination::bootstrap-4') }}
            </nav>
        </div>
    @endisset
            </div>
            <!-- Blank End -->
        </div>
      
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('ad/main.js') }}"></script>

</body>

</html>
