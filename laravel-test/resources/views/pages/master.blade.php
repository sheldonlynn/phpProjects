<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'SwipeRightToApply: Apply instantly to jobs nearby')</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="https://maxcdn.bootstrapcdn.com/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/public/css/sticky-footer-navbar.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>


</head>
<body>
{{--<div class="flex-center position-ref full-height">--}}
    {{--@if (Route::has('login'))--}}
        {{--<div class="top-right links">--}}
            {{--@auth--}}
                {{--<a href="{{ url('/home') }}">Home</a>--}}
                {{--@else--}}
                    {{--<a href="{{ route('login') }}">Login</a>--}}
                    {{--<a href="{{ route('register') }}">Register</a>--}}
                    {{--@endauth--}}
        {{--</div>--}}
    {{--@endif--}}

    <div class="content">

        <!-- Fixed navbar -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">SwipeRightToApply</a>
                </div>

                <div id="navbar" class="links collapse navbar-collapse">
                    <ul class="nav navbar-nav">

                        <li class="{{setClassForURLPath('/')}}"><a href="/">Home</a></li>
                        <li class="{{setClassForURLPath('about')}}"><a href="/about">About</a></li>
                        <li class="{{setClassForURLPath('contact')}}"><a href="/contact">Contact</a></li>
                        <li class="{{setClassForURLPath('post/*')}}"><a href="/post/1">Our Jobs</a></li>
                        <li class="{{setClassForURLPath('profile')}}"><a href="/profile">Our Company Profile</a></li>


                        <!--
                        <a href="/">Home</a>
                        <a href="/post/1">Our Job Postings</a>
                        <a href="/profile">Company Profile</a>
                        <a href="contact">Contact</a>
                        <a href="about">About</a>
                        -->

                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="page-header">
                <div class="title m-b-md">
                    @yield('header')
                </div>

                <div style="font-weight:800;">Apply with a swipe; post in seconds</div>

                <div style="color:black; font-weight:800; margin:5%;">
                    @yield('data')
                </div>
            </div>
        </div>

    </div>
{{--</div>--}}

@yield('footer')
@yield('css')

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-108355543-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-108355543-1');
</script>


</body>
</html>
