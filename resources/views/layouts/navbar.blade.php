<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

    <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown mr-3">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-user mr-1"></i>Hai, {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                <form class="dropdown-item" action="/logout" method="post">
                    @csrf
                    <button type="submit" class="btn btn-white"><i class="fas fa-sign-out-alt"></i> Keluar</button>
                </form>
                {{-- <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                </a> --}}
            </div>
        </li>
    </ul>
</nav>