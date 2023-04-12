<?php
require_once "../../ConnectionToDB.php";
class SignUpUser
{
    static function addUser2DB($email,$password){
        $pdo=ConnectionToDB::connect();
        $stmt= $pdo->prepare('INSERT INTO users(user_name,password) VALUES (:email, :password)');
        $stmt->execute(array(':email'=>$email,':password'=>$password));
    }
    static function userExist($email){
        $pdo=ConnectionToDB::connect();
        $stmt = $pdo->prepare("SELECT user_name FROM users Where user_name=:email ");
        $stmt->execute(array(':email'=>$email));
        $user =  $stmt->fetch(PDO::FETCH_ASSOC);
        if($user['user_name']==$email) return true;
        return false;
    }

}