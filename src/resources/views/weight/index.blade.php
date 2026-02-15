@extends('layouts.weight_app')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/index.css') }}">

@endsection

@section('content')
    @if(session('message'))
        <div class="flash-message">
            {{ session('message') }}
        </div>
    @endif

<div class="page">
    <div class="summary">
        <div class="summary__item">
            <p class="summary__label">
                目標体重
            </p>
            <p class="summary__value">
                {{ $targetWeight ?? '--' }}
                <span>kg</span>
            </p>
        </div>
        <div class="summary__item">
            <p class="summary__label">
                目標まで
            </p>
            <p class="summary__value">
                {{ $remaining !== null ? $remaining : '--'}}
                <span>kg</span>
            </p>
        </div>
        <div class="summary__item">
            <p class="summary__label">
                現在体重
            </p>
            <p class="summary__value">
                {{ $currentWeight ?? '--'}}
                <span>kg</span>
            </p>
        </div>
    </div>

    {{--検索 --}}
    <div class="search__area">
        <div class="search">
            <div class="search__left">
                <form action="{{ route('weight.index') }}" method="get" class="search__form">
                    <div class="form__control">
                        <input type="date" name="from" value="{{ $from ?? '' }}">
                        <span>～</span>
                        <input type="date" name="to" value="{{ $to ?? '' }}">
                    </div>
                    <div class="form__control">
                        <button type="submit" class="btn btn__search">検索</button>
                        @if($from || $to)
                            <a href="{{ route('weight.index') }}" class="btn btn__reset">リセット</a>
                        @endif
                    </div>
                </form>
            </div>
            <div class="search__left">
                <div class="form__control">
                    <a href="/weight_logs/create" class="btn btn__primary">データ追加</a>
                </div>
            </div>
        </div>

        {{--検索結果--}}
        <div class="search__result">
            <table>
                <tr>
                    <th>日付</th>
                    <th>体重</th>
                    <th>食事摂取カロリー</th>
                    <th>運動時間</th>
                    <th></th>
                </tr>
                @forelse($logs as $log)
                <tr>
                    <td>{{ $log->date }}</td>
                    <td>{{ $log->weight }}<span>kg</span></td>
                    <td>{{ $log->calories }}<span>cal</span></td>
                    <td>{{ $log->exercise_time }}</td>
                    <td>
                        <a href="{{ route('weight.edit', ['id' => $log->id]) }}" class="edit-icon">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td>データがありません</td>
                </tr>
                @endforelse
            </table>
        </div>

        <div class="pager">
            {{ $logs->links() }}
        </div>
    </div>
</div>
@endsection
