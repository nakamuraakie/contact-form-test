<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせ</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contact/form.css') }}">
</head>
<body>


<header class="header">
        <div class="header__inner">
        <h1>FashionablyLate</h1>
        </div>
    </header>

<form action="/contact/confirm" method="post">
    @csrf
    <main>
    <h2>Contact</h2>
    <!-- お名前 -->
    <div class="form-group row">
        <div class="form-label">
            <label>お名前 <span class="required">※</span></label>
        </div>
        <div class="form-input name-friend">
            <input type="text" name="last_name" placeholder="例:山田" value="{{ old('last_name') }}">
            <input type="text" name="first_name" placeholder="例:太郎" value="{{ old('first_name') }}">
            @error('last_name')<span class="error">{{ $message }}</span>@enderror
            @error('first_name')<span class="error">{{ $message }}</span>@enderror
        </div>
    </div>

    <!-- 性別 -->
    <div class="form-group row">
        <div class="form-label">
            <label>性別 <span class="required">※</span></label>
        </div>
        <div class="form-input">
            <label><input type="radio" name="gender" value="male" {{ old('gender') == 'male' ? 'checked' : '' }}> 男性</label>
            <label><input type="radio" name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}> 女性</label>
            <label><input type="radio" name="gender" value="other" {{ old('gender') == 'other' ? 'checked' : '' }}> その他</label>
            @error('gender')<span class="error">{{ $message }}</span>@enderror
        </div>
    </div>

    <!-- メールアドレス -->
    <div class="form-group row">
        <div class="form-label">
            <label for="email">メールアドレス <span class="required">※</span></label>
        </div>
        <div class="form-input">
            <input type="email" name="email" placeholder="test@example" value="{{ old('email') }}">
            @error('email')<span class="error">{{ $message }}</span>@enderror
        </div>
    </div>

    <!-- 電話番号 -->
    <div class="form-group row">
        <div class="form-label">
            <label for="tel">電話番号 <span class="required">※</span></label>
        </div>
        <div class="form-input">
            <input type="text" name="tel" value="{{ old('tel') }}">
            @error('tel')<span class="error">{{ $message }}</span>@enderror
        </div>
    </div>

    <!-- 住所 -->
    <div class="form-group row">
        <div class="form-label">
            <label for="address">住所 <span class="required">※</span></label>
        </div>
        <div class="form-input">
            <input type="text" id="address" name="address" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
            @error('address')<span class="error">{{ $message }}</span>@enderror
        </div>
    </div>

    <!-- 建物名 -->
    <div class="form-group row">
        <div class="form-label">
            <label for="building">建物名</label>
        </div>
        <div class="form-input">
            <input type="text" name="building" value="{{ old('building') }}">
            @error('building')<span class="error">{{ $message }}</span>@enderror
        </div>
    </div>

    <!-- お問い合わせの種類 -->
    <div class="form-group row">
        <div class="form-label">
            <label for="type">お問い合わせの種類 <span class="required">※</span></label>
        </div>
        <div class="form-input">
            <select id="type" name="type">
                <option value="">選択してください</option>
                <option value="opinion" {{ old('type') == 'opinion' ? 'selected' : '' }}>ご意見</option>
                <option value="request" {{ old('type') == 'request' ? 'selected' : '' }}>ご要望</option>
                <option value="complaint" {{ old('type') == 'complaint' ? 'selected' : '' }}>クレーム</option>
                <option value="document" {{ old('type') == 'document' ? 'selected' : '' }}>資料請求</option>
                <option value="other" {{ old('type') == 'other' ? 'selected' : '' }}>その他</option>
            </select>
            @error('type')<span class="error">{{ $message }}</span>@enderror
        </div>
    </div>

    <!-- お問い合わせ内容 -->
    <div class="form-group row">
        <div class="form-label">
            <label for="message">お問い合わせ内容 <span class="required">※</span></label>
        </div>
        <div class="form-input">
            <textarea name="message" rows="5">{{ old('message') }}</textarea>
            @error('message')<span class="error">{{ $message }}</span>@enderror
        </div>
    </div>

    <!-- 送信ボタン -->
    <div class="form-group row">
        <div class="form-label"></div>
        <div class="form-input">
            <button type="submit">確認画面</button>
        </div>
    </div>
</main>
</form>
</body>
</html>