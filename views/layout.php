<?php
session_start();


/***PRE POPULATE CATEGOREIS***/
$db = Db::getInstance();
$categories = $db->prepare('SELECT * FROM POST_CATEGORY');
$categories->execute();

?>

<!DOCTYPE html>
<html>
  <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC&display=swap" rel="stylesheet">
        <link href="views/css/socialsbar.css" rel="stylesheet" type="text/css"/>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <link href="views/css/carouselcss.css" rel="stylesheet" type="text/css"/>
        <link href="views/css/post.css" rel="stylesheet" type="text/css"/>
        <link href="views/css/auth.css" rel="stylesheet" type="text/css"/>
        <link href="views/css/comment.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Life's a Stitch</title>


  </head>
  <body>
<?php      
            if (isset($_SESSION['loggedin'])) {
            echo '<div style="position:absolute;right:30px;width:100%;text-align:right;font-family:\'Amatic SC\', cursive; font-size:30px;">';
            echo'<p>Welcome home, '.$_SESSION['username'].'!</p><br></div>';
           }
?>
<style>

    .dropdown-menu {
        width: 200px;
        height: 200px;
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

    <div class='sticky'>
        <div style="border-top: 2px solid black; border-bottom: 2px solid black; background-color: #d3c1e6 ">    
    <nav class="navbar navbar-expand-lg navbar-light" style=" font-family: 'Amatic SC', cursive; font-size: 30px; left: 32%;">
           
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="?">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?controller=post&action=readAll">Tutorials</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categories
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <table>
                                <?php foreach ($categories as $category): ?>
                                    <tr>
                                        <td><a class="dropdown-item" href="?controller=post&action=readCategory&id= <?= $category['CategoryID'] ?>" style="font-size: 30px;"><?= $category['Category'] ?></a></td>
                                    </tr>
                                <?php endforeach; ?>
                                </table>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Members Portal
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <?PHP            
                            // only display menu options if user is logged in
                            if (!isset($_SESSION["loggedin"])){  
                                echo '<a class="dropdown-item" href="?controller=user&action=createUser" style="font-size: 30px;">Sign up</a>';
                                echo '<a class="dropdown-item" href="?controller=user&action=authUser" style="font-size: 30px;">Log in</a>';
                            }       
                            // only display menu options if user is logged in
                            if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {                            
                                echo '<a class="dropdown-item" href="?controller=user&action=logOut" style="font-size: 30px;">Log out</a>';
                                echo '<a class="dropdown-item" href="?controller=dashboard&action=read" style="font-size: 30px;">Your dashboard</a>';
                                }
                            ?>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
</div>
    </div>

<div>
    <?php require_once('routes.php'); ?>
</div>
   
<?php include_once "views/pages/footer.php"; ?>
  </body>
</html>