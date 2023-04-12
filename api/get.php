<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once'../Controllers/GetRandomQuizController.php';
$randomQuiz = GetRandomQuizController::getRandom();
echo json_encode($randomQuiz);

