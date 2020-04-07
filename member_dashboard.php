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
    
    if (isset($_GET['controller']) && isset($_GET['action'])) {
        $controller = $_GET['controller'];
        $action     = $_GET['action'];
  } else {
        $controller = 'pages';
        $action     = 'home';
  }
    
        ?>
        <div
<h2>Welcome <?php echo $_SESSION['username']?>!</h2>
<p>Here's the place for you to manage your info, see your favourite posts and catch up on upcoming events</p>
</div>

<div class="row">
  <div class="column" style="background-color:#aaa;">
      <h2><font color='purple'>Your Details</font></h2>
    <p>TO BE CREATED</p>
  </div>
  <div class="column" style="background-color:#bbb;">
      <h2><font color='purple'>Saved Posts</font></h2>
    <p>TO BE CREATED</p>
  </div>
  <div class="column" style="background-color:#ccc;">
      <h2><font color='purple'>Upcoming Events</font></h2>
    <p><centre><iframe src="https://calendar.google.com/calendar/embed?height=300&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=Europe%2FLondon&amp;src=Y2c3dWt2c2t2MTY0cjJiNm9xZmtnbG9wdG9AZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;color=%238E24AA&amp;showTz=0" style="border:solid 1px #777" width="400" height="300" frameborder="0" scrolling="no"></iframe></p>
  </div>
</div>

