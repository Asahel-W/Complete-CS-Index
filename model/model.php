<?php

class DataBaseAdapter {
    private $DB;

    public function __construct(){
        $dataBase = 'mysql:dbname=Complete_CS;charset=utf8;host=127.0.0.1';

        $user = 'Asahel';
        $password = '';

        try {
            $this->DB = new PDO ( $dataBase, $user, $password);
            $this->DB->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo ('Error: Did not connect to database');
            exit();
        }
    }

    

    public function createUser($username, $password, $email){
        $stmt = $this->DB->prepare("INSERT INTO user (email, username, password) VALUES (:bind_email, :bind_username, :bind_password)");
        $stmt->bindParam(':bind_email', $email);
        $stmt->bindParam(':bind_username', $username);
        $stmt->bindParam(':bind_password', $password);
        try {
            $stmt->execute();
            return TRUE;
        } catch (PDOException $e) {
            return FALSE;
        }
    }

    public function login($email, $pw){
        $stmt = $this->DB->prepare ( "SELECT * FROM user");
        $stmt->execute ();
        $array = $stmt->fetchAll ( PDO::FETCH_ASSOC );
        for ($row = 0; $row<count($array); $row++){
            if (password_verify($pw, $array[$row]['password']) && $array[$row]['email'] == $email){
                return true;
            }
        }
        return false;
    }
}
?>