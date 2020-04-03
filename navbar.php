<?php
include_once 'connection.php';

/***PRE POPULATE CATEGOREIS***/
$categories = $pdo->prepare('SELECT * FROM POST_CATEGORY');
$categories->execute();
?>

<!DOCTYPE html>
<style>
.dropdown-menu {
  width: 200px;
  height: 200px;
  overflow-y: auto;
}
</style>
    <center><img style="margin-top: 10px; margin-bottom: 5px;" src="images/logo2.png"></center>

        <div style="border-top: 2px solid black; border-bottom: 2px solid black; ">    
    <nav class="navbar navbar-expand-lg navbar-light" style=" font-family: 'Amatic SC', cursive; font-size: 30px; left: 32%;">
           
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tutorials</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Gallery</a>
                    </li>
                    
<!-----------------Populate from the database, add id's, and onclick it will take you to a category's page with all tutorials for that category------------------->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categories
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <table>
                                <?php foreach ($categories as $category): ?>
                                    <tr>
                                        <td><a class="dropdown-item" href="categorypage.php?PostID=<?= $category['CategoryID'] ?>" style="font-size: 30px;"><?= $category['Category'] ?></a></td>
                                    </tr>
                                <?php endforeach; ?>
                                </table>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Members Portal
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="register.php" style="font-size: 30px;">Sign up</a>
                            <a class="dropdown-item" href="login.php" style="font-size: 30px;">Log in</a>
                            <a class="dropdown-item" href="#" style="font-size: 30px;">Your dashboard</a> <!-- Only accessible after someone has logged in-->
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
</div>

