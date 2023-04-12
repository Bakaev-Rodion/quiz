<?php require_once "../../autoload.php";
require_once "../../Router.php";
require_once "../layouts/navbar.php";
session_start();
if(!isset($_SESSION['userId'])) Router::login();

?>
<head>
    <link href="styles.css" rel="stylesheet">
    <title>Signup</title>
</head>
<body>
<form class="form-quiz" action="edit_action.php" method="POST">
    <?php echo EditQuizController::getQuiz(isset($_GET['id'])?$_GET['id']:null); ?>
    <button type="button" onclick="return addField()" class="btn btn-secondary">Add field</button><hr>
    <?php if(isset($_GET['fail'])) echo "<b>Warning!</b> Minimum 2 options need to create quiz!" ?>
    <label class="form-label" for="status">Post?</label>
    <input type="checkbox" name="status"> <br>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
<script>
    var countOfFields = document.getElementsByClassName('d-inline-flex p-2 bd-highlight option').length;
    var curFieldOptionId = countOfFields;
    function deleteField(a) {
        var contDiv = a.parentNode;
        contDiv.parentNode.removeChild(contDiv);
        countOfFields--;
        return false;
    }
    function addField() {
        countOfFields++;
        curFieldOptionId++;
        var div = document.createElement("div");
        div.classList.add('d-inline-flex', 'p-2', 'bd-highlight');
        div.innerHTML = "<input name=\"option_" + curFieldOptionId + "\" type=\"text\" id=\"inputOption\" class=\"form-control\" /> " +
            "<input name='option_"+ curFieldOptionId +"_vote' type='number' id='inputOption' class='form-control count' value=''>"+
            "<button type=\"button\" class=\"btn btn-danger\" id=\"delete-button\" onclick=\"return deleteField(this)\">Delete</button>";
        console.log( div);
        document.getElementById("option-holder").appendChild(div);
        return false;
    }
</script>