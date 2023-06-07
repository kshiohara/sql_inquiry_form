<?php
class Controller
{
    public function view(string $template, array $params = []): void
    {
        $Smarty = new Smarty();
        $Smarty->setTemplateDir(ROOT_PATH.'Views');
        $Smarty->setCompileDir(ROOT_PATH.'Views/compile');
        $Smarty->escape_html = true;
        $Smarty->assign($params);
        try {
            $Smarty->display($template . '.tpl');
        } catch (SmartyException|Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function certification(){
        $errorMessages = [];
        if(empty($_POST['email'])){
            $errorMessages['email'] = 'メールアドレスを入力してください。';
        }

        if(empty($_POST['password'])){
            $errorMessages['password'] = 'パスワードを入力してください';
        }

        if(!empty($errorMessages)){
            // バリデーション失敗
            $this->view('user/login', ['post' => $_POST, 'errorMessages' => $errorMessages]);
        }else{
            //認証処理
            $user = new User;
            $result = $user->certification(
                $_POST['email'],
                $_POST['password']
            );
            // var_dump($result);

            if(is_array($result)){
                session_start();
                $_SESSION['auth'] = $result['id'];
                header("Location: /");
                exit;
            }else{
                $errorMessages['auth'] = 'メールアドレスまたはパスワードが誤っています。';
                $this->view('user/login', ['post' => $_POST, 'errorMessages' => $errorMessages]);
            }
        }
    }

    public function edit(){
        session_start();
        $userId = $_SESSION['auth'] ?? false;
        if($userId === false){
            header('Location: /');
            exit;
        }

        $user = new User;
        $result = $user->getMyPage($userId);
        $this->view('user/edit', ['data' => $result, 'auth' => $userId]);
    }

    public function update(){
        $errorMessages = [];

        $userId = $this->getAuth();
        if($userId === false){
            // 未ログインの場合はトップページへリダイレクト
            header('Location: /');
            exit;
        }

        if(empty($_POST['name'])){
            $errorMessages['name'] = '氏名を入力してください。';
        }

        if(empty($_POST['kana'])){
            $errorMessages['kana'] = 'ふりがなを入力してください。';
        }

        if(empty($_POST['email'])){
            $errorMessages['email'] = 'メールアドレスを入力してください。';
        }

        if(empty($_POST['password'])) {
            // passwordが空の場合はpasswordを更新しないためバリデーションをチェックしない
        }else{
            if($_POST['password'] !== $_POST['password-confirmation']){
                $errorMessages['password-confirmation'] = '確認用パスワードが正しくありません。';
            }
        }

        if(!empty($errorMessages)){
            // バリデーション失敗
            $this->view('user/edit', ['post' => $_POST, 'errorMessages' => $errorMessages]);
        }else{
            // 更新処理
            $user = new User;
            $result = $user->updateUser(
                $userId,
                $_POST['name'],
                $_POST['kana'],
                $_POST['email'],
                $_POST['password']
            );

            if($result === true){
                header('Location: /user/my-page');
                exit;
            }else{
                $errorMessages['email'] = 'メールアドレスが既に使用されています。';
                $this->view('user/edit', ['post' => $_POST, 'errorMessages' => $errorMessages, 'auth' => $userId]);
            }
        }
    }

    public function delete(){
        session_start();
        $userId = $_SESSION['auth'] ?? false;
        if($userId === false){
            header('Location: /');
            exit;
        }
        $user = new User;
        $user->deleteUserAccount($userId);
        $_SESSION['auth'] = false;
        header('Location: /');
        exit;
    }
}
