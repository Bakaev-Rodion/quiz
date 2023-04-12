<?php
require_once "../../autoload.php";
if(isset($_GET['delete'])){
    DeleteQuizController::delete(htmlentities($_GET['delete']));
}
