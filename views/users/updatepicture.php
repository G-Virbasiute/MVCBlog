    <body style="font-family: 'Amatic SC', cursive; font-size: 30px;">
        <div class="wrapper" style="width:350px;padding-left:20px;padding-top:20px;">
            <form action="" method="post" enctype="multipart/form-data">

                <div class = "form-group">
                    <label>Look at you! It's new picture time...</label></br>
                    <?php
                    $file = $user->profilePhoto;
                    if (file_exists($file)) {
                        $img = "<img src='$file' width='150' />";
                        echo $img;
                    } else {
                        echo "<img src='views/images/profilepics/anon.png' width='150' />";
                    }
                    ?>   
                    </br>
                    <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
                    <input type = "file" name = "profilepic" accept="image/*" class="form-control" />
                    <span class="help-block"></span></br>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-info" value="Update picture">
                    <input type="reset" class="btn btn-outline-info" value="Reset">
                </div>
                </html>