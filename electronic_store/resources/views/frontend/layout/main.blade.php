<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield("title")</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- end for-mobile-apps -->

    <link href="{{asset('/electronic_store')}}/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('/electronic_store')}}/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('/electronic_store')}}/css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('/electronic_store')}}/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/electronic_store')}}/css/jquery.countdown.css" /> <!-- countdown -->
    <link rel="stylesheet" href="{{asset('/electronic_store')}}/css/fasthover.css" />
    <link rel="stylesheet" href="{{asset('/electronic_store')}}/css/main.css" /> <!-- custom css tại đây -->

    <script src="{{asset('/electronic_store')}}/js/jquery.min.js"></script>
    <script type="text/javascript" src="{{asset('/electronic_store')}}/js/bootstrap-3.1.1.min.js"></script>
</head>
<body>


@include('frontend.partials.header')

@include('frontend.partials.nav')

@yield('content')

@include('frontend.partials.newsletter')

@include('frontend.partials.footer')


<script src="{{asset('/electronic_store')}}/js/main.js" type="text/javascript"></script> <!-- custom js tại đây -->

</body>
</html>