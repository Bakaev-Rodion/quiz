<?php
require_once "../../ConnectionToDB.php";
class DeleteQuiz
{
    static function deleteQuiz($id){
        $pdo=ConnectionToDB::connect();
        $stmt= $pdo->prepare('DELETE FROM quiz WHERE id=:id');
        $stmt->execute(array(':id'=>$id));
    }
}