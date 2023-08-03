<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
    <title>RSUHARKEL | Registrasi</title>
    <!-- [Meta] -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('homepage') }}/img/LOGO.png" rel="icon">
    <link href="{{ asset('homepage') }}/img/LOGO.png" rel="apple-touch-icon">
    <!-- [Google Font] Family -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap"
        id="main-font-link" />
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="{{ asset('admin') }}/fonts/tabler-icons.min.css" />
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href="{{ asset('admin') }}/fonts/material.css" />
    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="{{ asset('admin') }}/css/style.css" id="main-style-link" />
    <link rel="stylesheet" href="{{ asset('admin') }}/css/style-preset.css" id="preset-style-link" />

</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->

    <div class="auth-main">
        <div class="auth-wrapper v3">
            <div class="auth-form">
                <div class="card mt-5">
                    <div class="card-body">
                        <a href="{{ route('homepage') }}" class="d-flex justify-content-center mt-3">
                            <img src="{{ asset('homepage') }}/img/LOGO.PNG" style="height: 100px" />
                        </a>
                        <div class="row">
                            <div class="d-flex justify-content-center">
                                <div class="auth-header">
                                    <h2 class="text-primary mt-4"><b>Buat Akun</b></h2>
                                    <p class="f-16 mt-2">Isi form dibawah untuk membuat akun</p>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('prosesRegistrasi') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Nama Lengkap" required autofocus />
                                        <label for="name">Nama Lengkap</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="username" name="username"
                                            placeholder="Username" required />
                                        <label for="username">Username</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                            placeholder="Tempat Lahir" required />
                                        <label for="tempat_lahir">Tempat Lahir</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="date" class="form-control" id="tanggal_lahir"
                                            name="tanggal_lahir" placeholder="Tanggal Lahir" required />
                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="status_id" name="status_id" aria-label="Status"
                                            required>
                                            <option selected>--- Pilih Status ---</option>
                                            <option value="1">Reguler</option>
                                            <option value="2">Asuransi</option>
                                            <option value="3">BPJS</option>
                                        </select>
                                        <label for="status_id">Status</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="no_hp" name="no_hp"
                                            placeholder="No Handphone" required />
                                        <label for="no_hp">No Handphone</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Alamat" id="alamat" name="alamat" style="height: 100px" required></textarea>
                                <label for="alamat">Alamat</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Alamat Email" required />
                                <label for="email">Alamat Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password" required />
                                <label for="password">Password</label>
                            </div>
                            <div class="form-check mt-3s">
                                <input class="form-check-input input-primary" type="checkbox" id="customCheckc1"
                                    checked="" />
                                <label class="form-check-label" for="customCheckc1">
                                    <h5>Saya setuju dengan <span>Syarat & Ketentuan berlaku.</span></h5>
                                </label>
                            </div>
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary p-2">Daftar</button>
                            </div>
                        </form>
                        <hr />
                        <h5 class="d-flex justify-content-center">Sudah punya akun?<a href="{{ route('login') }}"
                                class="ms-1">Masuk disini...</a></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
    <!-- Required Js -->
    <script src="{{ asset('admin') }}/js/plugins/popper.min.js"></script>
    <script src="{{ asset('admin') }}/js/plugins/simplebar.min.js"></script>
    <script src="{{ asset('admin') }}/js/plugins/bootstrap.min.js"></script>
    <script src="{{ asset('admin') }}/js/config.js"></script>
    <script src="{{ asset('admin') }}/js/pcoded.js"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('admin/cdn/http_cdn.jsdelivr.net_npm_sweetalert2@11.js') }}"></script>
    <script src="{{ asset('admin/cdn/http_cdnjs.cloudflare.com_ajax_libs_toastr.js_latest_toastr.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            var successMessage = '{{ session('success') }}';

            if (successMessage) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: successMessage,
                });
            }
        });
    </script>
</body>
<!-- [Body] end -->

</html>
