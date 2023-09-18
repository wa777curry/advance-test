<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advance-test</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

<body>
    <main>
        <div class="contact-form__content">
            <div class="contact-form__title">
                <h2>お問い合わせ</h2>
            </div>

            <form class="form" action="{{ route('contacts.confirm') }}" method="post">
                @csrf
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">お名前</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text-name">
                            <input type="text" name="firstname" value="{{ old('firstname', $contact['firstname'] ?? '') }}">
                            <input type="text" name="lastname" value="{{ old('lastname', $contact['lastname'] ?? '') }}">
                        </div>
                        <div class="form__group-example">
                            <span class="form__label--example-item">例）山田</span>
                            <span class="form__label--example-item2">例）太郎</span>
                        </div>
                        <div class="form__error">
                            @error('firstname')
                            {{ $message }}
                            @enderror
                            @error('lastname')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">性別</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--radio">
                            <input type="radio" name="gender" value="1" checked><label class="radio-label">男性</label>
                            <input type="radio" name="gender" value="2"><label class="radio-label">女性</label>
                        </div>
                    </div>
                </div>

                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">メールアドレス</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="email" name="email" value="{{ old('email', $contact['email'] ?? '') }}">
                        </div>
                        <div class="form__group-example">
                            <span class="form__label--example-item">例）test@example.com</span>
                        </div>
                        <div class="form__error">
                            @error('email')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">郵便番号</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text-postcode">
                            <span class="form__label--item">〒</span>
                            <input type="text" name="postcode" id="postcode-input" value="{{ old('postcode', $contact['postcode'] ?? '') }}">
                            <div id="postcode-error" class="error-message"></div>
                        </div>

                        <script>
                            var postcodeInput = document.getElementById('postcode-input');

                            postcodeInput.addEventListener('input', function() {
                                var value = this.value;
                                var halfWidthValue = convertToHalfWidth(value);
                                this.value = halfWidthValue;
                            });

                            function convertToHalfWidth(value) {
                                var halfWidthValue = '';
                                for (var i = 0; i < value.length; i++) {
                                    var charCode = value.charCodeAt(i);
                                    if (charCode >= 65281 && charCode <= 65374) {
                                        halfWidthValue += String.fromCharCode(charCode - 65248);
                                    } else {
                                        halfWidthValue += value.charAt(i);
                                    }
                                }
                                return halfWidthValue;
                            }
                        </script>

                        <div class="form__group-example">
                            <span class="form__label--example-item">例）123−4567</span>
                        </div>
                        <div class="form__error">
                            @error('postcode')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">住所</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="text" name="address" value="{{ old('address', $contact['address'] ?? '') }}">
                        </div>
                        <div class="form__group-example">
                            <span class="form__label--example-item">例）東京都渋谷区千駄ヶ谷1−2−3</span>
                        </div>
                        <div class="form__error">
                            @error('address')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">建物名</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="text" name="building_name" value="{{ old('building_name', $contact['building_name'] ?? '') }}">
                        </div>
                        <div class="form__group-example">
                            <span class="form__label--example-item">例）千駄ヶ谷マンション101</span>
                        </div>
                    </div>
                </div>

                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">ご意見</span>
                        <span class="form__label--required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--textarea">
                            <textarea name="opinion">{{ old('opinion', $contact['opinion'] ?? '') }}</textarea>
                        </div>
                        <div class="form__error">
                            @error('opinion')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form__button">
                    <button class="form__button-submit" type="submit">確認</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>