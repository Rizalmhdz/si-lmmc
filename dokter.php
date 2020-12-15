<?php
session_start();
include("koneksi.php");
if($_SESSION['user']!=3){
   echo "<script type='text/javascript'>window.location.href = 'login.php' ; </script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dokter</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="dokter/img/fevicon.ico.png" rel="icon">
  <link href="dokter/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="dokter/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="dokter/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="dokter/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="dokter/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="dokter/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="dokter/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="dokter/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="dokter/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="dokter/css/style.css" rel="stylesheet">

 
</head>

<body>

  
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="dokter.html">Hello Dokter</a></h1>
  

      <nav class="nav-menu d-none d-lg-block">
        <ul>
        <li class="active"><a href="logout.php">Logout</a></li>
          <li><a href="#">Beranda</a></li>
          <li><a href="Rekaman Medis/Rekaman Medis.html">Rekaman Medis Pasien</a></li> 
        </ul>
      </nav><!-- .nav-menu -->

      <a href="CRUD DATA PASIEN/index.php" class="appointment-btn scrollto">Tambah Rekaman Medis Pasien</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <h1>Welcome to Life Care</h1>
      <h2>ULM CLINIC Care Your Health and We are Expert!</h2>
      <a href="#about" class="btn-get-started scrollto">Universitas Lambung Mangkurat</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <h3>Jadwal Klinik?</h3>
              <p>
                Anda dapat melihat waktu kerja klinik yang telah ditentukan oleh admin pada halaman pasien. 
                <br>
                <br>Dan jika anda ingin mengubah jadwal praktek dapat sesegeranya menghubungi admin. Terima Kasih.
              </p>
              <div class="text-center">
                <a href="index.html" class="more-btn">Klik disini<i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-receipt"></i>
                    <h4>Peraturan</h4>
                    <p>Kepada para dokter yang bekerja di Klinik ULM <br>diharapkan displin dan jujuran dalam bekerja.
                    </p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-cube-alt"></i>
                    <h4>Praktek</h4>
                    <p>Apabila menangani kasus yang berat dan perlu dirujuk ke rumah sakit 
                      <br>dapat langsung menghubungi admin dan membuat surat rujukan</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-images"></i>
                    <h4>Dokumentasi</h4>
                    <p>Pengambilan gambar atau dokumentasi pasien diperbolehkan 
                      <br>apabila terjadi situasi darurat.
                      <br>
                      <br>misalnya terjadi kecelakaan dan perlu di rujuk ke rumah sakit 
                      <br>namun dari pihak rumah sakit meminta bukti atau ingin melihat luka dari pasien.
                    </p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->
          <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container-fluid">

        <div class="row">
          
          <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch">
            <a href="https://www.youtube.com/watch?v=SOfEwNy9-Kw" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
          
          </div>

              </section><!-- End About Section -->
  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="dokter/vendor/jquery/jquery.min.js"></script>
  <script src="dokter/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="dokter/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="dokter/vendor/php-email-form/validate.js"></script>
  <script src="dokter/vendor/venobox/venobox.min.js"></script>
  <script src="dokter/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="dokter/vendor/counterup/counterup.min.js"></script>
  <script src="dokter/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="dokter/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

  <!-- Template Main JS File -->
  <script src="dokter/js/main.js"></script>

</body>

</html>
