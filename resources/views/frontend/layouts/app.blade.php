<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Rydzaa</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="images/fab-i.png" type="images/fab-i.png" sizes="18x18">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/font-awesome.min.css')}}">

    <link rel="stylesheet" href="{{ asset('public/frontend/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/animate.css')}}">
    
    <link rel="stylesheet" href="{{ asset('public/frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{ asset('public/frontend/css/aos.css')}}">
    
    <link rel="stylesheet" href="{{ asset('public/frontend/css/booking_form.css')}}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{ asset('public/frontend/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/jquery.timepicker.css')}}">
    
    <link rel="stylesheet" href="{{ asset('public/frontend/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/style.css')}}">
  </head>
  <body>
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="{{URL::to('/')}}"><img src="{{ asset('public/frontend/images/logo.png')}}" width="100"/></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          {{-- <li class="nav-item"><a href="{{URL::to('/')}}" class="nav-link">Home</a></li> --}}
	          {{-- <li class="nav-item"><a href="about.html" class="nav-link">About Us</a></li> --}}
	          <li class="nav-item"><a href="{{URL::to('/')}}" class="nav-link">Apply</a></li>
	          {{-- <li class="nav-item"><a href="contact.html" class="nav-link">Contact Us</a></li> --}}
	          <li class="nav-item"><a href="{{URL::to('/login')}}" class="nav-link">Login</a></li>
              <li class="nav-item"></li>
              {{-- <li class="nav-item dropdown">
                <a href="#" class="nav-link login-btn dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Register/Login</a>
                
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="user-login.html">For User</a>
                  <a class="dropdown-item" href="driver-login.html">For Driver</a>
                </div>
              </li> --}}
              {{-- <li class="nav-item dropdown">
                <a href="#" class="dropdown-toggle" id="loginAccount" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="profile-img">
                    <img src="{{ asset('public/frontend/images/person_3.jpg')}}" alt="">
                  </span>
                </a>
                
                <div class="dropdown-menu" aria-labelledby="loginAccount">
                  <a class="dropdown-item" href="my-account.html">My Account</a>
                  <a class="dropdown-item" href="booking-history.html">Booking history</a>
                </div>
              </li> --}}
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav --> 
    
 
      @yield('content')

    
   
    
	
    
    
    
    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2"><a href="#" class="logo"><span>Rydzaa</span></a></h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <h5 class="text-white mt-3">Follow Us:</h5>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-2">
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-youtube"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Information</h2>
              <ul class="list-unstyled">
                <li><a href="about.html" class="py-2 d-block">About Us</a></li>
                <li><a href="#" class="py-2 d-block">Term and Conditions</a></li>
                <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
                <li><a href="#" class="py-2 d-block">FAQ</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Customer Support</h2>
              <ul class="list-unstyled">
                
                <li><a href="#" class="py-2 d-block">Payment Option</a></li>
                <li><a href="book-your-rides.html" class="py-2 d-block">Book Your Rides</a></li>
                <li><a href="#" class="py-2 d-block">How it works</a></li>
                <li><a href="contact.html" class="py-2 d-block">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3900 010</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> Rydzaa. All rights reserved
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
    


    
    
  
    
    
<div class="d-none d-sm-block" style="position: fixed; right: 25px; bottom: 40px; z-index: 9999;"><span class="ml20"><a href="#" class="contact-bg-1 order-4" target=" _blank"><img data-src="https://www.gozocabs.com/images/whatsapp.svg" class="lozad entered loaded" width="40" alt="" data-ll-status="loaded" src="https://www.gozocabs.com/images/whatsapp.svg"></a></span></div> 

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

    
<script src="{{ asset('public/frontend/js/jquery.min.js')}}"></script>
  <script src="{{ asset('public/frontend/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{ asset('public/frontend/js/popper.min.js')}}"></script>
  <script src="{{ asset('public/frontend/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('public/frontend/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{ asset('public/frontend/js/jquery.waypoints.min.js')}}"></script>
  <script src="{{ asset('public/frontend/js/jquery.stellar.min.js')}}"></script>
  <script src="{{ asset('public/frontend/js/owl.carousel.min.js')}}"></script>
  <script src="{{ asset('public/frontend/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{ asset('public/frontend/js/aos.js')}}"></script>
  <script src="{{ asset('public/frontend/js/jquery.animateNumber.min.js')}}"></script>
  <script src="{{ asset('public/frontend/js/bootstrap-datepicker.js')}}"></script>
  <script src="{{ asset('public/frontend/js/jquery.timepicker.min.js')}}"></script>
  <script src="{{ asset('public/frontend/js/scrollax.min.js')}}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{ asset('public/frontend/js/google-map.js')}}"></script>
  <script src="{{ asset('public/frontend/js/main.js')}}"></script>
  <script src="{{ asset('public/frontend/js/booking_form.js')}}"></script>
    
    
<script>
$(document).ready(function(){ 
    $('.tab_btn-1').click(function() {
      $('#BookNow').css('display','block');
	  $('#PreBooking').css('display','none');
	  $('#AirportBooking').css('display','none');
	  $('#CheckBookings').css('display','none');
    });
});
$(document).ready(function(){ 
    $('.tab_btn-2').click(function() {
      $('#PreBooking').css('display','block');
	  $('#BookNow').css('display','none');
	  $('#AirportBooking').css('display','none');
	  $('#CheckBookings').css('display','none');
    });
});
$(document).ready(function(){ 
    $('.tab_btn-3').click(function() {
      $('#AirportBooking').css('display','block');
	  $('#PreBooking').css('display','none');
	  $('#BookNow').css('display','none');
	  $('#CheckBookings').css('display','none');
    });
});
$(document).ready(function(){ 
    $('.tab_btn-4').click(function() {
      $('#CheckBookings').css('display','block');
	  $('#PreBooking').css('display','none');
	  $('#AirportBooking').css('display','none');
	  $('#BookNow').css('display','none');
    });
});
$('.addActive').click(function(){
     $('.addActive').removeClass('active');
     $(this).addClass('active');
 });
</script> 
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  </body>
</html>

