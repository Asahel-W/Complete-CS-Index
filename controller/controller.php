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


if (isset($_POST["password2"])) {
    if ($_POST["password2"] == $_POST["password"]) {
        if ($theDBA->createUser($_POST["username"], new passwordMaker($_POST["password"]), $_POST["email"])) {
            echo 'new user created';
            $_SESSION['LOGGED'] = TRUE;
            header("Location: ../view/index.html");
        } else {
            echo 'emial is already in use';
        }
    } else {
        echo 'passwords are not the same';
    }
}


?>

