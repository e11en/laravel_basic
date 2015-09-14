<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top no-print" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">Title</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            @if (Auth::guest())
                <li><a href="{{ url('/auth/login') }}"><i class="fa fa-fw fa-user"></i> Login</a></li>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/auth/logout') }}"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
                    </ul>
                </li>
            @endif
        </li>
    </ul>
    @if (!Auth::guest())
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li class="{{ isActiveRoute('') }}">
                <a href="{{ url('/') }}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>
            @if (!Auth::guest())
                <li class="{{ areActiveRoutes(['user.index', 'user.edit', 'user.create']) }}"><a href="{{ url('user') }}"><i class="fa fa-fw fa-table"></i> Users</a></li>
            @endif
        </ul>
    </div>
    <!-- /.navbar-collapse -->
    @endif
</nav>