<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/home') }}" class="brand-link">
        <img src="{{asset('AdminLTE/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">News</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('AdminLTE/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            @if (Auth::guest())
            @else
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name}}</a>
            <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
            @endif
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

{{--                The Users --}}
                @can('manage-users')
                <li class="nav-item">
                    <a href="{{route('users.index')}}" class="nav-link">
                        <i class="fas fa-users nav-icon"></i>
                        <p>All Users</p>
                    </a>
                </li>
                @endcan
{{--                    The Category--}}
                <li class="nav-item">
                    <a href="{{route('category.index')}}" class="nav-link">
                        <i class="fas fa-list-alt"></i>
                        <p>Category</p>
                    </a>
                </li>
{{--                The News--}}
                <li class="nav-item">
                    <a href="{{route('news.index')}}" class="nav-link">
                        <i class="fas fa-newspaper"></i>
                        <p>News</p>
                    </a>
                </li>





            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
