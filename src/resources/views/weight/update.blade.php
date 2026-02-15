<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiGLy</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
</head>
<body class="update-page">

    <div class="page">
        <div class="card">
            <h2 class="page__title">
            Weight Log
            </h2>
            <form id="update-form" class="weight__form" action="{{ route('weight.update.post', ['id' => $log->id]) }}"  method="post">
            @csrf
            @method('PUT')
            
                <div class="form__group">
                    <div class="form__label">
                        <label for="date">日付</label>
                    </div>
                    <input type="date" name="date" value="{{ old('date', $log->date) }}">
                    @error('date')
                    <div class="error">{{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form__group">
                    <div class="form__label">
                        <label for="weight">体重</label>
                    </div>
                    <div class="input__unit">
                        <input type="text" name="weight" value=" {{ old('weight', $log->weight) }}">
                        <span>kg</span>
                    </div>
                        @error('weight')
                        <div class="error">{{ $message }}
                        </div>
                        @enderror
                </div>
                <div class="form__group">
                    <div class="form__label">
                        <label for="cal">摂取カロリー</label>
                    </div>
                    <div class="input__unit">
                        <input type="text" name="calories" value="{{ old('calories', $log->calories ?? 0) }}" min="0">
                        <span>cal</span>
                    </div>
                     @error('calories')
                        <div class="error">{{ $message }}
                        </div>
                        @enderror
                </div>
                <div class="form__group">
                    <div class="form__label">
                        <label for="time">運動時間</label>
                    </div>
                    <input type="time" name="exercise_time" step="60" value="{{ old('exercise_time', substr($log->exercise_time, 0, 5)) }}">
                </div>
                <div class="form__group">
                    <div class="form__label">
                        <label for="detail">運動内容</label>
                    </div>
                    <textarea name="detail" id="detail" placeholder="運動内容を追加"></textarea>
                </div>
            </form>
            <div class="form__actions">
                <div class="form__action-center">
                    <a href="/weight_logs" class="btn btn--gray"> 戻る</a>
                    <button type="submit" form="update-form" class="btn btn--primary">更新</button>
                </div>
                <form action="{{ route('weight.destroy', ['id' => $log->id]) }}" method="post" onsubmit="return confirm('本当に削除しますか？')" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn--icon btn--danger">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>