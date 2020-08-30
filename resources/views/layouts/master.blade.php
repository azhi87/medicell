
<!-- @if (!Auth::check())
  {{redirect('/login')}}
@endif  -->

<!DOCTYPE html>
<head>
<title>E-Clinic</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="{{asset('/public/favicon.ico')}}" type="image/x-icon">
<link rel="icon" href="{{asset('/public/favicon.ico')}}" type="image/x-icon">

<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('/public/css/bootstrap.css')}}" >
<link rel="stylesheet" type="text/css" media="print" href="{{asset('/public/css/print.css?version=1.4')}}">

<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('/public/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('/public/css/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('/public/css/font.css')}}" type="text/css"/>
<script src="https://kit.fontawesome.com/49e2bc89ad.js"></script>
<!-- calendar -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />

@yield('links')
  
</head>
<body>
  
<section id="container">
   @include('layouts.navbar')
   @include('layouts.messages')
    @yield('content')
    </div><!-- /.container -->
    @include('layouts.footer')
    @yield('afterFooter')
  </body>
</html>
