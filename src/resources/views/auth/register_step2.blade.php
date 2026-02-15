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
    <form class="auth__form" action="/register/complete"  method="post">
        @csrf
        <div class="auth__input">
            <label>現在の体重</label>
            <input type="number" name="weight" step="0.1" min="0" value="{{ old('weight') }}" placeholder="現在の体重を入力" >
            <span>kg</span>
            @error('weight')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="auth__input">
            <label>目標の体重</label>
            <input type="number" name="target_weight" step="0.1" min="0" value="{{ old('target_weight') }}" placeholder="目標の体重を入力">
            <span>kg</span>
            @error('target_weight')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="move__page">
            <button class="btn">アカウント作成</button>
        </div>
    </form>
@endsection