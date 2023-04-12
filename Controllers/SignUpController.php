<?php
require_once "../../Models/SignUpUser.php";
require_once "../../Models/LoginUser.php";
require_once "../../Router.php";
class SignUpController
{
    static public function signUpUser($email,$password,$confirmedPassword){
        if($password===$confirmedPassword) {
            if (!SignUpUser::userExist($email)) {
                SignUpUser::addUser2DB($email, md5($password));
                $userInfo = LoginUser::selectUserFromDB($email, md5($password));
                if(!empty($userInfo)) {
                    session_start();
                    $_SESSION['userName'] = $userInfo['user_name'];
                    $_SESSION['userId'] = $userInfo['id'];
                    Router::home();
                }
            } else {
                Router::signup('?user_exist=true');
            }
        } else{
            Router::signup('?password=true');
        }
    }
}