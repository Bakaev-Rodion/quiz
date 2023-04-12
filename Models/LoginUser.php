<?php
require_once "../../ConnectionToDB.php";
class LoginUser
{
    static function selectUserFromDB($userName,$password){
        $pdo=ConnectionToDB::connect();
        $stmt= $pdo->prepare('SELECT * FROM users WHERE user_name=:userName AND password=:password');
        $stmt->execute(array(':userName'=>$userName,':password'=>$password));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}