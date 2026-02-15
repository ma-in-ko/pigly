<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiGLy</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
</head>
<body>

    <div class="page">
        <div class="card">
            <h2 class="page__title">
            Weight Logを追加
            </h2>
            <form class="weight__form" action="{{ route('weight.store') }}"  method="post">
                @csrf

                <div class="form__group">
                    <div class="form__label">
                        <label for="date">日付</label>
                        <span>必須</span>
                    </div>
                    <input type="date" name="date" value="{{ old('date', date('Y-m-d')) }}">
                    @error('date')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form__group">
                    <div class="form__label">
                        <label for="weight">体重</label>
                        <span>必須</span>
                    </div>
                    <div class="input__unit">
                        <input type="text" name="weight" value="{{ old('weight') }}" placeholder="50.0">
                        <span>kg</span>
                    </div>
                    @error('weight')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form__group">
                    <div class="form__label">
                        <label for="cal">摂取カロリー</label>
                        <span>必須</span>
                    </div>
                    <div class="input__unit">
                        <input type="text" name="calories" value="{{ old('calories') }}" min="0" placeholder="1200">
                        <span>cal</span>
                    </div>
                    @error('calories')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form__group">
                    <div class="form__label">
                        <label for="time">運動時間</label>
                        <span>必須</span>
                    </div>
                    <input type="time" name="exercise_time" step="60" value="{{ old('exercise_time') }}" placeholder="00:00">
                    @error('exercise_time')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form__group">
                    <div class="form__label">
                        <label for="detail">運動内容</label>
                    </div>
                    <textarea name="detail" id="detail" placeholder="運動内容"></textarea>
                </div>
                </div>
                <div class="form__actions">
                    <div class="btn btn--gray">
                        <a href="/weight_logs"> 戻る</a>
                    </div>
                    <button class="btn btn--primary">登録</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>