<!DOCTYPE html>
<html>
    @include('adminLte.head')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    @include('adminLte.navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('adminLte.sidbar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-fluid">
            @include('partials.alerts')

            @yield('content')
        </div>
    </div>
    <!-- /.content-wrapper -->

@include('adminLte.footer')
<!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
@include('adminLte.foot')
</body>
</html>
