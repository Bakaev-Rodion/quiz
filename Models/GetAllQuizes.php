<?php
require_once "../../ConnectionToDB.php";
class GetAllQuizes
{
    static function selectAllUserQuizes($userId, $sort){
        $pdo=ConnectionToDB::connect();
        session_start();
        if($sort) $sort=' ORDER BY '.$sort;
        $stmt= $pdo->prepare('SELECT * FROM quiz WHERE user_id=:userId'.$sort);
        $stmt->execute(array(':userId'=>$userId));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}