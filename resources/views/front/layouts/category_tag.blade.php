<!DOCTYPE html>
<html lang="en">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Site Metas -->
<title>@yield('title')</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">

<!-- Site Icons -->
<link rel="shortcut icon" href="{{ asset('assets/front/images/favicon.ico') }}" type="image/x-icon" />
<link rel="apple-touch-icon" href="{{ asset('assets/front/images/apple-touch-icon.png') }}">

<!-- Design fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700" rel="stylesheet">


<link rel="stylesheet" href="{{ asset('assets/front/css/front.min.css') }}">

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body>

<div id="wrapper">
    @include('front.inc.header')

    @yield('page-title')

    <section class="section lb">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    @include('front.inc.sidebar')
                </div><!-- end col -->

                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">

                    @yield('content')

                </div><!-- end col -->


            </div><!-- end row -->
        </div><!-- end container -->
    </section>

    @include('front.inc.footer')

    <div class="dmtop">Scroll to Top</div>

</div><!-- end wrapper -->

<script src="{{ asset('assets/front/js/front.min.js') }}"></script>

@yield('scripts')

</body>
</html>
