<?php session_start();
require_once "../../autoload.php";
require_once "../../Router.php";
require_once "../layouts/navbar.php";
if(!isset($_SESSION['userId'])) Router::login();
?>
<head>
    <link href="styles.css" rel="stylesheet">
    <title>Home page</title>
</head>
<body>

<div class="quizes">
    <button type="button" class="btn btn-primary btn-sm" onClick="getRandom()">Get Random API</button>
<p>Email of user: <?php echo $_SESSION['userName'] ?></p>
<div id="sort-button">
    <button type="button" class="btn btn-info btn-sm" onClick="sortDate()">Sort per date</button>
    <button type="button" class="btn btn-info btn-sm" onClick="sortHeaders()">Sort per header</button>
    <button type="button" class="btn btn-info btn-sm" onClick="sortStatus()">Sort per status</button>
</div>
<?php
GetQuizController::getAll(isset($_GET['sort'])?$_GET['sort']:null)
?>
</div>
</body>
<script>
    function getRandom(){
        window.location.href="/api/get.php";
    }
    function sortHeaders(){
        window.location.href="home_view.php?sort=header";
    }
    function sortDate(){
        window.location.href="home_view.php?sort=created_at";
    }
    function sortStatus(){
        window.location.href="home_view.php?sort=status";
    }
</script>