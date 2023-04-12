<?php
require_once "../../Models/LoginUser.php";
require_once "../../Router.php";
class LoginController
{
    static public function loginCheck($name,$password){
        $userInfo=LoginUser::selectUserFromDB($name,md5($password));
        if(!empty($userInfo)){
            session_start();
            $_SESSION['userName']=$userInfo['user_name'];
            $_SESSION['userId']=$userInfo['id'];
            Router::home();
        }
        else{
            Router::login('?fail=true');
        }
    }
}