@extends('article/layout') <!-- layout.blade.phpを継承 -->
@section('content')
<div class="container ops-main">

<div id="app">
    <router-view />
</div>

<script src=" {{ mix('js/app.js') }} "></script> 
@endsection
