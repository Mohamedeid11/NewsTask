<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        @if (Route::has('login'))
            @auth
            <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ url('/home') }}" class="nav-link">Home</a>
        </li>
            @endauth
            @endif

    </ul>

    <!-- SEARCH FORM -->
    <form action="{{route('search')}}" method="get" class="form-inline ml-auto">
        <div class="input-group input-group-sm">
            <input type="text" name="search" id = "search"  value="{{request()->input('search')}}" class="form-control" placeholder="search....">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <ul class="navbar-nav">
            @if (Route::has('login'))

            <li class="nav-item d-none d-sm-inline-block">
                @auth
                @else
                <a href="{{ route('login') }}" class="nav-link">Login</a>
            </li>
                @if (Route::has('register'))
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('register') }}" class="nav-link">Register</a>
            </li>
                @endif
            @endauth
        </ul>

        <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="{{asset('AdminLTE/dist/img/user2-160x160.jpg')}}"
                     class="user-image" alt="User Image"/>

                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                    <img src="{{asset('AdminLTE/dist/img/user2-160x160.jpg')}}"
                         class="img-circle" alt="User Image"/>
                    <p>
                        {{ Auth::user()->name }}
                        <small>Member since {{ Auth::user()->created_at->format('M. Y') }}</small>
                    </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <div class="float-left">
                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="float-md-right">
                        <a href="{{ url('/logout') }}" class="btn btn-default btn-flatr"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Sign out
                        </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
            @endif
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>
</nav>
