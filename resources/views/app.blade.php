<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FashionFitr</title>

    <!-- All Css -->
    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Thema CSS -->
    <link href="/css/sb-admin.css" rel="stylesheet" type="text/css">

    <!-- Custom Fonts -->
    <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Own CSS -->
    <link href="/css/app.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div id="wrapper">
    @include('partials.nav') <!-- Navigation partial -->

    <div id="page-wrapper">
        <div class="container-fluid">

            <!-- Render header here -->
            @yield('header')

            @include('partials.errors')

                    <!-- Flash message partial -->
            @include('flash::message')

                    <!-- Render content here -->
            @yield('content')

        </div> <!-- /#container-fluid -->
    </div> <!-- /#page-wrapper -->
</div> <!-- /#wrapper -->


<!-- Scripts -->
<script src="/js/jquery.js"></script>
<script src="/js/bootstrap.min.js"></script>

<!-- Own Script -->
<script src="/js/functions.js"></script>
<!-- UpperCase -->

<!-- Render scripts -->
@stack('scripts')
</body>
</html>