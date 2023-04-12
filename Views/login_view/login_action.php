<?php
require_once "../../autoload.php";
LoginController::loginCheck(htmlentities($_POST['userEmail']),htmlentities($_POST['userPassword']));
if(isset($_GET['logout'])) LogoutController::logout();
