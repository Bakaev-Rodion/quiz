<?php
require_once "../../autoload.php";
require_once "../../Router.php";
    if(isset($_POST['userEmail']) && isset($_POST['userPassword']) && isset($_POST['userPasswordConfirmed']))SignUpController::signUpUser(htmlentities($_POST['userEmail']),htmlentities($_POST['userPassword']),htmlentities($_POST['userPasswordConfirmed']));

