<?php

class Router
{
    static function quiz($fail=null){
        header('Location:\Views\quiz_view\\edit_view.php'.$fail);
    }
    static function home(){
        header('Location: \Views\home_view\home_view.php');
    }
    static function login($fail=null){
        header('Location: \Views\login_view\login_view.php'.$fail);
    }
    static function signup($fail=null){
        header('Location: \Views\signup_view\signup_view.php'.$fail);
    }
}