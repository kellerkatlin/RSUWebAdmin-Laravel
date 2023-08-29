<!DOCTYPE html>

<head>


    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
   
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-success" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar Start -->
    <div class="container-fluid bg-success text-white d-none d-lg-flex">
        <div class="container py-3">
            <div class="d-flex justify-content-between">
                <div>
                    <a href="/" class="me-auto">
                        <h2 class="text-white fw-bold m-0">RSU</h2>
                    </a>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <small class="ms-auto me-4"><i class="fa fa-map-marker-alt me-3"></i>San Martin</small>
                    <small class="ms-auto me-4"><i class="fa fa-envelope me-3"></i>info@unsm.edu.pe</small>
                    <small class="ms-auto me-4"><i class="fa fa-phone-alt me-3"></i>+51 935 064 473</small>
                    <div class="ms-3 d-flex">
                        @if (Route::has('login'))
                            @auth
                                @can('admin.home')
                                    <a href="{{ route('admin.home') }}"
                                        class="text-white ms-auto me-4">{{ Auth::user()->name }}</a>
                                @endcan
                            @else
                                <a href="{{ route('login') }}" class="text-white ms-auto me-4">Iniciar Sesión</a>

                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid bg-white sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
                <a href="/" class="navbar-brand d-lg-none">
                    <h1 class="fw-bold m-0">RSU</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav me-auto mb-2 mb-lg-0">
                        @if (Route::has('login'))
                            @auth
                                @can('admin.home')
                                    <a href="{{ route('admin.home') }}"
                                        class="text-white ms-auto me-4">{{ Auth::user()->name }}</a>
                                @endcan
                            @else
                                <a href="{{ route('login') }}" class="d-lg-none nav-item nav-link">Iniciar Sesión</a>

                            @endauth
                        @endif

                        <a href="/" class="nav-item nav-link">Inicio</a>
                        <a href="about" class="nav-item nav-link">Nosotros</a>
                        <a href="service" class="nav-item nav-link">Servicios</a>
                        <a href="project" class="nav-item nav-link">Proyectos</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Paginas</a>
                            <div class="dropdown-menu bg-light rounded-0 rounded-bottom m-0">
                                <a href="feature" class="dropdown-item">Solicitud Actividades</a>
                                <a href="team" class="dropdown-item">Nuestro equipo</a>
                                <a href="testimonial" class="dropdown-item">Testimonios</a>
                                <a href="quote" class="dropdown-item">Voluntariado</a>
                                <a href="404" class="dropdown-item">Medio Ambiente</a>
                            </div>
                        </div>
                        <a href="contact.html" class="nav-item nav-link">Contactanos</a>
                    </div>
                    <div class="ms-auto d-none d-lg-block">
                        <a href="" class="btn btn-success rounded-pill py-2 px-3">MAS</a>
                    </div>
                </div>
            </nav>
        </div>

    </div>

    <div id="content">
        @yield('content')
    </div>
    <!-- JavaScript Libraries -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>
   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Template Javascript -->


</body>

</html>
