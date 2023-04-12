<?php
require_once "../ConnectionToDB.php";
require_once "../Router.php";
class GetRandomQuiz
{
    private static function count(){
        $pdo=ConnectionToDB::connect();
        $stmt= $pdo->prepare('SELECT id FROM quiz WHERE status=:status');
        $stmt->execute(array(':status'=>'post'));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    static function getRandom()
    {

            $ids = self::count();
            $pdo = ConnectionToDB::connect();
            if(!empty($ids)) {
                if (isset($_SESSION['userId'])) {
                    $stmt = $pdo->prepare('SELECT * FROM quiz WHERE status=:status AND id=:id AND user_id=:user_id');
                    $stmt->execute(array(':status' => 'post', ':id' => $ids[array_rand($ids)]['id'], ':user_id' => $_SESSION['userId']));
                } else {
                    $stmt = $pdo->prepare('SELECT * FROM quiz WHERE status=:status AND id=:id');
                    $stmt->execute(array(':status' => 'post', ':id' => $ids[array_rand($ids)]['id']));
                }

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            return false;
    }
}