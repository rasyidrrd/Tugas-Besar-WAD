<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet"
        type="text/css" />

    <link rel="stylesheet" href="{{ URL::asset('app.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('footer.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('accordion.sass') }}">

    <title>PT Cikarang Listrindo</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light " >
        <div class="container">
            <a class="navbar-brand" href="/">PT Cikarang Listrindo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/lowongan">Lowongan</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/#about">Tentang Kami</a>
                    </li>
                </ul>
                @if ($user)
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ $user->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @if ($user->type == 'admin')
                                    <a class="dropdown-item" href="{{ route('admin.index') }}">Dashboard</a>
                                @else
                                    <a class="dropdown-item" href="{{ route('user.index') }}">Dashboard</a>
                                @endif
                                <div class="dropdown-divider"></div>
                                <form action="{{ route('user.store') }}" method="post">
                                    @csrf
                                    <input type="hidden" value="logout" name='type' />
                                    <button class="dropdown-item" type="submit">Logout</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                @else
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('home.login') }}">Login</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('user.create') }}">Register</a>
                        </li>
                    </ul>
                @endif
            </div>
        </div>
    </nav>

    <div class="">
        @yield('content')
    </div>

    <!-- Site footer -->
    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h6>About</h6>
                    <p class="text-justify">
                        Mulai beroperasi tahun 1993, Cikarang Listrindo menjadi Independent Power Producer (IPP) yang beroperasi paling lama di Indonesia, dengan kapasitas terpasang sebesar 1.144MW. Cikarang Listrindo melayani 5 (lima) Kawasan Industri yang terbesar dan paling berkembang di Indonesia.
                    </p>
                </div>

                <div class="col-xs-6 col-md-3">
                    <h6>Categories</h6>
                    <ul class="footer-links">
                        <li><a href="http://scanfcode.com/category/c-language/">Tentang Kami</a></li>
                        <li><a href="http://scanfcode.com/category/front-end-development/">CSR</a></li>
                        <li><a href="http://scanfcode.com/category/back-end-development/">Aset Kami</a></li>
                        <li><a href="http://scanfcode.com/category/java-programming-language/">Hubungan Investor</a></li>
                        <li><a href="http://scanfcode.com/category/android/">Tata Kelola Perusahaan</a></li>
                        <li><a href="http://scanfcode.com/category/templates/">Kontak</a></li>
                    </ul>
                </div>

                <div class="col-xs-6 col-md-3">
                    <h6>Quick Links</h6>
                    <ul class="footer-links">
                        <li><a href="{{ route('home.login') }}">Login</a></li>
                        <li><a href="{{ route('user.create') }}">Register</a></li>
                        <li><a href="http://scanfcode.com/contribute-at-scanfcode/">Contribute</a></li>
                        <li><a href="http://scanfcode.com/privacy-policy/">Privacy Policy</a></li>
                        <li><a href="http://scanfcode.com/sitemap/">Sitemap</a></li>
                    </ul>
                </div>
            </div>
            <hr>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <p class="copyright-text">Copyright &copy; 2020 All Rights Reserved by
                        <a href="#">PT CIKARANG LISTRINDO</a>.
                    </p>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <ul class="social-icons">
                        <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/2ed1788daf.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

    <script>
        $(function() {
            $("#datepicker").datepicker({
                autoclose: true,
                todayHighlight: true
            }).datepicker('update', new Date());
        });

    </script>

</body>

</html>
