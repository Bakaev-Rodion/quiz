<?php
require_once "../../Models/GetAllQuizes.php";
require_once "../../Router.php";
class GetQuizController
{

    private static function getHtml($id,$header,$options,$status,$date){
        $header = "<thead><tr><th scope='col' class='header'>$header</th></thead>";
        $status = "<tr class='status'><td>Created at: $date</td><th>Status: $status</th></tr>";
        $options=json_decode($options);
        $optionsList="";
        foreach($options as $option){
            $optionsList.="<tr class='option'><td>$option[0]</td><td>$option[1]</td></tr>";
        }
        $buttons = "<tr>
                        <td class='buttons'>
                        <a href='/Views/quiz_view/edit_view.php?id=$id' class='btn btn-primary' role='button'>Edit</a> 
                        <a href='./home_action.php?delete=$id' class='btn btn-primary' role='button'>Delete</a>
                        </td>
                        <td>
                        </td>
                        </tr>";
        $quiz="<hr><table class='table table-borderless'>$header $optionsList $status $buttons</table>";

        return $quiz;
    }
    public static function getAll($sort){
        session_start();
        $quizes=GetAllQuizes::selectAllUserQuizes($_SESSION['userId'],$sort);
        foreach($quizes as $quiz){
            echo self::getHtml($quiz['id'],$quiz['header'],$quiz['options'],$quiz['status'],$quiz['created_at']);
        }
    }
}