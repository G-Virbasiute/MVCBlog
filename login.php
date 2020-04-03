<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to home page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: home.php");
    exit;
}

// Include config file
require_once "config.php";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

// Prepare a select statement
    $stmt = $pdo->prepare("SELECT * FROM USER_TABLE WHERE Username = ?");
    $stmt->execute([$_POST['username']]);
    $user = $stmt->fetch();

    if (password_verify($_POST['password'], $user['Password'])) {
        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['username'] = filter_input(INPUT_POST, 'username');
        $_SESSION["uid"] = $user['UserID'];
        // echo 'Welcome ' . $_SESSION['username'];
        header('Location: home.php');
    } else {
        // Display an error message if password is not valid
        echo "Your logon details have not been recognised";
    }
}

// Close statement
unset($stmt);

// Close connection
unset($pdo);
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Member's Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC&display=swap" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
        <link href="carouselcss.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
    <?php
        include 'navbar.php';
    ?>
    <body style="font-family: 'Amatic SC', cursive; font-size: 30px;">
        <div class="wrapper" style=width:350px;padding:20px;>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div>
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" autocomplete='off' required>
                </div>    
                <div>
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <br>
                <div class="form-group">
                    <input type="submit" class="btn btn-info" value="Login">
                </div>
            </form>
        </div>
        <p style="padding-left:20px;">Don't have an account? <a href="register.php">Sign up now</a>.</p>
    </body>
</html>


