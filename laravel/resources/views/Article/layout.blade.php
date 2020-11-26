<head>
  <title>Laravel Sample</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="/CSS/style.css">
</head>
<div class="navbar navbar-dark bg-primary navbar-fixed-top">
  <a href="/article" class="navbar-brand">
    <img src="{{ asset('storage/enect_img/enect_logo.png') }}" class="">
  </a>
</div>
<div class="body">
  @yield('content')  
</div>