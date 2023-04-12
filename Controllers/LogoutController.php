<?php

class LogoutController
{
    public static function logout(){
            session_start();
            session_destroy();
            Router::login();
        }
}