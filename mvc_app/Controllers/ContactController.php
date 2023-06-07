<?php
require_once ROOT_PATH.'Controllers/Controller.php';

require_once ROOT_PATH.'Models/Contact.php';

class ContactController extends Controller {
    public function index(){
      $this->view('contact/index');
    }

    public function create(){
      $errorMessages = [];

      // バリデーション
      if(empty($_POST['name'])){
          $errorMessages['name'] = '氏名を入力してください。';
      } elseif (mb_strlen($_POST['name']) > 10){ // mb_strlen : 文字列の長さを得る
        $errorMessages['name'] = '氏名は10文字以内で入力願います。';
      }

      if(empty($_POST['kana'])){
          $errorMessages['kana'] = 'フリガナを入力してください。';
      } elseif (mb_strlen($_POST['kana']) > 10){
        $errorMessages['kana'] = 'フリガナは10文字以内で入力願います。';
      }

      if(!ctype_digit($_POST['tel'])){ // 数字かどうかを調べる
          $errorMessages['tel'] = '電話番号を数字で入力してください。(ハイフン無し)';
      }

      if(empty($_POST['email'])){
          $errorMessages['email'] = 'メールアドレスを入力してください。';
      } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) { // 入力されたアドレスが正しいメールアドレス(RFCに準拠)しているか調べる
          $errorMessages['email'] = '有効なメールアドレスを入力してください。';
      }

      if(empty($_POST['body'])){
          $errorMessages['body'] = 'お問合せ内容を入力してください。';
      }

      if(!empty($errorMessages)){
          // バリデーション失敗
          $this->view('contact/index', ['post' => $_POST, 'errorMessages' => $errorMessages]);
      }else{
          //登録処理
          $contact = new Contact;
          $result = $contact->createContact( // Contactモデル内のcreateContactメソッドを呼び出す
              $_POST['name'],
              $_POST['kana'],
              $_POST['tel'],
              $_POST['email'],
              $_POST['body']
          );

          if(is_numeric($result)){ //is_numeric ($resultが数値か文字列型の数字の場合：TRUE、変数が数値か文字列型の数字ではない場合：FALSE)
              session_start();
              $_SESSION['auth'] = $result;

              $this->view('contact/create-confirm');
          }else{
              $errorMessages['email'] = 'メールアドレスが既に使用されています。';
              $this->view('contact/index', ['post' => $_POST, 'errorMessages' => $errorMessages]);
          }
      }
    }
}
