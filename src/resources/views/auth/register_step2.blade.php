@extends('layouts.auth_app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('header')
    <h2 class="page__title">新規会員登録</h2>
    <div class="step">
        Step2 体重データの入力
    </div>
@endsection

@section('content')
    <form class="auth__form" action="/register/step2"  method="post">
        @csrf
        <div class="auth__input">
            <label>現在の体重</label>
            <input type="number" name="now_weight" step="0.1" min="0" placeholder="現在の体重を入力" >
            <span>kg</span>
            <div class="error">現在の体重を入力してください</div>
        </div>
        <div class="auth__input">
            <label>目標の体重</label>
            <input type="number" name="goal_weight" step="0.1" min="0" placeholder="目標の体重を入力">
            <span>kg</span>
            <div class="error">目標の体重を入力してください</div>
        </div>

        <div class="move__page">
            <button class="btn">アカウント作成</button>
        </div>
    </form>
@endsection