<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="styles.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <title>Login</title>
</head>
<body>
<h1>Login</h1>
<hr>
<form class="form-login" action="login_action.php" method="POST">
    <div class="mb-3">
        <label for="inputEmail" class="form-label">Email address</label>
        <input name="userEmail" type="email" class="form-control" id="inputEmail" placeholder="name@example.com" required>
    </div>
    <div class="mb-3">
        <label for="inputPassword5" class="form-label">Password</label>
        <input name="userPassword" type="password" id="inputPassword5" class="form-control" required>
    </div>
    <?php if(isset($_GET['fail'])) echo '<p>Wrong name or password!</p>';?>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<br>
<a href="/Views/signup_view/signup_view.php">Sign Up</a>
</body>
</html>