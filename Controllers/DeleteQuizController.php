<?php
require_once "../../Models/DeleteQuiz.php";
require_once "../../Router.php";
class DeleteQuizController
{
    public static function delete($id){
        DeleteQuiz::deleteQuiz($id);
        Router::home();
    }

}