<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>RSUHARKEL</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?php echo e(asset('homepage')); ?>/img/LOGO.png" rel="icon">
    <link href="<?php echo e(asset('homepage')); ?>/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo e(asset('homepage')); ?>/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?php echo e(asset('homepage')); ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('homepage')); ?>/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo e(asset('homepage')); ?>/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('homepage')); ?>/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('homepage')); ?>/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?php echo e(asset('homepage')); ?>/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo e(asset('homepage')); ?>/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Arsha
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">
            <h1 class="logo me-auto"><a href="index.html">RSU HARKEL</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="<?php echo e(asset('homepage')); ?>/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="profil.php">Profil</a></li>
                    <li class="dropdown"><a href="#"><span>Fasilitas dan Layanan</span> <i
                                class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="polikandung.php">Poli Kandung</a></li>
                            <li><a href="polianak.php">Poli Anak</a></li>
                            <li><a href="polipenyakitdalam.php">Poli Penyakit Dalam</a></li>
                            <li><a href="polisaraf.php">Poli Saraf</a></li>
                            <li><a href="polibedah.php">Poli Bedah</a></li>
                            <li><a href="politht.php">Poli THT</a></li>
                            <li><a href="polilaboratorium.php">Poli Laboratorium</a></li>
                            <li><a href="poliradiologi.php">Poli Radiologi</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><span>Pendaftaran</span> <i
                                class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="registrasi.php">Registrasi</a></li>
                            <li><a href="login.php">Login</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="col-md-15 ftco-animate text-center">
                    <img src="<?php echo e(asset('homepage')); ?>/img/LOGO.PNG">
                    <h1>WELCOME TO </h1>
                    <h2>RUMAH SAKIT UMUM HARAPAN KELUARGA</h2>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">

                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Clients Section ======= -->
        <section id="clients" class="clients section-bg">
            <div class="container">

                <div class="row" data-aos="zoom-in">

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="<?php echo e(asset('homepage')); ?>/img/24jam.png" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="<?php echo e(asset('homepage')); ?>/img/laboratorium.png" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="<?php echo e(asset('homepage')); ?>/img/radiologi.png" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="<?php echo e(asset('homepage')); ?>/img/persalinan2.png" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="<?php echo e(asset('homepage')); ?>/img/rawatjalan.png" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="<?php echo e(asset('homepage')); ?>/img/rawatinap.png" class="img-fluid" alt="">
                    </div>

                </div>

            </div>
        </section><!-- End Cliens Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Jenis Layanan</h2>
                    <p>Jenis layanan adalah informasi layanan yang disediakan oleh instansi pelayanan publik yang berisi
                        mengenai persyaratan, prosedur, waktu penyelesaian, biaya, dan pengaduan layanan.</p>
                </div>

                <div class="row">
                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                        data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bxl-dribbble"></i></div>
                            <h4><a href="">IGD 24 Jam</a></h4>
                            <p>Pelayanan Pasien Gawat Darurat dengan fasilitas dan Dokter jaga
                                24 Jam</p>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                        data-aos-delay="200">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-file"></i></div>
                            <h4><a href="">Laboratorium</a></h4>
                            <p>Pemeriksaan selama 24 jam, dengan fasilitas dan tenaga yang profesional</p>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-tachometer"></i></div>
                            <h4><a href="">Radiologi</a></h4>
                            <p>Pemeriksaan selama 24 jam, dengan fasilitas yang modern dan tenaga yang profesional</p>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in"
                        data-aos-delay="400">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-layer"></i></div>
                            <h4><a href="">Persalinan</a></h4>
                            <p>Pelayanan Persalinan 24 Jam, dengan Dokter dan Bidan yang berpengalaman dan profesional
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Services Section -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Struktur Organisasi</h2>
                    <p>Struktur organisasi adalah susunan serta hubungan antara tiap bagian dalam organisasi, baik
                        secara posisi maupun tugas, demi mencapai tujuan bersama.</p>
                </div>
                <div class="text-center">
                    <li><a class=" scrollto active" href="struktur.php">click</a>
                    </li>
                </div>
        </section><!-- End Team Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Contact</h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                        sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                        ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                </div>

                <div class="row">

                    <div class="col-lg-5 d-flex align-items-stretch">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Location:</h4>
                                <p>Jalan Raya Rancaekek KM 20 Cipacing, Jatinangor, Sumedang</p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p>info@rsharapankeluarga.com</p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Call:</h4>
                                <p>(022) 7796335</p>
                                <p>0811-2222-862</p>
                            </div>

                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
                                frameborder="0" style="border:0; width: 100%; height: 290px;"
                                allowfullscreen></iframe>
                        </div>

                    </div>

                    <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">Your Name</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name">Your Email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name">Subject</label>
                                <input type="text" class="form-control" name="subject" id="subject" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Message</label>
                                <textarea class="form-control" name="message" rows="10" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>
                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">


        <div class="footer-top">
            <div class="container">
                <div class="text-center" class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Social Media Networks</h4>
                    <div class="social-links mt-3">
                        <a href="https://web.facebook.com/hijir.ismail.3551?_rdc=1&_rdr" class="facebook"><i
                                class="bx bxl-facebook"></i></a>
                        <a href="https://www.instagram.com/rsu_harkel/?hl=id" class="instagram"><i
                                class="bx bxl-instagram"></i></a>
                    </div>
                </div>

            </div>
        </div>
        </div>

        <div class="container footer-bottom clearfix">
            <div class="text-center" class="copyright">
                &copy; Copyright <strong><span>Rumah Sakit Umum Harapan Keluarga</span></strong> at 2023
            </div>
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->

        </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?php echo e(asset('homepage')); ?>/vendor/aos/aos.js"></script>
    <script src="<?php echo e(asset('homepage')); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo e(asset('homepage')); ?>/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?php echo e(asset('homepage')); ?>/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?php echo e(asset('homepage')); ?>/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?php echo e(asset('homepage')); ?>/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="<?php echo e(asset('homepage')); ?>/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?php echo e(asset('homepage')); ?>/js/main.js"></script>

</body>

</html>
<?php /**PATH C:\laragon\www\rs-pendaftaran\resources\views/welcome.blade.php ENDPATH**/ ?>