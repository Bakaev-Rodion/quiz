<?php
require_once "../../ConnectionToDB.php";
class AddNewQuiz
{
    static function addQuizToDB($header,$options,$status){
        $pdo=ConnectionToDB::connect();
        session_start();
        $stmt= $pdo->prepare('INSERT INTO quiz(header,status,options,user_id,created_at) VALUES (:header, :status, :options,:user_id,:date)');
        $stmt->execute(array(':header'=>$header,':status'=>$status,':options'=>$options,':user_id'=>$_SESSION['userId'],':date'=>date('Y-m-d H:i:s')));
    }
}