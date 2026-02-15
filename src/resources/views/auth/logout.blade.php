@extends('layouts.auth_app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/logout.css') }}">
@endsection

@section('header')
    <h2 class="page__title">ログアウトしました</h2>
    <div class="logout_message">明日の記録もお待ちしています</div>
@endsection