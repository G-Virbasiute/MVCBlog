<!--member dashboard-->

<link href="views/css/dashboard.css" rel="stylesheet" type="text/css"/>

<table>
    <tr>
        <td><center><h2>Welcome <?php echo $_SESSION['username'] ?>!</h2><br>

        <h6>Here's the place for you to manage your information, posts, and events.</h6></center>
    <div class="row" style="margin-top: 20px">
        <div class="column" style="background-color:#cbc1f9; border-style:solid">
            <center><h2><font color='purple'>Details</font></h2></center>
            <table>
                <tr>      
                    <td>


                        <?php
                        $file = $username['ProfilePhoto'];
                        if (file_exists($file)) {
                            $img = "<img style='border-style: solid;' src='$file' width='300' />";
                            echo $img;
                        } else {
                            echo "<img src='views/images/profilepics/anon.png' width='150' />";
                        }
                        ?>
                        <div style="font-size: 15px">
                            <p><b>Username:</b> <?php echo $username['Username']; ?></p>
                            <p><b>Name:</b> <?php echo $username['FirstName'] . ' ' . $username['LastName']; ?></p>
                            <p><b>User Type: </b> <?php echo $username['UserType']; ?></p>
                            <p><b>Email:</b> <?php echo $username['EmailAddress']; ?></p>
                            <p><b>Posts:</b></p>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                <center><h2><a style="color: black" href="?controller=user&action=updateUser&username=<?php echo $_SESSION['username'] ?>">Update your details</a></h2></center>
                </td>
                </tr>
            </table>
        </div>
     <!--   
        <div class="column" style="background-color:#bbb; width:30%; margin-left: 20px; border-style:solid">
            <center><h2><font color='purple'>Posts</font></h2></center>
            <table>
                <tr>
                    <td>Favourite Posts</td>
                </tr>
            </table>
        </div>
     -->
     <div class="column" style="background-color:#cbd6fd;  border-style:solid">
            <center><h2><font color='purple'>Upcoming Events</font></h2>
                <p style="margin-top: 30px;"><iframe src="https://calendar.google.com/calendar/embed?height=300&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=Europe%2FLondon&amp;src=Y2c3dWt2c2t2MTY0cjJiNm9xZmtnbG9wdG9AZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;color=%238E24AA&amp;showTz=0" style="border:solid 1px #777" width="400" height="300" frameborder="0" scrolling="no"></iframe></p></center>
        </div>
    </div></td>
</tr>
</table>

