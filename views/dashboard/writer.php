<link href="views/css/dash.css" rel="stylesheet" type="text/css"/>

<h1 style='margin-left: 20px'>Welcome!</h1>
<p style='margin-left: 20px'>Here's the place for you to manage your information, posts, and events.</p>

<div class="tab">
    <button class="tablinks" onclick="openTab(event, 'Details')" id="defaultOpen">Details</button>
    <button class="tablinks" onclick="openTab(event, 'Posts')">Posts</button>
    <button class="tablinks" onclick="openTab(event, 'Calendar')">Calendar</button>
</div>

<div id="Details" class="tabcontent">
    <h3>Your Details</h3>
    <p>
        <?php
    $file = $username['ProfilePhoto'];
    if (file_exists($file)) {
        $img = "<img style='border-style: solid; float: left; margin-right: 20px' src='$file' width='300' />";
        echo $img;
    } else {
        echo "<img src='views/images/profilepics/anon.png' width='150' />";
    }
    ?>
        <br>
    <div style="font-size: 15px">
        <p><b>Username:</b> <?php echo $username['Username']; ?></p>
        <p><b>Name:</b> <?php echo $username['FirstName'] . ' ' . $username['LastName']; ?></p>
        <p><b>User Type: </b> <?php echo $username['UserType']; ?></p>
        <p><b>Email:</b> <?php echo $username['EmailAddress']; ?></p>
        <h3><a style="color: black; border-bottom: 3px solid black;" href="?controller=user&action=updateUser&username=<?php echo $_SESSION['username'] ?>">Update your details</a></h3>    </p>
    </div>
</div>


<div id="Posts" class="tabcontent">
    <div>
        <h2>Your Posts</h2>
        <p><?php foreach ($posts as $post): ?>
  <tr>
  <?php
  echo '<div>';
  echo '<p style="font-size:20px"><a style="color:black" href="?controller=post&action=read&id=' . $post->postid . '">' . $post->title . '</a></p>';
  echo '</div>';
  ?>
  </tr>
  <?php endforeach;  ?></p> 
    </div>

 <div>
     <h2 style='margin-top: 20px'><a style="color:black;border-bottom: 3px solid black;" href="?controller=post&action=create"<?php echo $_SESSION['username'] ?>">Create a Post</a></h2>

 </div>

</div>

<div id="Calendar" class="tabcontent">
    <h3>Event Calendar</h3>
    <p style="margin-top: 30px;"><iframe src="https://calendar.google.com/calendar/embed?height=300&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=Europe%2FLondon&amp;src=Y2c3dWt2c2t2MTY0cjJiNm9xZmtnbG9wdG9AZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;color=%238E24AA&amp;showTz=0" style="border:solid 1px #777" width="400" height="300" frameborder="0" scrolling="no"></iframe></p></center>
</div>

<script>
function openTab(evt, tabName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
