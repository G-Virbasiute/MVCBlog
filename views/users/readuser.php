<p>User Details:</p>

<?php 
$file = $username->profilePhoto;
if(file_exists($file)){
    $img = "<img src='$file' width='150' />";
    echo $img;
}
else
{
echo "<img src='views/images/profilepics/anon.png' width='150' />";
}

?>

<p>Username: <?php echo $username->username; ?></p>
<p>Name: <?php echo $username->firstName. ' '. $username->lastName; ?></p>
<p>User Type: <?php echo $username->userType; ?></p>
<p>Email: <?php echo $username->emailAddress; ?></p>
<p>Posts:</p>
