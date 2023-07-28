@extends('homepage.layouts.app')

@section('main')
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                <h1>POLI ANAK</h1>
                <h2>Poli klinik anak adalah layanan kesehatan untuk anak sejak dia dilahirkan hingga berusia 18 tahun. Tidak
                    hanya berfokus pada aspek penunjang kesehatan yang dibutuhkan anak, namun juga gangguan kesehatan pada
                    anak, penyakit, kelainan, alergi dan yang lainnya yang dapat mengganggu tumbuh kembang anak.</h2>
                <div class="d-flex justify-content-center justify-content-lg-start">
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">

            </div>
        </div>
        </div>

    </section><!-- End Hero -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Dokter Spesialis Anak</h2>
            </div>

            <div class="row">

                <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
                    <div class="member d-flex align-items-start">
                        <div class="pic"><img src="assets/img/team/1.jpg" class="img-fluid" alt=""></div>
                        <div class="member-info">
                            <h4>dr. Siti Fatimah, Sp.A</h4>
                            <span>Spesialis Anak</span>
                            <p>Ramah,Profesional,Islami</p>
                            <div class="social">
                                <a href=""><i class="ri-twitter-fill"></i></a>
                                <a href=""><i class="ri-facebook-fill"></i></a>
                                <a href=""><i class="ri-instagram-fill"></i></a>
                                <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="200">
                    <div class="member d-flex align-items-start">
                        <div class="pic"><img src="assets/img/team/2.jpg" class="img-fluid" alt=""></div>
                        <div class="member-info">
                            <h4>dr. Reni Fahriani, Sp.A</h4>
                            <span>Spesialis Anak</span>
                            <p>Ramah,Profesional,Islami</p>
                            <div class="social">
                                <a href=""><i class="ri-twitter-fill"></i></a>
                                <a href=""><i class="ri-facebook-fill"></i></a>
                                <a href=""><i class="ri-instagram-fill"></i></a>
                                <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="col-lg-6 mt-4" data-aos="zoom-in" data-aos-delay="300">
                        <div class="member d-flex align-items-start">
                            <div class="pic"><img src="assets/img/team/3.jpg" class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <h4>dr. Achmad Headriawan, Sp.A</h4>
                                <span>Spesialis Anak</span>
                                <p>Ramah,Profesional,Islami</p>
                                <div class="social">
                                    <a href=""><i class="ri-twitter-fill"></i></a>
                                    <a href=""><i class="ri-facebook-fill"></i></a>
                                    <a href=""><i class="ri-instagram-fill"></i></a>
                                    <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
    </section><!-- End Team Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Jadwal Dokter</h2>
            </div>

            <div class="row">
                <div class="col-lg-20 mt-20" data-aos="zoom-in" data-aos-delay="300">
                    <div class=text-center>
                        <div class="pic"> <img src="{{ asset('homepage') }}/img/jadwal/polianak.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        </div>
    </section><!-- End Team Section -->
@endsection
