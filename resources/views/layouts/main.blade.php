<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/datepicker.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    {{-- this is a cdn of ck editor --}}
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    {{-- this is our own custom css  --}}
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
</head>

<body class="hold-transition sidebar-mini layout-fixed text-sm">
    @include('sweetalert::alert')
    @livewireStyles
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-user"></i> <span class="px-2">{{ auth()->user() == null ? "ADMIN" : auth()->user()->name }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> <span
                                class="px-3">{{ __('Logout') }}</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ url('/') }}" class="brand-link">
                <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ auth()->user() == null ? "ADMIN" : auth()->user()->name }}</a>
                    </div>
                </div> --}}

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('land-owner.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    {{ __('जग्गाधनीको विवरण') }}
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview  @yield('menu_ope')">
                            <a href="#" class="nav-link">
                                <i class="fas fa-tachometer-alt nav-icon"></i>
                                <p class="px-2 font-weight-bold">
                                    {{ __('ड्यासबोर्ड सेटिङ्हरू') }}
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview " style="display: @yield('s_child_dashboard')">
                                <li class="nav-item">
                                    <a href="{{ route('about-us.index') }}"
                                        class="nav-link @yield('dashboard_about_us')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p class="px-2">{{ __('हाम्रो बारेमा') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('notice.index') }}"
                                        class="nav-link @yield('dashboard_notice')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p class="px-2">{{ __('सूचना') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('Publication.index') }}"
                                        class="nav-link @yield('dashboard_publication')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p class="px-2">{{ __('प्रकाशन') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('agriculture-animal-detail.index') }}"
                                        class="nav-link @yield('dashboard_agriculture_animal_detail')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p class="px-2">{{ __('कृषि तथा पशुपन्छि सम्बन्धि') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('question.index') }}"
                                        class="nav-link @yield('dashboard_question')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p class="px-2">{{ __('प्रश्नहरू') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('agriculture-weather.index') }}"
                                        class="nav-link @yield('dashboard_agriculture_weather')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p class="px-2">{{ __('कृषि - मौसम सल्लाह बुलेटिन') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('market-plan.index') }}"
                                        class="nav-link @yield('dashboard_market_plan')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p class="px-2">{{ __('ब्यबसायिक योजना') }}</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview  @yield('menu_open')">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p class="px-2 font-weight-bold">
                                    {{ __(' सेटिङ्हरू') }}
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview " style="display: @yield('s_child')">
                                <li class="nav-item">
                                    <a href="{{ route('gender.index') }}" class="nav-link @yield('setting_gender')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p class="px-2">{{ __('लिङ्ग') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('citizenship-type.index') }}"
                                        class="nav-link @yield('setting_citizenship_type')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p class="px-2">{{ __('नागरिकताको किसिम') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('marital-status.index') }}"
                                        class="nav-link @yield('setting_marital_status')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p class="px-2">{{ __('बैवाहिक स्थिति ') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('business.index') }}"
                                        class="nav-link @yield('setting_business')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p class="px-2">{{ __('व्यबसाय') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('education-qualification.index') }}"
                                        class="nav-link @yield('setting_education_qualification')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p class="px-2">{{ __('शैक्षिक योग्यता') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('irrigation-type.index') }}"
                                        class="nav-link @yield('setting_irrigation_type')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p class="px-2">{{ __('सिचाईको प्रकार') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('organization-type.index') }}"
                                        class="nav-link @yield('setting_organization_type')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p class="px-2">{{ __('संस्थाको प्रकार ') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('marketing-system.index') }}"
                                        class="nav-link @yield('setting_marketing_system')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p class="px-2">{{ __('बजारीकरण प्रणाली') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('ethnic-group.index') }}"
                                        class="nav-link @yield('setting_ethnic_group')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p class="px-2">{{ __('जातीय समूह') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('region.index') }}" class="nav-link @yield('setting_region')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p class="px-2">{{ __('क्षेत्र') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('area.index') }}" class="nav-link @yield('setting_area')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p class="px-2">{{ __('क्षेत्रफल') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('land-type.index') }}"
                                        class="nav-link @yield('setting_land_type')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p class="px-2">{{ __('जग्गा') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('animal.index') }}" class="nav-link @yield('setting_animal')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p class="px-2">{{ __('पशु') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('production-animal.index') }}"
                                        class="nav-link @yield('setting_production_animal')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p class="px-2">{{ __('पशुजन्य उत्पादन') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('crop-type.index') }}"
                                        class="nav-link @yield('setting_crop_type')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p class="px-2">{{ __('बालीको प्रकार') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('crop.index') }}" class="nav-link @yield('setting_crop')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p class="px-2">{{ __('बाली') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('crop-area.index') }}"
                                        class="nav-link @yield('setting_crop_area')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p class="px-2">{{ __('बाली छेत्रफल') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('facility.index') }}"
                                        class="nav-link @yield('setting_facility')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p class="px-2">{{ __('सुबिधा') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('helping-organization.index') }}"
                                        class="nav-link @yield('setting_helping_organization')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p class="px-2">{{ __('सहयोगी संस्था') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('seed-source.index') }}"
                                        class="nav-link @yield('setting_seed_source')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p class="px-2">{{ __('बीउबिजनको स्रोत') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('seed-supplier.index') }}"
                                        class="nav-link @yield('setting_seed_supplier')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p class="px-2">{{ __('बीउबिजनको प्रदायक') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('main-market.index') }}"
                                        class="nav-link @yield('setting_main_market')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p class="px-2">{{ __('मुख्य बजार') }}</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('unit.index') }}" class="nav-link @yield('setting_unit')">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p class="px-2">{{ __('एकाई') }}</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            @yield('main_content')
                        </div>
                    </div>
                </div>
            </section>
            <!-- Main content -->
            <!-- /.content -->
        </div>
    </div>
    <!-- ./wrapper -->
    @livewireScripts
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <!-- JQVMap -->
    {{-- <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script> --}}
    <!-- jQuery Knob Chart -->
    {{-- <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script> --}}
    <!-- daterangepicker -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="{{ asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/datepicker.js') }}"></script>
    <script src="{{ asset('js/land.js') }}"></script>
    @yield('scripts')
</body>

</html>
