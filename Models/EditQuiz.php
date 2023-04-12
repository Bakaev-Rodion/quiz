<?php
require_once "../../ConnectionToDB.php";
class EditQuiz
{
        static function getQuiz($id){
            $pdo=ConnectionToDB::connect();
            $stmt= $pdo->prepare('SELECT * FROM quiz WHERE id=:id');
            $stmt->execute(array(':id'=>$id));
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    static function updateQuiz($id,$header,$options,$status){
        $pdo=ConnectionToDB::connect();
        $stmt= $pdo->prepare('UPDATE quiz SET header=:header, options=:options, status=:status WHERE id=:id');
        $stmt->execute(array(':id'=>$id,':header'=>$header,':options'=>$options,':status'=>$status));
    }
}