@extends('layouts.auth_app')

@section('css')
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP&display=swap" rel="stylesheet">

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
            <input type="text" name="name" value="{{ old('name') }}" placeholder="名前を入力" >
            @error('name')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="auth__input">
            <label>メールアドレス</label>
            <input type="text" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="メールアドレスを入力">
            @error('email')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="auth__input">
            <label>パスワード</label>
            <input type="password" name="password" autocomplete="new-password" placeholder="パスワード">
            @error('password')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="move__page">
            <button type="submit" class="btn">次に進む</button>
            <div class="link__login">
                <a href="/login"> ログインはこちら</a>
            </div>
        </div>
    </form>
@endsection