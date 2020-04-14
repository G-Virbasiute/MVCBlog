    <body style="font-family: 'Amatic SC', cursive; font-size: 30px;">
        <p style="padding-left:20px;padding-top:20px;">Here's where you can update your details...</p>

        <div class="wrapper" style="width:350px;padding-left:20px;padding-top:20px;">


            <form action="" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <p> Time for a new look?</p>

                    <?php
                    $file = $user->profilePhoto;
                    if (file_exists($file)) {
                        $img = "<img src='$file' width='150' />";
                        echo $img;
                    } else {
                        echo "<img src='views/images/profilepics/anon.png' width='150' />";
                    }
                    ?>
                    <p>Update your picture <a href="?controller=user&action=updatePicture&username=<?=$user->username?>">here</a></p>
   
                    <p>You can update your password <a href="?controller=user&action=resetPassword">here</a></p>
   
                    <div class="form-group ">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" value="<?= $user->username; ?>" readonly>
                        <span class="help-block">
                    </div>               

                    <div class="form-group">
                        <label>Update First Name</label>
                        <input type="text" name="firstname" class="form-control"  value="<?= $user->firstName; ?>">
                        <span class="help-block"></span>
                    </div>     

                    <div class="form-group">
                        <label>Update Surname</label>
                        <input type="text" name="surname" class="form-control" value="<?= $user->lastName; ?>">
                        <span class="help-block">
                    </div> 

                    <div class="form-group">
                        <label>Update Email Address</label>
                        <input type="email" name="email" class="form-control" value="<?= $user->emailAddress; ?>">
                        <span class="help-block"></span>
                    </div> 

                    <div class="form-group">
                        <input type="submit" class="btn btn-info" value="Update User">
                        <input type="reset" class="btn btn-outline-info" value="Reset">
                    </div>
            </form>
        </div>    

    </body>
</html>