<html>
    <head>
        <title>Update the main blog thumbnail picture</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC&display=swap" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
        <link href="carouselcss.css" rel="stylesheet" type="text/css"/>
    </head>
    <body style="font-family: 'Amatic SC', cursive; font-size: 30px;">
        <div class="wrapper" style="width:350px;padding-left:20px;padding-top:20px;">
            <form action="" method="post" enctype="multipart/form-data">

                <div class = "form-group">
                    <p>
                        <input class="w3-input" type="hidden" name="title" value="<?= $post->title; ?>" readonly >
                    </p>
                    <label>Select a new picture to use as the blog thumbnail</label></br>
                    <?php
                    $file = $post->mainimage;
                    if (file_exists($file)) {
                        $img = "<img src='$file' width='150' />";
                        echo $img;
                    } else {
                        echo "<img src='views/images/standard/_noproductimage.png' width='150' />";
                    }
                    ?>   
                    </br>
                    <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
                    <input type = "file" name = "blogpic" accept="image/*" class="form-control" />
                    <span class="help-block"></span></br>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-info" value="Update picture">
                    <input type="reset" class="btn btn-outline-info" value="Reset">
                </div>
                </html>