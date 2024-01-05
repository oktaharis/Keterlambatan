<!DOCTYPE html>
<html lang="en" data-bs-theme="white">

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekam Keterlambatan</title>

    <!-- External CSS and icon libraries -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.7.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <!-- Main wrapper -->
    <div class="wrapper">
        <!-- Sidebar -->
        <aside id="sidebar" class="js-sidebar">
            <div class="h-100">
                <!-- Sidebar logo -->
                <div class="sidebar-logo" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    <a class="fs-5" href="#">Rekam Keterlambatan</a>
                </div>
                <!-- Sidebar navigation -->
                <ul class="sidebar-nav">
                    <!-- Dashboard link -->
                    {{-- <img src="{{ asset('image/profile.jpg') }}" class="img-thumbnail p-1 rounded-5" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);width: 50px;
                    height: 50px;">
                    <li class="sidebar-item"> --}}
                        <a href="{{ Auth::user()->role === 'admin' ? route('home') : route('homePs') }}" class="sidebar-link">
                            <i class="fa-solid fa-house"></i> Dashboard
                        </a>
                    </li>

                    <!-- Data Master section -->
                    @if (Auth::check() && Auth::user()->role == "admin")
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#pages" data-bs-toggle="collapse"
                            aria-expanded="false">
                            <i class="fa-solid fa-database"></i> Data Master
                        </a>
                        <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <!-- Data Rayon link -->
                            <li class="sidebar-item">
                                <a href="{{ route('rayons.index') }}" class="sidebar-link">
                                     - Data Rayon
                                </a>
                            </li>
                            <!-- Data Rombel link -->
                            <li class="sidebar-item">
                                <a href="{{ route('rombels.index') }}" class="sidebar-link">
                                     - Data Rombel
                                </a>
                            </li>
                            <!-- Data Siswa link -->
                            <li class="sidebar-item">
                                <a href="{{ route('students.index') }}" class="sidebar-link">
                                     - Data Siswa
                                </a>
                            </li>
                            <!-- Data User link -->
                            <li class="sidebar-item">
                                <a href="{{ route('users.index') }}" class="sidebar-link">
                                     - Data User
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif

                    <!-- Data Keterlambatan link -->
                    @if (Auth::check())
                    @if (Auth::check() && Auth::user()->role == "ps")
                    <li class="sidebar-item">
                        <a href="{{ Auth::user()->role == 'ps' ? route('ps.student.indexPs','[id]') : '#' }}" class="sidebar-link">
                            <i class="fa-solid fa-graduation-cap"></i>
                            Data Siswa
                        </a>
                    </li>
                    @endif
                    <li class="sidebar-item">
                        <a href="{{ Auth::user()->role == 'admin' ? route('admin.lates.data') : route('ps.lates.indexPs') }}"
                            class="sidebar-link">
                            <i class="fa-solid fa-clock"></i>
                            Data Keterlambatan
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </aside>

        <!-- Main content -->
        <div class="main">
            <!-- Navbar -->
            <nav class="navbar navbar-expand px-3 border-bottom bg-white" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.418);">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <!-- User dropdown menu -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                 @if(Auth::check())
                                {{ Auth::user()->name }}
                                <img src="{{ asset('image/profile.jpg') }}" class="img-thumbnail p-1 rounded-5" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);width: 30px;
                    height: 30px;">
                                @else
                                User not authenticated
                                @endif
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item">Profile</a>
                                <a href="#" class="dropdown-item">Setting</a>
                                <a href="{{ route('logout') }}" class="dropdown-item">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main content container -->
            <div class="container mt-5">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Script includes -->
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/nav.js') }}"></script>

    <!-- Feather icons replacement -->
    <script>
        feather.replace();
    </script>

    <!-- Conditional script inclusion -->
    @if(isset($script) && $script)
    @else
</body>

</html>
@endif