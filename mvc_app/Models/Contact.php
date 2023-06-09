<?php
require_once(ROOT_PATH . 'Models/Db.php');

class Contact extends Db
{

    public function __construct($dbh = null)
    {
        parent::__construct($dbh);
        $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * メールアドレスが一意か判定後ユーザー登録処理を行ってユーザーIDを返却する
     *
     * @param string $name 氏名
     * @param string $kana フリガナ
     * @param string $tel 電話番号
     * @param string $email メールアドレス
     * @param string $body お問合せ内容
     */
    public function completeContact(string $name, string $kana, string $tel, string $email, string $body)
    {
        try{
            // データベースのトランザクションを開始。トランザクション中にエラーが発生した場合、変更がロールバックされて元の状態に戻る。
            // $this->dbh->beginTransaction();
            // contactsテーブルに下記情報を挿入するためのクエリを準備
            $query = 'INSERT INTO contacts (name, kana, tel, email, body) VALUES (:name, :kana, :tel, :email, :body)';
            // ユーザーから直接入力された情報をクエリに挿入してしまうとSQLインジェクションを受ける可能性がある為、prepare関数を使用し、後からクエリに値（変数）を当てはめる。
            $stmt = $this->dbh->prepare($query);
            // bindParam関数でプレースホルダに入力した値をバインドする。
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':kana', $kana, PDO::PARAM_STR);
            $stmt->bindParam(':tel', $tel, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':body', $body, PDO::PARAM_STR);
            // クエリを実行
            $stmt->execute();

            // lastInsertId()メソッド:（contactsテーブルの）最後に挿入された行のIDを取得。
            $lastId = $this->dbh->lastInsertId();

            // トランザクションを完了することでデータの書き込みを確定させる
            $this->dbh->commit();

            return $lastId;
        } catch (PDOException $e) {
            // 不具合があった場合トランザクションをロールバックして変更をなかったコトにする。
            $this->dbh->rollBack();
            echo "登録失敗: " . $e->getMessage() . "\n";
            exit();
        }

    }
}
