@extends('layouts.weight_app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/target_edit.css') }}">
@endsection

@section('content')
    <div class="page">
        <div class="card">
            <h2 class="page__title">
            目標体重設定
            </h2>
            <form class="target-weight__edit" action="/weight_logs/target_edit"  method="post">
            @csrf
                <div class="form__group">
                    <div class="input__unit">
                        <input type="number"
                        step="0.1" name="weight" placeholder="46.5">
                        <span>kg</span>
                    </div>
                    <div class="error">体重を入力してください</div>
                </div>

                <div class="form__actions">
                    <div class="btn__return">
                        <a href="/weight_logs" class="btn btn--gray"> 戻る</a>
                    </div>
                    <button type="submit" class="btn btn--primary">更新</button>
                </div>
            </form>
        </div>
    </div>
@endsection
