@extends('layouts.auth_app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('header')
    <h2 class="page__title">新規会員登録</h2>
    <div class="step">
        Step1 アカウントの作成
    </div>
@endsection

@section('content')
    <form class="auth__form" action="/register/step1"  method="post">
        @csrf
        <div class="auth__input">
            <label>お名前</label>
            <input type="text" name="name" placeholder="名前を入力" >
            <div class="error">お名前を入力してください</div>
        </div>
        <div class="auth__input">
            <label>メールアドレス</label>
            <input type="text" name="email" placeholder="メールアドレスを入力">
            <div class="error">メールアドレスを入力してください</div>
        </div>
        <div class="auth__input">
            <label>パスワード</label>
            <input type="password" name="password" placeholder="パスワード">
            <div class="error">パスワードを入力してください</div>
        </div>
        <div class="move__page">
            <button class="btn">次に進む</button>
            <div class="link__login">
                <a href="/login"> ログインはこちら</a>
            </div>
        </div>
    </form>
@endsection