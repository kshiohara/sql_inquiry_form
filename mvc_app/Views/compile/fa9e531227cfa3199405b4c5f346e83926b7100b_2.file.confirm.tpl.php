<?php
/* Smarty version 4.3.1, created on 2023-06-09 13:08:08
  from '/Applications/MAMP/htdocs/sql_inquiry_form/mvc_app/Views/contact/confirm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_6482a5a8094bf8_09222428',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fa9e531227cfa3199405b4c5f346e83926b7100b' => 
    array (
      0 => '/Applications/MAMP/htdocs/sql_inquiry_form/mvc_app/Views/contact/confirm.tpl',
      1 => 1686283680,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6482a5a8094bf8_09222428 (Smarty_Internal_Template $_smarty_tpl) {
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
                <h3 class="mb-8">お問い合わせ内容　確認画面</h3>
                <form action="/contact/complete" method="post" class="bg-white p-3 rounded mb-5">
                    <div class="form-group">
                        <p class="err-msg-name"></p>
                        <p>氏名</p>
                        <h6 id="name"><?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['contact']->value['name'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
</h6>
                    </div>
                    <div class="form-group">
                        <p class="err-msg-kana"></p>
                        <p>フリガナ</p>
                        <h5" id="kana"><?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['contact']->value['kana'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
</h5>
                    </div>
                    <div class="form-group">
                        <p class="err-msg-tel"></p>
                        <p>電話番号（数字のみ、ハイフン無し）</p>
                        <h5" id="tel"><?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['contact']->value['tel'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
</h5>
                    </div>
                    <div class="form-group">
                        <p class="err-msg-mail"></p>
                        <p>メールアドレス</p>
                        <h5" id="email"><?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['contact']->value['email'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
</h5>
                    </div>
                    <div class="form-group">
                        <p class="err-msg-body"></p>
                        <p>お問い合せ内容</p>
                        <h5" id="body"><?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['contact']->value['body'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
</h5>
                    </div>
                    <input type='submit' id="cancel" class="btn bg-secondary my-2 text-light" value="キャンセル">
                    <input type='submit' name="submit" id="submit" class="btn bg-warning my-2" value="送信">
                  </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php }
}
