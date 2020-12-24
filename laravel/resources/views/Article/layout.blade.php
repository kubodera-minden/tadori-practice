<head>
  <title>Laravel Sample</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
<div class="navbar navbar-dark navbar-fixed-top logo">
  <a href="/" class="navbar-brand">
    <img src="{{ asset('storage/enect_img/enect_logo.png') }}" class="">
  </a>
  <a href="/create">新規投稿</a>
  <a href="/#/products">顔の見える商品</a>
  <a href="/#/questions">みんなのハテナ</a>
  <a href="/#/questions/create">質問する</a>
</div>
<div class="body">
  @yield('content')  
</div>