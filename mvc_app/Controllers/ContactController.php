<?php
require_once ROOT_PATH.'Controllers/Controller.php';

require_once ROOT_PATH.'Models/Contact.php';

class ContactController extends Controller {
    public function index(){
        $this->view('contact/index');
    }

    public function confirm(){
        session_start();
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
            // 一時保存処理
            $_SESSION['contact'] = [
                    'name' => $_POST['name'],
                    'kana' => $_POST['kana'],
                    'tel' => $_POST['tel'],
                    'email' => $_POST['email'],
                    'body' => $_POST['body']
            ];
            var_dump($_SESSION['contact']);
            // 第1引数にビューファイルのパスを指定、第2引数にビューで使用する変数を指定
            $this->view('contact/confirm', ['contact' => $_SESSION['contact']]);
        }
    }

    public function complete(){
        session_start();
        $contactData = $_SESSION['contact'];

        $contact = new Contact;

        $contactId = $contact->completeContact (
            $contactData['name'],
            $contactData['kana'],
            $contactData['tel'],
            $contactData['email'],
            $contactData['body'],
        );

        if (isset($contactId)) {
            // データベースへの保存が完了したので、セッションからコンタクト情報を削除
            unset($_SESSION['contact']);
            $this->view('contact/complete');
            // header('Location: /contact/complete');
        } else {
            // 保存が失敗した場合
            $errorMessages = '入力内容に誤りがあります。';
            $this->view('contact/index', ['post' => $_POST, 'errorMessages' => $errorMessages]);
        }
    }
}
