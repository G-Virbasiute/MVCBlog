<?php
session_start();

/* * *PRE POPULATE CATEGORIES** */
$db = Db::getInstance();
$categories = $db->prepare('SELECT * FROM POST_CATEGORY ORDER BY Category ASC');
$categories->execute();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="views/images/knitting.png">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC&display=swap" rel="stylesheet">
        <link href="views/css/socialsbar.css" rel="stylesheet" type="text/css"/>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOz526glReNGZcpmidNlUZa6RjUxZ9W14&libraries=places"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link href="views/css/carouselcss.css" rel="stylesheet" type="text/css"/>
        <link href="views/css/post.css" rel="stylesheet" type="text/css"/>
        <link href="views/css/auth.css" rel="stylesheet" type="text/css"/>
        <link href="views/css/comment.css" rel="stylesheet" type="text/css"/>
        <link href="views/css/dash.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="GalleryJS.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Life's a Stitch</title>
<script language=”JavaScript”>
    var frmvalidator = new Validator("contactform"); 
    frmvalidator.addValidation("name","req","Please provide your name"); 
    frmvalidator.addValidation("email","req","Please provide your email"); 
    frmvalidator.addValidation("email","email", "Please enter a valid email address"); 
</script>

    </head>
    
    <body>
        <?php
        if (isset($_SESSION['loggedin'])) {
            echo '<div style="position:absolute;right:30px;width:100%;text-align:right;font-family:\'Amatic SC\', cursive; font-size:30px;">';
            echo'<p>Welcome home, ' . $_SESSION['username'] . '!</p><br></div>';
        }
        ?>
        <style>

            .dropdown-menu {
                width: 200px;
                height: 130px;
                overflow-y: auto;
            }

            div.sticky {
                position: -webkit-sticky; 
                position: sticky;
                top: 0;
                z-index: 2;
                background-color: white;
            }
        </style>
    <center><img style="margin-top: 10px; margin-bottom: 5px;" src="views/images/logo2.png"></center>
        <?php include_once('views/navbar.php'); ?>

    <div>
        <?php require_once('routes.php'); ?>
    </div>
    <?php include_once "views/pages/footer.php"; ?>
</body>
</html>