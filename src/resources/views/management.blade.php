<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advance-test</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/management.css') }}">
</head>

<body>
    <main>
        <div class="contact-form__content">
            <div class="contact-form__title">
                <h2>管理システム</h2>
            </div>

            <div class="management-table">
                <form class="form" id="search-form" action="{{ route('contacts.search') }}" method="post">
                    @csrf
                    <table class="management-table__inner">
                        <tr class="management-table__row">
                            <th class="management-table__header">お名前</th>
                            <td class="management-table__text">
                                <div class="form__input--text">
                                    <input type=" text" name="fullname">
                                </div>
                            </td>

                            <th class="management-table__header">性別</th>
                            <td class="management-table__text">
                                <div class="form__input--radio">
                                    <input type="radio" name="gender" value="0" checked><label class="radio-label">全て</label>
                                    <input type="radio" name="gender" value="1"><label class="radio-label">男性</label>
                                    <input type="radio" name="gender" value="2"><label class="radio-label">女性</label>
                                </div>
                            </td>
                        </tr>

                        <tr class="management-table__row">
                            <th class="management-table__header">登録日</th>
                            <td class="management-table__text" colspan="3">
                                <div class="form__input--text">
                                    <input type="date" name="from">
                                    　〜　
                                    <input type="date" name="until">
                                </div>
                            </td>
                        </tr>

                        <tr class="management-table__row">
                            <th class="management-table__header">メールアドレス</th>
                            <td class="management-table__text">
                                <div class="form__input--text">
                                    <input type="email" name="email">
                                </div>
                            </td>
                            <td></td>
                        </tr>

                        <tr class="management-table__row">
                            <td class="management-table__text2" colspan="4">
                                <div class="form__button">
                                    <button class="form__button-submit" type="submit">検索</button>
                                </div>
                </form>

                <form class="form" action="{{ route('contacts.back') }}" method="post">
                    @csrf
                    <div class="form__back">
                        <button class="form__button-back" type="button" id="reset-button">リセット</button>
                    </div>
                </form>
                </td>
                </tr>
                </table>

                <table>
                    <tr>
                        <td colspan="2">件数のところ</td>
                        <td></td>
                        <td></td>
                        <td colspan="2">ページのところ</td>
                    </tr>
                    <tr>
                        <th>ID</th>
                        <th>お名前</th>
                        <th>性別</th>
                        <th>メールアドレス</th>
                        <th>ご意見</th>
                        <th></th>
                    </tr>

                    @if(isset($results))
                    @foreach ($results as $result)
                    <tr>
                        <td>{{ $result->id }}</td>
                        <td>{{ $result->fullname }}</td>
                        <td>{{ $result->gender }}</td>
                        <td>{{ $result->email }}</td>
                        <td>{{ $result->opinion }}</td>
                        <td><button>削除</button></td>
                    </tr>
                    @endforeach
                    @endif
                </table>
            </div>
        </div>
    </main>

    <script>
        // リセットボタンをクリックしたときの処理
        document.getElementById('reset-button').addEventListener('click', function() {
            document.getElementById('search-form').reset(); // フォームをリセット
        });
    </script>

</body>

</html>