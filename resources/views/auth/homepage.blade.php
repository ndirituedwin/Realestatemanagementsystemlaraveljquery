<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Propwings-{{ Session::get('companynanmee') }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('b4homepage/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('b4homepage/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('b4homepage/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('b4homepage/assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{asset('b4homepage/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('b4homepage/assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
  <link href="{{asset('b4homepage/assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset('b4homepage/assets/vendor/aos/aos.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('b4homepage/assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Day - v2.2.1
  * Template URL: https://bootstrapmade.com/day-multipurpose-html-template-for-free/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->


  <!-- ======= Header ======= -->


  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="500">

      <h1>Welcome today <?= Date('D,d M Y ')?> <i id="clock"></i></h1>
      <h2>Propwings-{{ $companyname }}</h2>
      <a href="{{ route('homepage') }}" class="btn-get-started scrollto">Go to homepage</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">
      </div>
    </section><!-- End About Section -->


    <!-- ======= Clients Section ======= -->

    <!-- ======= Portfolio Section ======= -->

    <!-- ======= Pricing Section ======= -->

    <!-- ======= Team Section ======= -->

    <!-- ======= Contact Section ======= -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  >



  <!-- Vendor JS Files -->
  <script src="{{asset('b4homepage/assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('b4homepage/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('b4homepage/assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('b4homepage/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('b4homepage/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('b4homepage/assets/vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{asset('b4homepage/assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('b4homepage/assets/vendor/aos/aos.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('b4homepage/assets/js/main.js')}}"></script>
<script>
      setInterval(showTime, 1000);
    function showTime() {
      let time = new Date();
      let hour = time.getHours();
      let min = time.getMinutes();
      let sec = time.getSeconds();
      am_pm = "AM";

      if (hour > 12) {
        hour -= 12;
        am_pm = "PM";
      }
      if (hour == 0) {
        hr = 12;
        am_pm = "AM";
      }

      hour = hour < 10 ? "0" + hour : hour;
      min = min < 10 ? "0" + min : min;
      sec = sec < 10 ? "0" + sec : sec;

      let currentTime = hour + ":"
          + min + ":" + sec + am_pm;

      document.getElementById("clock")
          .innerHTML = currentTime;
      // jQuery("#clock").innerHtml().val(currentTime);
    }
    showTime();
</script>
</body>

</html>
