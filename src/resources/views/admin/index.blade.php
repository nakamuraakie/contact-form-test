<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>管理画面</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin/index.css') }}" />
</head>
<body>
    <header>
        <h1>FashionablyLate</h1>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-button">logout</button>
        </form>
    </header>

    <main>
        <h2 class="page-title">Admin</h2>

        <div class="table-container">
            <table>
                <tr>
                        <th>名前</th>
                        <th>性別</th>
                        <th>メールアドレス</th>
                        <th>お問い合わせの種類</th>
                </tr>
                <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->category->name ?? '-' }}</td>
                            <td>{{ Str::limit($contact->message, 30) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
