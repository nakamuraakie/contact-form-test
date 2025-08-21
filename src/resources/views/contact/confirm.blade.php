<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>確認画面</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contact/confirm.css') }}">
</head>
<body>

<h2>確認画面</h2>
<form action="/contact/store" method="POST">
    @csrf
    <p>お名前：{{ $validated['last_name'] }} {{ $validated['first_name'] }}</p>
    <p>性別：
        @if($validated['gender'] === 'male') 男性
        @elseif($validated['gender'] === 'female') 女性
        @else その他
        @endif
    </p>
    <p>メール：{{ $validated['email'] }}</p>
    <!-- 他の項目も同様に表示 -->

    <!-- hiddenで値を保持して送信 -->
    @foreach ($validated as $key => $value)
        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
    @endforeach

    <button type="submit">送信</button>
    <button type="button" onclick="history.back()">戻る</button>
</form>

</body>
</html>
