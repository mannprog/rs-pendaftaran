<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="{{ route('pasien.dashboard') }}" class="b-brand">
                <!-- ========   Change your logo from here   ============ -->
                <img src="{{ asset('homepage') }}/img/LOGO.png" alt="" class="logo logo-lg" style="height: 50px" />
            </a>
        </div>
        <div class="navbar-content">
            <ul class="pc-navbar">
                <li class="pc-item pc-caption">
                    <i class="ti ti-dashboard"></i>
                </li>
                <li class="pc-item">
                    <a href="{{ route('pasien.dashboard') }}" class="pc-link"><span class="pc-micon"><i
                                class="ti ti-dashboard"></i></span><span class="pc-mtext">Dashboard</span></a>
                </li>

                <li class="pc-item pc-caption">
                    <i class="ti ti-apps"></i>
                </li>
                <li class="pc-item">
                    <a href="{{ route('pasien.pendaftaran.index') }}" class="pc-link"><span class="pc-micon"><i
                                class="ti ti-receipt"></i></span><span class="pc-mtext">Pendaftaran</span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
