@extends('layouts.auth_app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('header')
    <h2 class="page__title">ログイン</h2>
@endsection

@section('content')
    <form class="auth__form" action="/login"  method="post">
        @csrf
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
            <button class="btn">ログイン</button>
            <div class="link__login">
                <a href="/login"> アカウント作成はこちら</a>
            </div>
        </div>
    </form>
@endsection