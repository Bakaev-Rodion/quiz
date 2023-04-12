<?php
require_once "../../autoload.php";
if(isset($_POST['quizHeader'])){
    if(htmlentities($_POST['id'])){

        EditQuizController::updateQuiz($_POST);
    }
    else {
        NewQuizController::addQuiz($_POST);
    }
}
