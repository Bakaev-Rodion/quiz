<?php
require_once "../../Router.php";
class QuizCheckerController
{
     static function addVotes($quiz){
         $optionCounter=1;
        $newQuiz=array();
        foreach($quiz as $option){
            if(substr(array_search($option,$quiz),-5,5)!='_vote') {
                if(!empty($quiz[array_search($option, $quiz) . '_vote'])) {
                    $newQuiz['option_' . $optionCounter] = [$option, $quiz[array_search($option, $quiz) . '_vote']];
                    $optionCounter++;
                }
            }
        }
         return $newQuiz;
    }
    static function pickOptions(&$quiz){
        foreach($quiz as $option){
            if($option == null OR $option === " " OR array_search($option,$quiz) == 'quizHeader' OR array_search($option,$quiz) == 'status' OR array_search($option,$quiz) == 'id'){
                unset($quiz[array_search($option,$quiz)]);
            }

        }
    }
    static function spaceChecker(&$quiz){
        foreach($quiz as &$option){
            $option=preg_replace('!\s+!', ' ', $option);
            if(substr($option,-1)===" ")
                $option= substr_replace($option,"",-1);
        }
    }
}