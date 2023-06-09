<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Casteria</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <div class="p-4 container-field form-orange">
        <div class="row justify-content-center">
            <div class="col-lg-6 mx-auto col-md-8">
                <h2 class="mb-4">お問い合せ</h2>
                    <form action="/contact/confirm" method="post" class="bg-white p-3 rounded mb-5">
                        <p class="error-text">{$errorMessages['auth']|default:''}</p>
                        <div class="form-group">
                            <label for="name">氏名</label>
                            <input type="text" class="form-control" name="name" placeholder="テスト太郎">
                            <p class="error-text">{$errorMessages['name']|default:''}</p>
                        </div>
                        <div class="form-group">
                            <label for="furigana">フリガナ</label>
                            <input type="text" class="form-control" name="kana" placeholder="テストタロウ">
                            <p class="error-text">{$errorMessages['kana']|default:''}</p>
                        </div>
                        <div class="form-group">
                            <label for="tel">電話番号（数字のみ、ハイフン無し）</label>
                            <input type="tel" class="form-control"  name="tel" placeholder="09012345678">
                            <p class="error-text">{$errorMessages['tel']|default:''}</p>
                        </div>
                        <div class="form-group">
                            <label for="email">メールアドレス</label>
                            <input type="email" class="form-control" name="email" placeholder="sample@email.com">
                            <p class="error-text">{$errorMessages['email']|default:''}</p>
                        </div>
                        <div class="form-group">
                            <label for="textarea">お問い合せ内容</label>
                            <textarea class="form-control" name="body" placeholder="お問合せ内容を記入して下さい。"></textarea>
                            <p class="error-text">{$errorMessages['body']|default:''}</p>
                        </div>
                        <button class="btn bg-warning my-2">送信</button>
                    </form>
            </div>
        </div>
    </div>
</body>
</html>
