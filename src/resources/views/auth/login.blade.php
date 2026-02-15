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
            <input type="text" name="email" value="{{ old('email') }}" placeholder="メールアドレスを入力">
            @error('email')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="auth__input">
            <label>パスワード</label>
            <input type="password" name="password" value="{{ old('password') }}" placeholder="パスワード">
            @error('password')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="move__page">
            <button class="btn"  type="submit" >ログイン</button>
            <div class="link__auth-register">
                <a href="/register/step1"> アカウント作成はこちら</a>
            </div>
        </div>
    </form>
@endsection