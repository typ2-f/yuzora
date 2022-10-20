@extends('default.common')
@section('title', 'atte-ホーム')
@section('pageCSS')
    <link rel='stylesheet' href='{{ asset('css/stamp.css') }}'>
@endsection

@section('content')
    <p class='content-ttl'>{{ $name }},こんにちは！</p>
@endsection
@section('pageJS')
    <script src={{ asset('js/stamp.js') }}></script>
    <script src='https://unpkg.com/dayjs'></script>
    <script src='https://unpkg.com/dayjs@1.7.7/locale/ja.js'></script>
@endsection
