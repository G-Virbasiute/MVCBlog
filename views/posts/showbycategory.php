<?php
    session_start();
    include_once 'connection.php';
    $posts = $pdo->prepare('SELECT * FROM BLOG_POSTS WHERE PostID = ?');
    $posts->execute([$_GET['PostID']]);  
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Life's a Stitch!</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="stylesheets/post.css" rel="stylesheet" type="text/css"/>        
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC&display=swap" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
    </head>
    <body>
        <?php include 'navbar.php';
            if (isset($_SESSION['loggedin'])) {
            echo '<div style="position:absolute;right:30px;width:100%;text-align:right;font-family:\'Amatic SC\', cursive; font-size:30px;">';
            echo'<p>Happy crafting '.$_SESSION['username'].'!</p><br></div>';
           }?>
        
        <div class="row">
            <div class="leftcolumn">
                <div class="card">
                    <table>
                        <?php foreach ($posts as $post): ?>
                            <tr>
                                <?php
                                echo '<div>';
                                echo '<h1><a href="post.php?PostID=' . $post['PostID'] . '">' . $post['Title'] . '</a></h1>';
                                echo '<p>Posted on ' . ($post['Published']) . '</p>';
                                echo '<p>' . $post['Blurb'] . '</p>';
                                echo '<p><a href="post.php?PostID=' . $post['PostID'] . '">Read More</a></p>';
                                echo '</div>';
                                ?>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
            <div class="rightcolumn">
                <div class="card">
                    <h2>Events Calendar</h2>
                    <div class="fakeimg" style="height:100px;">Put in the calendar here</div>
                    
                </div>
                <div class="card">
                    <h3>Card for something else:</h3>
                    <div class="fakeimg">Image link to a post</div><br>
                    <div class="fakeimg">Image link to a post</div><br>
                    <div class="fakeimg">Image link to a post</div>
                </div>
                <div class="card">
                    <h3>Follow Us</h3>
                    <p>Link to our social media</p>
                </div>
            </div>
        </div>

        <div class="footer">
            <h2>Footer</h2>
            <p>Some links to follow the blog on social media, copyright, contact us, etc</p>
        </div>
</body>
</html>
