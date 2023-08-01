<!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">
        <h1 class="logo me-auto"><a href="index.html">RSU HARKEL</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="{{ asset('homepage') }}/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto {{ Route::is('homepage') ? 'active' : '' }}"
                        href="{{ route('homepage') }}">Home</a>
                </li>
                <li><a class="nav-link scrollto {{ Route::is('homepage.profil') ? 'active' : '' }}"
                        href="{{ route('homepage.profil') }}">Profil</a></li>
                <li class="dropdown"><a href="#"
                        class="{{ Route::is('pelayanan*') ? 'active' : '' }}"><span>Fasilitas dan
                            Layanan</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{ route('pelayanan.poli.kandung') }}">Poli Kandung</a></li>
                        <li><a href="{{ route('pelayanan.poli.anak') }}">Poli Anak</a></li>
                        <li><a href="{{ route('pelayanan.poli.penyakitdalam') }}">Poli Penyakit Dalam</a></li>
                        <li><a href="{{ route('pelayanan.poli.saraf') }}">Poli Saraf</a></li>
                        <li><a href="{{ route('pelayanan.poli.bedah') }}">Poli Bedah</a></li>
                        <li><a href="{{ route('pelayanan.poli.tht') }}">Poli THT</a></li>
                        <li><a href="{{ route('pelayanan.poli.laboratorium') }}">Poli Laboratorium</a></li>
                        <li><a href="{{ route('pelayanan.poli.radiologi') }}">Poli Radiologi</a></li>
                    </ul>
                </li>
                @if (Route::currentRouteName() === 'homepage')
                    <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
                @else
                    <li><a class="nav-link scrollto" href="{{ route('homepage') }}#contact">Kontak</a></li>
                @endif
                @if (Route::has('login'))
                    @auth
                        @if (Auth::user()->is_admin == 0)
                            <li class="dropdown"><a href="#"><span>{{ auth()->user()->name }}</span> <i
                                        class="bi bi-chevron-down"></i></a>
                                <ul>
                                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                </ul>
                            </li>
                        @else
                            <li class="dropdown"><a href="#"><span>{{ auth()->user()->name }}</span> <i
                                        class="bi bi-chevron-down"></i></a>
                                <ul>
                                    <li><a href="{{ route('pasien.dashboard') }}">Dashboard</a></li>
                                </ul>
                            </li>
                        @endif
                    @else
                        <li class="dropdown"><a href="#"><span>Pendaftaran</span> <i
                                    class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a href="{{ route('registrasi') }}">Registrasi</a></li>
                                <li><a href="{{ route('login') }}">Login</a></li>
                            </ul>
                        </li>
                    @endauth
                @endif
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
