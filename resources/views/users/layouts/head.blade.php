<!DOCTYPE html>
<html class="no-js" lang="zxx">
    <head>
        <!-- Meta tag -->

		{{--  meta for google start  --}}
		<meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="description" content="@yield('ogdescription', 'Professional Web Developer')">
		<meta name='copyright' content="@yield('ogurl', 'https://lamcoder.com/')">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="@yield('user', 'Sohel Arman')">
		{{--  meta for google start  --}}

		{{--  twitter card start  --}}
		<meta name="twitter:card" content="@yield('ogdescription', 'Professional Web Developer')" />
		<meta name="twitter:site" content="@yield('ogurl', 'https://lamcoder.com/')" />
		<meta name="twitter:creator" content="@yield('user', 'Sohel Arman')" />
		{{--  twitter card end  --}}

		{{--  Open Graph for facebook start  --}}
        <meta property="og:url"           content="@yield('ogurl', 'https://lamcoder.com/')" />
        <meta property="og:type"          content="website" />
        <meta property="og:title"         content="@yield('ogtitle', 'Sohel Arman')" />
        <meta property="og:description"   content="@yield('ogdescription', 'Professional Web Developer')" />
        <meta property="og:image"         content="@yield('ogimage', 'https://pbs.twimg.com/profile_images/1564285679047061504/kYy0VQbt_400x400.jpg')" />
        <meta property="og:image:alt"     content="@yield('og:image:alt', 'Soehl Arman Image Name')" />
		{{--  Open Graph for facebook end  --}}

        <link rel="icon" type="image/x-icon" href="{{ asset('users/images/favicon.ico') }}">

		<!-- Title Tag -->
        <title> @yield('title', 'Sohel Arman')</title>

		<!-- Favicon -->

        <!-- Google Font -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">

		<!-- Animate CSS -->
        <link rel="stylesheet" href="{{ asset('users/css/animate.min.css') }}">

		<!-- Font Awesome CSS -->
        <link rel="stylesheet" href="{{ asset('users/css/font-awesome.min.css') }}">

		<!-- Fancy Box CSS -->
        <link rel="stylesheet" href="{{ asset('users/css/jquery.fancybox.min.css') }}">

		<!-- Slick Nav CSS -->
        <link rel="stylesheet" href="{{ asset('users/css/slicknav.min.css') }}">

		<!-- Animate Text -->
        <link rel="stylesheet" href="{{ asset('users/css/animate-text.css') }}">

		<!-- Owl Carousel CSS -->
		<link rel="stylesheet" href="{{ asset('users/css/owl.theme.default.css') }}">
        <link rel="stylesheet" href="{{ asset('users/css/owl.carousel.min.css') }}">

		<!-- Bootstrap Css -->
        <link rel="stylesheet" href="{{ asset('users/css/bootstrap.min.css') }}">

		<!-- Sufia StyleShet -->
        <link rel="stylesheet" href="{{ asset('users/style.css') }}">
        <link rel="stylesheet" href="{{ asset('users/css/reset.css') }}">
        <link rel="stylesheet" href="{{ asset('users/css/responsive.css') }}">

		<!-- Maheraj Template Color -->
		<link rel="stylesheet" href="{{ asset('users/css/color/color1.css') }}">
		<!--<link rel="stylesheet" href="{{ asset('users/css/color/color2.css') }}">-->
		<!--<link rel="stylesheet" href="{{ asset('users/css/color/color3.css') }}">-->
		<!--<link rel="stylesheet" href="{{ asset('users/css/color/color4.css') }}">-->
		<!--<link rel="stylesheet" href="{{ asset('users/css/color/color5.css') }}">-->
		<!--<link rel="stylesheet" href="{{ asset('users/css/color/color6.css') }}">-->
		<!--<link rel="stylesheet" href="{{ asset('users/css/color/color7.css') }}">-->
		<!--<link rel="stylesheet" href="{{ asset('users/css/color/color8.css') }}">-->
		<!--<link rel="stylesheet" href="{{ asset('users/css/color/color9.css') }}">-->
		<!--<link rel="stylesheet" href="{{ asset('users/css/color/color10.css') }}">-->

		<!--[if lt IE 9]>
           <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>

		<!-- Preloader -->
		<div class="loader">
			<div class="loader-inner">
				<div class="k-line k-line11-1"></div>
				<div class="k-line k-line11-2"></div>
				<div class="k-line k-line11-3"></div>
				<div class="k-line k-line11-4"></div>
				<div class="k-line k-line11-5"></div>
			</div>
		</div>
		<!-- End Preloader -->
