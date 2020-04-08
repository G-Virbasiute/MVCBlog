<center>
<table>
    <tr>
        <td><h2>Welcome <?php echo $_SESSION['username']?>!</h2><br>
        
<p>Here's the place for you to manage your info, as well as other posts and user's</p>
</div>

<div class="row">
  <div class="column" style="background-color:#aaa;">
      <h2><font color='purple'>Details</font></h2>
    <table>
  <tr>
      <td>
          <a href="?controller=user&action=readUser&username=<?php echo $_SESSION['username'] ?>">View Your Details</a>
      </td>
  </tr>
  <tr>
    <td>
        <p><b>Manage Users Details and Accounts</b></p>
        <p>This will have an option to remove users - maybe a drop-down of all users and a delete button?</p>
    </td>
  </tr>
</table>
  </div>
  <div class="column" style="background-color:#bbb;">
      <h2><font color='purple'>Posts</font></h2>
    <table>
  <tr>
    <td>
        <p><b>Manage Posts</b></p>
        <p>Ability to remove others posts here</p>
    </td>
  </tr>
  <tr>
    <td>
        <p><b>Create a Post</b></p>
        <p>This will have a button to a form to create a new blog-post</p>
    </td>
  </tr>
</table>
  </div>
  <div class="column" style="background-color:#ccc;">
      <h2><font color='purple'>Upcoming Events</font></h2>
    <p><centre><iframe src="https://calendar.google.com/calendar/embed?height=300&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=Europe%2FLondon&amp;src=Y2c3dWt2c2t2MTY0cjJiNm9xZmtnbG9wdG9AZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;color=%238E24AA&amp;showTz=0" style="border:solid 1px #777" width="400" height="300" frameborder="0" scrolling="no"></iframe></p>
  </div>
</div></td>
    </tr>
</table>
</center>

