<head>
  <title>Laravel Sample</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
<div class="navbar navbar-dark navbar-fixed-top logo d-flex justify-content-start flex-nowrap">
  <a href="/#/" class="navbar-brand">
    <img src="{{ asset('storage/Tadori_logo.png') }}" class="">
  </a>
  <div class="w-100 d-flex justify-content-around align-self-center">
    <a href="/#/products">Select（顔の見える商品）</a>
    <a href="/#/questions">Research（みんなのはてな）</a>
    <a href="/#/home">マイページ</a>
    <a href="/home">ユーザー登録</a>
  </div>
</div>
<div class="body">
  @yield('content')  
</div>

<footer>
  <div class="footer d-flex flex-column">
    <div class="sns-container row d-flex justify-content-center m-5">
      <a class="instagram col-1" href="https://www.instagram.com/minden_official/"></a>
      <a class="facebook col-1" href="https://www.facebook.com/enetomo"></a>
      <a class="twitter col-1" href="https://twitter.com/minden_PR"></a>
    </div>
    <div class="category-container row d-flex justify-content-center mb-5">
      <a href="/#/articles/create">新規投稿</a>
      <a href="/#/products" class="col-3">顔の見える商品</a>
      <a href="/#/questions" class="col-3">みんなのハテナ</a>
      <a href="/#/questions/create" class="col-3">質問する</a>
    </div>
  </div>
</footer>