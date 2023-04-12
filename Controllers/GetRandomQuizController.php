<?php
require_once "../Models/GetRandomQuiz.php";
require_once "../Router.php";
class GetRandomQuizController
{
    static function getRandom(){
        $randomQuiz=GetRandomQuiz::getRandom();
        if($randomQuiz) {
            $randomQuiz[0]['options'] = json_decode($randomQuiz[0]['options']);
            return $randomQuiz;
        } else return null;
    }
}