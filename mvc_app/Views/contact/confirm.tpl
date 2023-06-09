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
                <h3 class="mb-8">お問い合わせ内容　確認画面</h3>
                <form action="/contact/complete" method="post" class="bg-white p-3 rounded mb-5">
                    <div class="form-group">
                        <p class="err-msg-name"></p>
                        <p>氏名</p>
                        <h6 id="name">{$contact.name|default:''}</h6>
                    </div>
                    <div class="form-group">
                        <p class="err-msg-kana"></p>
                        <p>フリガナ</p>
                        <h5" id="kana">{$contact.kana|default:''}</h5>
                    </div>
                    <div class="form-group">
                        <p class="err-msg-tel"></p>
                        <p>電話番号（数字のみ、ハイフン無し）</p>
                        <h5" id="tel">{$contact.tel|default:''}</h5>
                    </div>
                    <div class="form-group">
                        <p class="err-msg-mail"></p>
                        <p>メールアドレス</p>
                        <h5" id="email">{$contact.email|default:''}</h5>
                    </div>
                    <div class="form-group">
                        <p class="err-msg-body"></p>
                        <p>お問い合せ内容</p>
                        <h5" id="body">{$contact.body|default:''}</h5>
                    </div>
                    <input type='submit' id="cancel" class="btn bg-secondary my-2 text-light" value="キャンセル">
                    <input type='submit' name="submit" id="submit" class="btn bg-warning my-2" value="送信">
                  </form>
            </div>
        </div>
    </div>
</body>
</html>
