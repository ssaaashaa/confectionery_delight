<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DELIGHT | Панель администратора</title>
    <link rel="stylesheet" href="/css/admin.css">
    <link rel="icon" href="/storage/img/icon.svg" style="width: max-content">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

    <!-- Google Font: Source Sans Pro -->
    {{--    <link rel="stylesheet"--}}
    {{--          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">--}}
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
{{--    --}}{{--    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">--}}
{{--    <!-- Tempusdominus Bootstrap 4 -->--}}
{{--    --}}{{--    <link rel="stylesheet" href="/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">--}}
{{--    <!-- iCheck -->--}}
{{--    --}}{{--    <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">--}}
{{--    <!-- JQVMap -->--}}
{{--    --}}{{--    <link rel="stylesheet" href="/plugins/jqvmap/jqvmap.min.css">--}}
{{--    <!-- Theme style -->--}}
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
        <link rel="stylesheet" href="/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker.css">
    {{--    <link href="/dist/css/colorbox.css" rel="stylesheet">--}}
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


    <aside class="main-sidebar sidebar-dark-primary elevation-4 admin-aside">
        <a href="" class="brand-link">
            <img src="/storage/img/logo.svg" width="120" height="auto" alt="logo"
                 class="brand-image" style="opacity: .8">
        </a>
        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item" style="color: white; margin: auto">
                        <p>
                            {{Auth::user()->name}}
                        </p>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.feedback-requests.index')}}" class="nav-link">
                            <i class="nav-icon far fa-newspaper"></i>
                            <p>
                                Заявки
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <p>
                                Дегустации
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.tasting.index')}}" class="nav-link">
                                    <p>Все дегустации</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.tasting.create')}}" class="nav-link">
                                    <p>Добавить дегустацию</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.event-records.create', ["event_type"=>"2"])}}" class="nav-link">
                                    <p>Запись на дегустацию</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <p>
                                Презентация
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.presentation.index')}}" class="nav-link">
                                    <p>О презентации</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.event-records.create', ["event_type"=>"1"])}}" class="nav-link">
                                    <p>Запись на презентацию</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Администраторы
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.admin.index')}}" class="nav-link">
                                    <p>Все администраторы</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.admin.create')}}" class="nav-link">
                                    <p>Добавить администратора</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </nav>
        </div>
    </aside>

    <div class="content-wrapper">
        @yield('content')
    </div>

    <aside class="control-sidebar control-sidebar-dark">
    </aside>
</div>

{{--<!-- jQuery -->--}}
{{--<script src="/plugins/jquery/jquery.min.js"></script>--}}
{{--<!-- jQuery UI 1.11.4 -->--}}
<script src="/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)

</script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
{{--<script src="/plugins/chart.js/Chart.min.js"></script>--}}
<!-- Sparkline -->
{{--<script src="plugins/sparklines/sparkline.js"></script>--}}
{{--<!-- JQVMap -->--}}
{{--<script src="/plugins/jqvmap/jquery.vmap.min.js"></script>--}}
{{--<script src="/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>--}}
<!-- jQuery Knob Chart -->
{{--<script src="/plugins/jquery-knob/jquery.knob.min.js"></script>--}}
<!-- daterangepicker -->
{{--<script src="/plugins/moment/moment.min.js"></script>--}}
{{--<script src="/plugins/daterangepicker/daterangepicker.js"></script>--}}
<!-- Tempusdominus Bootstrap 4 -->
{{--<script src="/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>--}}
<!-- Summernote -->
{{--<script src="/plugins/summernote/summernote-bs4.min.js"></script>--}}
<!-- overlayScrollbars -->
{{--<script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>--}}
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.js"></script>

<!-- AdminLTE for demo purposes -->
{{--<script src="/dist/js/demo.js"></script>--}}
{{--<!-- AdminLTE dashboard demo (This is only for demo purposes) -->--}}
{{--<script src="/dist/js/pages/dashboard.js"></script>--}}
{{--<script type="text/javascript" src="/dist/js/jquery.colorbox-min.js"></script>--}}
{{--<script src="https://cdn.tiny.cloud/1/jxsqeq85qzdwuqqqruya91jqsrhqtxykhxtks6sn0t1kn69g/tinymce/5/tinymce.min.js"--}}
{{--        referrerpolicy="origin"></script>--}}
{{--<script type="text/javascript" src="/packages/barryvdh/elfinder/js/standalonepopup.js"></script>--}}
<script>
    $(".phone-mask").mask("+375 (99) 999-99-99");

    $(document).ready(function () {
        $(".nav-treeview .nav-link, .nav-link").each(function () {
            var location2 = window.location.protocol + '//' + window.location.host + window.location.pathname;
            var link = this.href;
            if (link == location2) {
                $(this).addClass('active');
                $(this).parent().parent().parent().addClass('menu-is-opening menu-open');

            }
        });

        $('.delete-btn').click(function () {
            var res = confirm('Вы уверены, что хотите удалить запись?');
            if (!res) {
                return false;
            }
        });
    })
</script>
</body>

</html>
