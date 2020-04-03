<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $profilepic = $firstname = $surname = $email = $password = $confirm_password = "";
$username_err = $profilepic_err = $firstname_err = $surname_err = $email_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username";
    } else{
        // Prepare a select statement
        $sql = "SELECT UserID FROM USER_TABLE WHERE username = :username";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $username_err = "This username is already taken";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }
    
// Validate Firstname
    if(empty(trim($_POST["firstname"]))){
        $firstname_err = "Please enter a firstname";     
    }
    else{
        $firstname = trim($_POST["firstname"]);
    }
    
// Validate Surname
    if(empty(trim($_POST["surname"]))){
        $firstname_err = "Please enter a Surname";     
    }
    else{
        $surname = trim($_POST["surname"]);
    }
    
    // Validate Email
    if(empty(trim($_POST["email"]))|(!filter_var((trim($_POST["email"])), FILTER_VALIDATE_EMAIL))){
        $email_err = "Please enter a valid email address";     
    }
    else{
        $email = trim($_POST["email"]);
    }
   
    // Validate Profile Pic 

    if (empty($_FILES['profilepic'])) {
        $profilepic_err = "Please upload a profile picture";     
    }

    if ($_FILES['profilepic']['error'] > 0) {
        $profilepic_err = "Your picture failed to upload, please try again later";     
    }

    // Rename the uploaded file to match the username and move it to the profilepics folder
    $uploadedFile = $_FILES['profilepic']['name'];
    $tempFile = $_FILES['profilepic']['tmp_name'];
    $extension = pathinfo($uploadedFile, PATHINFO_EXTENSION);
    $profilepic = $username.'.'.$extension;
    $destinationFile = 'images/profilepics/'.$profilepic;
    
    if (!move_uploaded_file($tempFile, $destinationFile)) {
        $profilepic_err = "Your picture could not be saved, please try again later";     
    }

    //Clean up the temp file
    if (file_exists($tempFile)) {
    unlink($tempFile); 
    }


     
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have at least 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Passwords do not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($firstname_err)  && empty($surname_err)  && empty($email_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO USER_TABLE (Username, ProfilePhoto, FirstName, LastName, EmailAddress, Password) VALUES (:username, :profilephoto, :firstname, :surname, :email, :password)";
         
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $stmt->bindParam(":profilephoto", $param_profilephoto, PDO::PARAM_STR);
            $stmt->bindParam(":firstname", $param_firstname, PDO::PARAM_STR);
            $stmt->bindParam(":surname", $param_surname, PDO::PARAM_STR);
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
            $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
            
            
            // Set parameters
            $param_username = $username;
            $param_profilephoto = $destinationFile;
            $param_firstname = $firstname;
            $param_surname = $surname;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                echo "Thanks for registering!";
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }   
    // Close connection
    unset($pdo);
}

?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC&display=swap" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
        <link href="carouselcss.css" rel="stylesheet" type="text/css"/>
    </head>
    <body style="font-family: 'Amatic SC', cursive; font-size: 30px;">
        
    <?php
        include 'navbar.html';
    ?>
    <p style="padding-left:20px;padding-top:20px;">Complete the form to register as a member.</p>
    <div class="wrapper" style="width:350px;padding-left:20px;padding-top:20px;">
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" autofocus="true" autocomplete='off' value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>            
            
             
            <div class="form-group <?php echo (!empty($firstname_err)) ? 'has-error' : ''; ?>">
                <label>First Name</label>
                <input type="text" name="firstname" class="form-control" autocomplete='off' value="<?php echo $firstname; ?>">
                <span class="help-block"><?php echo $firstname_err; ?></span>
            </div>     
            
            <div class="form-group <?php echo (!empty($surname_err)) ? 'has-error' : ''; ?>">
                <label>Surname</label>
                <input type="text" name="surname" class="form-control" autocomplete='off' value="<?php echo $surname; ?>">
                <span class="help-block"><?php echo $surname_err; ?></span>
            </div> 
            
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>Email Address</label>
                <input type="email" name="email" class="form-control" autocomplete='off' value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div> 
 
            <div class="form-group <?php echo (!empty($profilepic_err)) ? 'has-error' : ''; ?>">
                <label>Upload Profile Picture</label>
                <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
                <input type="file" name="profilepic" accept="image/*" class="form-control" value="<?php echo $profilepic; ?>">
                <span class="help-block"><?php echo $profilepic_err; ?></span>
            </div> 
            
            
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            
            
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            
            
            <div class="form-group">
                <input type="submit" class="btn btn-info" value="Register">
                <input type="reset" class="btn btn-outline-info" value="Reset">
            </div>
        </form>
    </div>    
    <p style="padding-left:20px;">Already have an account? <a href="login.php">Login here</a>.</p>
</body>
</html>

