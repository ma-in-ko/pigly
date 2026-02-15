@extends('layouts.auth_app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/goal_setting.css') }}">
@endsection

@section('content')
    <h2 class="page__title">目標体重設定</h2>
    <form class="auth__form" action="{{ url('/weight/goal_setting') }}"  method="post">
        @csrf
        <div class="auth__input">
            <input type="text" name="weight" value="{{ old('weight') }}" placeholder="46.5"><span>kg</span>
            @error('weight')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="move__page">
            <div class="link__return">
                <a href="/weight_logs"> 戻る</a>
            </div>
            <button class="btn"  type="submit" >更新</button>
        </div>
    </form>
@endsection