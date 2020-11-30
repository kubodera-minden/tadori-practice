@extends('article/layout') <!-- layout.blade.phpを継承 -->
@section('content')
<div class="container ops-main">

<div id="app">
    <!-- デフォルトだとこの中ではvue.jsが有効 -->
    <!-- example-component はLaravelに入っているサンプルのコンポーネント -->
    <example-component></example-component>
    <article-index></article-index>
</div>

<script src=" {{ mix('js/app.js') }} "></script> 
@endsection
