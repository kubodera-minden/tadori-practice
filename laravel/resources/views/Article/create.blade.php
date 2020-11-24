@extends('article/layout') <!-- layout.blade.phpを継承 -->
@section('content')
@include('article/form', ['target' => 'store'])
@endsection
