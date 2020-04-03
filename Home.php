<?php

session_start();

?>

<html>
    <head>
        <title>Life's A Stitch!</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC&display=swap" rel="stylesheet">
        <link href="stylesheets/socialsbar.css" rel="stylesheet" type="text/css"/>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
        <link href="carouselcss.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include 'navbar.php';
                if (isset($_SESSION['loggedin'])) {
            echo '<div style="position:absolute;right:30px;width:100%;text-align:right;font-family:\'Amatic SC\', cursive; font-size:30px;">';
            echo'<p>Welcome home, '.$_SESSION['username'].'!</p><br></div>';
           }
        ?>
    <center><h1 style="font-family: 'Amatic SC', cursive; font-size: 100px"> Happy crafting!</h1></center>
    <h2 style=" font-family: 'Amatic SC', cursive; font-size: 50px; font-weight: bold; text-align: center;">Our top tutorials:</h2>
    <?php include 'carousel.html'; ?>
    <?php include 'socialsbar.html'; ?>

    <button type="button" class="collapsible">Our </br>Diary</button>
    <div class="content">
        <iframe src="https://calendar.google.com/calendar/embed?height=250&amp;wkst=2&amp;bgcolor=%23B39DDB&amp;ctz=Europe%2FLondon&amp;src=YW15cm9iaW5zb25sZWFybnNAZ21haWwuY29t&amp;src=ZW4udWsjaG9saWRheUBncm91cC52LmNhbGVuZGFyLmdvb2dsZS5jb20&amp;color=%23039BE5&amp;color=%230B8043&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0" style="border-width:0" width="250" height="250" frameborder="0" scrolling="no"></iframe>
    </div>
    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function () {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.maxHeight) {
                    content.style.maxHeight = null;
                } else {
                    content.style.maxHeight = content.scrollHeight + "px";
                }
            });
        }

        </script>
        </body>
        </html>