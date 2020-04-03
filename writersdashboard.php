<?php
    session_start();  
?>
<html>
    <head>
        <title>Your Dashboard</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC&display=swap" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
        <link href="carouselcss.css" rel="stylesheet" type="text/css"/>
        <link href="stylesheets/dashboard.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
    <?php
        include 'navbar.html';
    ?>
        
<div>
<h2>Welcome <?php echo $_SESSION['username']?>!</h2>
<p>Here's the place for you to manage your info, manage and create posts and organise events</p>
</div>

<div class="row">
  <div class="column" style="background-color:#aaa;">
      <h2><font color='purple'>Your Details</font></h2>
    <p>TO BE CREATED WITH INFO PULLED FROM USER TABLE ON DATABASE</p>
  </div>
  <div class="column" style="background-color:#bbb;">
      <h2><font color='purple'>Posts</font></h2>
    <table>
  <tr>
      <td>
          <p><b>Favourite Posts</b></p>
          <p>This will show random posts on a carousel to click on and read</p>
      </td>
  </tr>
  <tr>
    <td>
        <p><b>Manage My Posts</b></p>
        <p>This will show a list of blog posts by this writer</p>
    </td>
  </tr>
  <tr>
    <td>
        <p><b>Create a Post</b></p>
        <p>This will have a button to a form to create a new blog post</p>
    </td>
  </tr>
</table>
  </div>
  <div class="column" style="background-color:#ccc;">
      <h2><font color='purple'>Upcoming Events</font></h2>
    <p><centre><iframe src="https://calendar.google.com/calendar/embed?height=300&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=Europe%2FLondon&amp;src=Y2c3dWt2c2t2MTY0cjJiNm9xZmtnbG9wdG9AZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;color=%238E24AA&amp;showTz=0" style="border:solid 1px #777" width="400" height="300" frameborder="0" scrolling="no"></iframe></p>
  </div>
</div>

      
        
    </body>
</html>