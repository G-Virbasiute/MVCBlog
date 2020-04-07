<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Life's a Stitch</title>
    </head>
    <body>
        <?php
    require_once('connection.php');
        
    require_once('views/layout.php');
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

