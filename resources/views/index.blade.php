<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>One Health - Medical Center HTML5 Template</title>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

	<link href="{{ asset('main/theme.css') }}" rel="stylesheet">

  <style>
    #floatingButton {
      position: fixed;
      bottom: 20px;
      right: 20px;
      width: 60px;
      height: 60px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 1000;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .name-popup, .chat-popup {
      display: none;
      position: fixed;
      bottom: 90px;
      right: 20px;
      width: 300px;
      border: 1px solid #ddd;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      background-color: #fff;
      z-index: 1000;
    }

    .popup-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px;
      border-bottom: 1px solid #ddd;
    }

    .popup-body {
      display: flex;
      flex-direction: column;
      padding: 10px;
    }

    .chat-content {
  flex: 1;
  overflow-y: auto; /* Sử dụng overflow-y để tạo thanh cuộn khi cần */
  margin-bottom: 10px;
  border: 1px solid #ddd;
  border-radius: 5px;
  padding: 10px;
  max-height: 200px; /* Giới hạn chiều cao tối đa của cửa sổ trò chuyện */
}

    #chatInput {
      margin-bottom: 10px;
      border-radius: 5px;
    }

    #sendChat, #startChat {
      align-self: flex-end;
    }

    .close {
      background: none;
      border: none;
      font-size: 1.2em;
      cursor: pointer;
    }




















    ::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #eee; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}



.main{
	background-color: #eee;
	width: 320px;
	position: relative;
	border-radius: 8px;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	padding: 6px 0px 0px 0px;
}
.scroll{
	overflow-y: scroll;
	scroll-behavior: smooth;
	    height: 325px;
}
.img1{
	border-radius: 50%;
	background-color: #66BB6A;
}
.name{
	font-size: 8px;

}
.msg{
	background-color: #fff;
	font-size: 11px;
	padding: 5px;
	border-radius: 5px;
	font-weight: 500;
	color: #3e3c3c;
}
.between{
	font-size: 8px;
	font-weight: 500;
	color: #a09e9e;
}
.navbar{
	border-bottom-left-radius: 8px;
	border-bottom-right-radius: 8px;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

}
.form-control{
	font-size: 12px;
	font-weight: 400;
	width: 230px;
	height: 30px;
	border: none;

}

.form-control:focus{
	box-shadow: none !important;
}
.icon1{
	color: #7C4DFF !important;
	font-size: 18px !important;	
	cursor: pointer;
}

.icon2{
	color: #512DA8 !important;
    font-size: 18px !important;
    position: relative;
    left: 8px;
    padding: 0px;
    cursor: pointer;

}


.icondiv{
	
	border-radius: 50%;
	width: 15px;
	height: 15px;
	padding: 2px;
	position: relative;
	bottom: 1px;

}








  </style>
</head>
<body>
  <!-- Back to top button -->
  <div class="back-to-top"></div>
 

   <!-- Nút tròn nổi -->
   <button id="floatingButton" class="btn btn-primary">
    <i class="fas fa-comments"></i>
  </button>

  <!-- Cửa sổ nhập tên -->
  <div id="namePopup" class="name-popup">
    <div class="popup-header">
      <h5>Nhập tên của bạn</h5>
      <button id="closeNamePopup" class="close">&times;</button>
    </div>
    <div class="popup-body">
      <input id="nameInput" class="form-control" placeholder="Tên của bạn...">
      <button id="startChat" class="btn btn-primary">Bắt đầu</button>
    </div>
  </div>

  <!-- Cửa sổ trò chuyện1 -->
  <div id="chatPopup" class="chat-popup">
    <div class="popup-header">
      <h5>Trò chuyện với chúng tôi</h5>
      <button id="closeChat" class="close">&times;</button>
    </div>
    <div class="popup-body">











<!-- Cửa sổ trò chuyện2 -->


  <div class="px-2 scroll">
    
  <div class="d-flex align-items-center">
    <div class="text-left pr-1"><img src="https://img.icons8.com/color/40/000000/guest-female.png" width="30" class="img1" /></div>
    <div class="pr-2 pl-1">
      <span class="name">Sarah Anderson</span>
      <p class="msg">Hi Dr. Hendrikson, I haven't been falling well for past few days.</p>
    </div>
  </div>

  <div class="d-flex align-items-center text-right justify-content-end ">
      <div class="pr-2">
        <span class="name">Dr. Hendrikson</span>
        <p class="msg">Let's jump on a video call</p>
      </div>
      <div><img src="https://i.imgur.com/HpF4BFG.jpg" width="30" class="img1" /></div>
      
  </div>
  <div class="text-center"><span class="between">Call started at 10:47am</span></div>
  <div class="text-center"><span class="between">Call ended at 11:03am</span></div>


  <div class="d-flex align-items-center">
    <div class="text-left pr-1"><img src="https://img.icons8.com/color/40/000000/guest-female.png" width="30" class="img1" /></div>
    <div class="pr-2 pl-1">
      <span class="name">Sarah Anderson</span>
      <p class="msg">How often should i take this?</p>
    </div>
  </div>


  <div class="d-flex align-items-center text-right justify-content-end ">
      <div class="pr-2">
        <span class="name">Dr. Hendrikson</span>
        <p class="msg">Twice a day, at breakfast and before bed</p>
      </div>
      <div><img src="https://i.imgur.com/HpF4BFG.jpg" width="30" class="img1" /></div>
      
  </div>

  <div class="d-flex align-items-center">
    <div class="text-left pr-1"><img src="https://img.icons8.com/color/40/000000/guest-female.png" width="30" class="img1" /></div>
    <div class="pr-2 pl-1">
      <span class="name">Sarah Anderson</span>
      <p class="msg">How often should i take this?</p>
    </div>
  </div>

  </div>






  <nav class="navbar bg-white navbar-expand-sm d-flex justify-content-between">
    <input type="text number" name="text" class="form-control" placeholder="Type a message...">

    <div class="icondiv d-flex justify-content-end align-content-center text-center ml-2">
      <i class="fa fa-paperclip icon1">d</i>
      <i class="fa fa-arrow-circle-right icon2">d</i>
    </div>
    
    
  </nav>
  















    </div>
  </div>
  
  









  





















  <header>
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-sm">
            <div class="site-info">
              <a href="#"><i class="fas fa-phone-alt text-primary mr-1"></i> +00 123 4455 6666</a>
              <span class="divider">|</span>
              <a href="#"> <i class="fas fa-envelope text-primary mr-1"></i> mail@example.com</a>
             
            </div>
          </div>
          <div class="col-sm-4 text-right text-sm">
            <div class="social-mini-button">
              <a href="#"><i class="fab fa-facebook-f"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-dribbble"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
          </div>
        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="#"><span class="text-primary">One</span>-Health</a>

      
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="doctors.html">Doctors</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="blog.html">News</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact</a>
            </li>
            @guest
            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="{{ route('login') }}">Đăng nhập / đăng ký</a>
            </li>
            @else
            <li class="nav-item dropdown">
            <a class="btn btn-primary ml-lg-3 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('profile') }}">Thông tin cá nhân</a>
                <a class="dropdown-item" href="">Đơn đặt khám</a>
                <a class="dropdown-item" href="">Trò chuyện</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}">
                    Đăng xuất<i class="fas fa-sign-out-alt ml-1"></i>
                </a>
              
            </div>
        </li>
            @endguest

          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header>

  <div class="page-hero bg-image overlay-dark" style="background-image: url({{ asset('main/image/bg_image_1.jpg') }});">
    <div class="hero-section">
      <div class="container text-center wow animate__animated animate__zoomIn">
        <span class="subhead">Let's make your life happier</span>
        <h1 class="display-4">Healthy Living</h1>
        <a href="#" class="btn btn-primary">Let's Consult</a>
      </div>
    </div>
  </div>


  <div class="bg-light">
    <div class="page-section py-3 mt-md-n5 custom-index">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-4 py-3 py-md-0">
            <div class="card-service wow animate__animated animate__fadeInUp">
              <div class="circle-shape bg-secondary text-white">
                <i class="fas fa-comments"></i>              </div>
              <p><span>Chat</span> with a doctors</p>
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card-service wow animate__animated animate__fadeInUp">
              <div class="circle-shape bg-primary text-white">
                <i class="fas fa-check-square"></i>
              </div>
              <p><span>One</span>-Health Protection</p>
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card-service wow animate__animated animate__fadeInUp">
              <div class="circle-shape bg-accent text-white">
                <i class="fas fa-shopping-bag"></i>
              </div>
              <p><span>One</span>-Health Pharmacy</p>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- .page-section -->

    <div class="page-section pb-0">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 py-3 wow animate__animated animate__fadeInUp">
            <h1>Welcome to Your Health <br> Center</h1>
            <p class="text-grey mb-4">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Accusantium aperiam earum ipsa eius, inventore nemo labore eaque porro consequatur ex aspernatur. Explicabo, excepturi accusantium! Placeat voluptates esse ut optio facilis!</p>
            <a href="about.html" class="btn btn-primary">Learn More</a>
          </div>
          <div class="col-lg-6 wow animate__animated animate__fadeInRight" data-wow-delay="400ms">
            <div class="img-place custom-img-1">
              <img src="{{ asset('main/image/bg-doctor.png') }}" alt="">
            </div>
          </div>
        </div>
      </div>
    </div> <!-- .bg-light -->
  </div> <!-- .bg-light -->

  <div class="page-section">
    <div class="container">
      <h1 class="text-center mb-5 wow animate__animated animate__fadeInUp">Our Doctors</h1>

      <div class="owl-carousel wow animate__animated animate__fadeInUp" id="doctorSlideshow">
        <div class="item">
          <div class="card-doctor">
            <div class="header">
              <img src="../assets/img/doctors/doctor_1.jpg" alt="">
              <div class="meta">
                <a href="#"><i class="fas fa-phone-alt"></i></a>
                <a href="#"><i class="fab fa-whatsapp"></i></a>
              </div>
            </div>
            <div class="body">
              <p class="text-xl mb-0">Dr. Stein Albert</p>
              <span class="text-sm text-grey">Cardiology</span>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="card-doctor">
            <div class="header">
              <img src="{{ asset('main/image/doctors/doctor_2.jpg') }}" alt="">
              <div class="meta">
                <a href="#"><i class="fas fa-phone-alt"></i></a>
                <a href="#"><i class="fab fa-whatsapp"></i></a>
              </div>
            </div>
            <div class="body">
              <p class="text-xl mb-0">Dr. Alexa Melvin</p>
              <span class="text-sm text-grey">Dental</span>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="card-doctor">
            <div class="header">
              <img src="{{ asset('main/image/doctors/doctor_3.jpg') }}" alt="">
              <div class="meta">
                <a href="#"><i class="fas fa-phone-alt"></i></a>
                <a href="#"><i class="fab fa-whatsapp"></i></a>
              </div>
            </div>
            <div class="body">
              <p class="text-xl mb-0">Dr. Rebecca Steffany</p>
              <span class="text-sm text-grey">General Health</span>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="card-doctor">
            <div class="header">
              <img src="{{ asset('main/image/doctors/doctor_3.jpg') }}" alt="">
              <div class="meta">
                <a href="#"><i class="fas fa-phone-alt"></i></a>
                <a href="#"><i class="fab fa-whatsapp"></i></a>
              </div>
            </div>
            <div class="body">
              <p class="text-xl mb-0">Dr. Rebecca Steffany</p>
              <span class="text-sm text-grey">General Health</span>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="card-doctor">
            <div class="header">
              <img src="../assets/img/doctors/doctor_3.jpg" alt="">
              <div class="meta">
                <a href="#"><i class="fas fa-phone-alt"></i></a>
                <a href="#"><i class="fab fa-whatsapp"></i></a>
              </div>
            </div>
            <div class="body">
              <p class="text-xl mb-0">Dr. Rebecca Steffany</p>
              <span class="text-sm text-grey">General Health</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="page-section bg-light">
    <div class="container">
      <h1 class="text-center wow animate__animated animate__fadeInUp">Latest News</h1>
      <div class="row mt-5">
        <div class="col-lg-4 py-2 wow animate__animated animate__zoomIn">
          <div class="card-blog">
            <div class="header">
              <div class="post-category">
                <a href="#">Covid19</a>
              </div>
              <a href="blog-details.html" class="post-thumb">
                <img src="{{ asset('main/image/blog/blog_1.jpg') }}" alt="">
              </a>
            </div>
            <div class="body">
              <h5 class="post-title"><a href="blog-details.html">List of Countries without Coronavirus case</a></h5>
              <div class="site-info">
                <div class="avatar mr-2">
                  <div class="avatar-img">
                    <img src="{{ asset('main/image/person/person_1.jpg') }}" alt="">
                  </div>
                  <span>Roger Adams</span>
                </div>
                <i class="fas fa-clock"></i> 1 week ago
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 py-2 wow animate__animated animate__zoomIn">
          <div class="card-blog">
            <div class="header">
              <div class="post-category">
                <a href="#">Covid19</a>
              </div>
              <a href="blog-details.html" class="post-thumb">
                <img src="{{ asset('main/image/blog/blog_2.jpg') }}" alt="">
              </a>
            </div>
            <div class="body">
              <h5 class="post-title"><a href="blog-details.html">Recovery Room: News beyond the pandemic</a></h5>
              <div class="site-info">
                <div class="avatar mr-2">
                  <div class="avatar-img">
                    <img src="{{ asset('main/image/person/person_1.jpg') }}" alt="">
                  </div>
                  <span>Roger Adams</span>
                </div>
                <i class="fas fa-clock"></i> 4 weeks ago
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 py-2 wow animate__animated animate__zoomIn">
          <div class="card-blog">
            <div class="header">
              <div class="post-category">
                <a href="#">Covid19</a>
              </div>
              <a href="blog-details.html" class="post-thumb">
                <img src="{{ asset('main/image/blog/blog_3.jpg') }}" alt="">
              </a>
            </div>
            <div class="body">
              <h5 class="post-title"><a href="blog-details.html">What is the impact of eating too much sugar?</a></h5>
              <div class="site-info">
                <div class="avatar mr-2">
                  <div class="avatar-img">
                    <img src="{{ asset('main/image/person/person_2.jpg') }}" alt="">
                  </div>
                  <span>Diego Simmons</span>
                </div>
                <i class="fas fa-clock"></i>2 months ago
              </div>
            </div>
          </div>
        </div>

        <div class="col-12 text-center mt-4 wow animate__animated animate__zoomIn">
          <a href="blog.html" class="btn btn-primary">Read More</a>
        </div>

      </div>
    </div>
  </div> <!-- .page-section -->

  <div class="page-section">
    <div class="container">
      <h1 class="text-center wow animate__animated animate__fadeInUp">Make an Appointment</h1>

      <form class="main-form">
        <div class="row mt-5 ">
          <div class="col-12 col-sm-6 py-2 wow animate__animated animate__fadeInLeft">
            <input type="text" class="form-control" placeholder="Full name">
          </div>
          <div class="col-12 col-sm-6 py-2 wow animate__animated animate__fadeInRight">
            <input type="text" class="form-control" placeholder="Email address..">
          </div>
          <div class="col-12 col-sm-6 py-2 wow animate__animated animate__fadeInLeft" data-wow-delay="300ms">
            <input type="date" class="form-control">
          </div>
          <div class="col-12 col-sm-6 py-2 wow animate__animated animate__fadeInRight" data-wow-delay="300ms">
            <select name="departement" id="departement" class="custom-select">
              <option value="general">General Health</option>
              <option value="cardiology">Cardiology</option>
              <option value="dental">Dental</option>
              <option value="neurology">Neurology</option>
              <option value="orthopaedics">Orthopaedics</option>
            </select>
          </div>
          <div class="col-12 py-2 wow animate__animated animate__fadeInUp" data-wow-delay="300ms">
            <input type="text" class="form-control" placeholder="Number..">
          </div>
          <div class="col-12 py-2 wow animate__animated animate__fadeInUp" data-wow-delay="300ms">
            <textarea name="message" id="message" class="form-control" rows="6" placeholder="Enter message.."></textarea>
          </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3 wow animate__animated animate__zoomIn">Submit Request</button>
      </form>
    </div>
  </div> <!-- .page-section -->

  <div class="page-section banner-home bg-image" style="background-image: url({{ asset('main/image/banner-pattern.svg') }});">
    <div class="container py-5 py-lg-0">
      <div class="row align-items-center">
        <div class="col-lg-4 wow animate__animated animate__zoomIn">
          <div class="img-banner d-none d-lg-block">
            <img src="{{ asset('main/image/mobile_app.png') }}" alt="">
          </div>
        </div>
        <div class="col-lg-8 wow animate__animated animate__fadeInRight">
          <h1 class="font-weight-normal mb-3">Get easy access of all features using One Health Application</h1>
          <a href="#"><img src="{{ asset('main/image/google_play.svg') }}" alt=""></a>
          <a href="#" class="ml-2"><img src="{{ asset('main/image/app_store.svg') }}" alt=""></a>
        </div>
      </div>
    </div>
  </div> <!-- .banner-home -->

  <footer class="page-footer">
    <div class="container">
      <div class="row px-md-3">
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Company</h5>
          <ul class="footer-menu">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Career</a></li>
            <li><a href="#">Editorial Team</a></li>
            <li><a href="#">Protection</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>More</h5>
          <ul class="footer-menu">
            <li><a href="#">Terms & Condition</a></li>
            <li><a href="#">Privacy</a></li>
            <li><a href="#">Advertise</a></li>
            <li><a href="#">Join as Doctors</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Our partner</h5>
          <ul class="footer-menu">
            <li><a href="#">One-Fitness</a></li>
            <li><a href="#">One-Drugs</a></li>
            <li><a href="#">One-Live</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Contact</h5>
          <p class="footer-link mt-2">351 Willow Street Franklin, MA 02038</p>
          <a href="#" class="footer-link">701-573-7582</a>
          <a href="#" class="footer-link">healthcare@temporary.net</a>

          <h5 class="mt-3">Social Media</h5>
          <div class="footer-sosmed mt-3">
            <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="#" target="_blank"><i class="fab fa-google-plus-g"></i></a>
            <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="#" target="_blank"><i class="fab fa-linkedin"></i></a>
          </div>
        </div>
      </div>

      <hr>

      <p id="copyright">Copyright &copy; 2020 <a href="https://macodeid.com/" target="_blank">MACode ID</a>. All right reserved</p>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>


<script src="{{ asset('main/theme.js') }}"></script>
<script>
  document.getElementById('floatingButton').addEventListener('click', function() {
    document.getElementById('namePopup').style.display = 'block';
  });

  document.getElementById('closeNamePopup').addEventListener('click', function() {
    document.getElementById('namePopup').style.display = 'none';
  });

  document.getElementById('startChat').addEventListener('click', function() {
    var nameInput = document.getElementById('nameInput');
    if (nameInput.value.trim() !== "") {
      document.getElementById('namePopup').style.display = 'none';
      document.getElementById('chatPopup').style.display = 'block';
    } else {
      alert("Vui lòng nhập tên của bạn");
    }
  });

  document.getElementById('closeChat').addEventListener('click', function() {
    document.getElementById('chatPopup').style.display = 'none';
  });

  document.getElementById('sendChat').addEventListener('click', function() {
    var chatInput = document.getElementById('chatInput');
    var chatContent = document.querySelector('.chat-content');
    
    if (chatInput.value.trim() !== "") {
      var message = document.createElement('div');
      message.textContent = chatInput.value;
      chatContent.appendChild(message);
      chatInput.value = "";
      chatContent.scrollTop = chatContent.scrollHeight;
    }
  });
</script>

</body>
</html>