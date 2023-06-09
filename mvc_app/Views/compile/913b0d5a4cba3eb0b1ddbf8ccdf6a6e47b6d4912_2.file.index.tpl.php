<?php
/* Smarty version 4.3.1, created on 2023-06-09 13:44:50
  from '/Applications/MAMP/htdocs/sql_inquiry_form/mvc_app/Views/contact/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_6482ae42e07201_04849032',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '913b0d5a4cba3eb0b1ddbf8ccdf6a6e47b6d4912' => 
    array (
      0 => '/Applications/MAMP/htdocs/sql_inquiry_form/mvc_app/Views/contact/index.tpl',
      1 => 1686283667,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6482ae42e07201_04849032 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
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
                        <p class="error-text"><?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['auth'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
</p>
                        <div class="form-group">
                            <label for="name">氏名</label>
                            <input type="text" class="form-control" name="name" placeholder="テスト太郎">
                            <p class="error-text"><?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['name'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
</p>
                        </div>
                        <div class="form-group">
                            <label for="furigana">フリガナ</label>
                            <input type="text" class="form-control" name="kana" placeholder="テストタロウ">
                            <p class="error-text"><?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['kana'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
</p>
                        </div>
                        <div class="form-group">
                            <label for="tel">電話番号（数字のみ、ハイフン無し）</label>
                            <input type="tel" class="form-control"  name="tel" placeholder="09012345678">
                            <p class="error-text"><?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['tel'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
</p>
                        </div>
                        <div class="form-group">
                            <label for="email">メールアドレス</label>
                            <input type="email" class="form-control" name="email" placeholder="sample@email.com">
                            <p class="error-text"><?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['email'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
</p>
                        </div>
                        <div class="form-group">
                            <label for="textarea">お問い合せ内容</label>
                            <textarea class="form-control" name="body" placeholder="お問合せ内容を記入して下さい。"></textarea>
                            <p class="error-text"><?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['body'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
</p>
                        </div>
                        <button class="btn bg-warning my-2">送信</button>
                    </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php }
}
