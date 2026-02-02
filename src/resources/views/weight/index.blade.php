@extends('layouts.weight_app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="inner">
    <div class="weight-summary">
        <div class="weight-summary__item">
            <p class="weight-summary__label">
                目標体重
            </p>
            <p class="weight-summary__value">
                45.0
                <span>kg</span>
            </p>
        </div>
        <div class="weight-summary__item">
            <p class="weight-summary__label">
                目標まで
            </p>
            <p class="weight-summary__value">
                -1.5
                <span>kg</span>
            </p>
        </div>
        <div class="weight-summary__item">
            <p class="weight-summary__label">
                現在体重
            </p>
            <p class="weight-summary__value">
                46.5
                <span>kg</span>
            </p>
        </div>
    </div>

    {{--検索 --}}
    <div class="search">
        <form action="{{ route('weight.index') }}" method="get" class="weight__search">
            <input type="date" name="from">
            <span>～</span>
            <input type="date" name="to">
            <button type="submit">検索</button>
        </form>
        <div class="btn">
            <button class="data-create__btn">データ追加</button>
        </div>
    </div>
</div>
@endsection
