<?php
require_once "../../Models/EditQuiz.php";
require_once "../../Router.php";
class EditQuizController
{
    private static function getHTML($quiz=null,$id=null){
        if(isset($quiz)) {
            $options = json_decode($quiz[0]['options'],true);
            $header=$quiz[0]['header'];
            $optionNumber=0;
            $html = "<input name='id' type='hidden' value='$id'>
                    <div class='mb-3'>
                           <label for='inputHeader' class='form-label'>Header of quiz</label>
                            <input name='quizHeader' type='text' class='form-control' id='inputHeader' value='$header' required>
                    </div>
                    <label class='form-label'>Input fields:</label>
                    <div  id='option-holder' class='row options-holder'>";
            foreach($options as $option) {
                $optionNumber++;
                $html .=
                    "
                        <div class='d-inline-flex p-2 bd-highlight option'>
                            <input name='option_$optionNumber' type='text' id='inputOption' class='form-control' value='".$options[array_search($option,$options)][0]."'>
                            <input name='option_".$optionNumber."_vote' type='number' min=0 id='inputOption' class='form-control count' value='".$options[array_search($option,$options)][1]."'>
                            <button type='button' class='btn btn-danger'id='delete-button' onclick='return deleteField(this)'>Delete</button>
                        </div>
                    ";
            }
            return $html.='</div>';
        }else{
            $html= "<input name='id' type='hidden'>
                    <div class='mb-3'>
                           <label for='inputHeader' class='form-label'>Header of quiz</label>
                            <input name='quizHeader' type='text' class='form-control' id='inputHeader' required>
                    </div>
                    <label class='form-label'>Input fields and votes:</label>
                    <div id='option-holder' class='row option-holder'>
                        <div class='d-inline-flex p-2 bd-highlight option'>
                            <input name='option_1' type='text' id='inputOption' class='form-control' value=''>
                            <input name='option_1_vote' type='number' min=0 id='inputOption' class='form-control count' value=''>
                            <button type='button' class='btn btn-danger'id='delete-button' onclick='return deleteField(this)'>Delete</button>
                        </div>
                    </div>";

            return $html;
        }
    }

    static function updateQuiz($quiz){
        QuizCheckerController::spaceChecker($quiz);
        QuizCheckerController::pickOptions($quiz);
        if(count($quiz)>=2) {
            $quiz=QuizCheckerController::addVotes($quiz);
            EditQuiz::updateQuiz($_POST['id'],$_POST['quizHeader'], json_encode($quiz), isset($_POST['status']) ? 'post' : 'draft');
            Router::home();
        }
        else{
            Router::quiz('?id='.$_POST['id'].'&fail=true');
        }
    }
    static function getQuiz($id){
        if(isset($id)) {
            $quiz = EditQuiz::getQuiz($id);
            return self::getHTML($quiz,$id);
        }else{
           return self::getHTML();
        }
    }
}