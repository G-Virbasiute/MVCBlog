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
        <link href="views/css/carouselcss.css" rel="stylesheet" type="text/css"/>
        <link href="views/css/post.css" rel="stylesheet" type="text/css"/>
    </head>
<title>Life's a Stitch</title>
  </head>
  <body>
<style>
.dropdown-menu {
  width: 200px;
  height: 200px;
  overflow-y: auto;
}
</style>
    <center><img style="margin-top: 10px; margin-bottom: 5px;" src="views/images/logo2.png"></center>

        <div style="border-top: 2px solid black; border-bottom: 2px solid black; ">    
    <nav class="navbar navbar-expand-lg navbar-light" style=" font-family: 'Amatic SC', cursive; font-size: 30px; left: 32%;">
           
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="?">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?controller=post&action=readAll">Tutorials</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?controller=category&action=readAll">Categories</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Members Portal
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="?controller=user&action=createUser" style="font-size: 30px;">Sign up</a>
                            <a class="dropdown-item" href="#" style="font-size: 30px;">Log in</a>
                            <a class="dropdown-item" href="#" style="font-size: 30px;">Your dashboard</a> <!-- Only accessible after someone has logged in-->
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
</div>

   <!-- <header class="w3-container w3-gray">
      <a href='?'>Home</a>
      <a href='?controller=post&action=readAll'>Posts</a>
      <a href='?controller=post&action=create'>Add Post</a>
      <a href='?controller=user&action=readAllUsers'>Users</a>
      <a href='?controller=user&action=createUser'>Add User</a>
    </header>
   -->
<div class="w3-container w3-blue">
    <?php require_once('routes.php'); ?>
</<div>
<div class="w3-container w3-gray">
    <footer >
        Copyright &COPY; <?= date('Y'); ?>
    </footer>
</div>
  </body>
</html>