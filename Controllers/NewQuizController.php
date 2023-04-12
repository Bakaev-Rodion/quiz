<?php
require_once "../../Models/AddNewQuiz.php";
require_once "../../Router.php";
class NewQuizController
{
    static public function addQuiz($quiz){
        QuizCheckerController::spaceChecker($quiz);
        QuizCheckerController::pickOptions($quiz);
        if(count($quiz)>=2) {
            $quiz = QuizCheckerController::addVotes($quiz);
            AddNewQuiz::addQuizToDB($_POST['quizHeader'], json_encode($quiz), isset($_POST['status']) ? 'post' : 'draft');
            Router::home();
        }
        else{
            Router::quiz('?fail=true');
        }
    }
}