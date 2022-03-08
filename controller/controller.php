<?php
include "../model/model.php";
$theDBA = new DataBaseAdapter();
session_start();

class passwordMaker {
    private $pw;
    public function __construct($password){
        $this->pw = $password;
        $this->hashPassword($this->createCost());
        return $this->pw;
    }

    private function hashPassword($cost){
        $options = [
            'cost' => $cost,
        ];
        $this->pw = password_hash($this->pw, PASSWORD_BCRYPT, $options);
    }

    private function createCost() {
        $timeTarget = 0.05; // 50 milliseconds 
    
        $cost = 8;
        do {
            $cost++;
            $start = microtime(true);
            password_hash($this->pw, PASSWORD_BCRYPT, ["cost" => $cost]);
            $end = microtime(true);
        } while (($end - $start) < $timeTarget);
    
        "Appropriate Cost Found: " . $cost;
        return $cost;
    }

    public function __toString() {
        return $this->pw;
    }
}

if (isset($_GET["logout"])){
    $_SESSION["LOGGED"] = false;
    session_destroy();
    header("Location: ../view/index.php");
}

if (isset($_GET["register"]) && $_GET["register"] == true) {
    if ($_POST["password2"] == $_POST["password"]) {
        if ($theDBA->createUser($_POST["username"], new passwordMaker($_POST["password"]), $_POST["email"])) {
            $_SESSION['LOGGED'] = FALSE;
            header("Location: ../view/login.php");
        } else {
            $_SESSION['registerError']='emial is already in use';
            header("Location: ../view/newUser.php");
        }
    } else {
        $_SESSION['registerError']= 'passwords are not the same';
        header("Location: ../view/newUser.php");
    }
}


if (isset($_POST["login"])) {
    echo 'login controller';
    if ($theDBA->login($_POST["email"] , $_POST["password"])){
        $_SESSION['LOGGED'] = TRUE;
        header("Location: ../view/index.php");
    } else {
        $_SESSION['loginError'] = 'incorrect email or password';
        header("Location: ../view/login.php");
    }
}


?>

