
<body style="font-family: 'Amatic SC', cursive; font-size: 30px;">
    <p>Fill in the following form to update an existing blog post:</p>
    <form action="" method="POST" class="w3-container" enctype="multipart/form-data">
        <h2>Update Blog Post</h2>

        <p>
            Author: <?php echo $user->username; ?>
        </p>
        <p>
            <input class="w3-input" type="text" name="title" value="<?= $post->title; ?>">
            <label>Title</label>
        </p>
        <p>
            <input class="w3-input" type="text" name="blurb" value="<?= $post->blurb; ?>" >
            <label>Blurb</label>
        </p>

        <p>
            <input class="w3-input" type="text" name="content" value="<?= $post->content; ?>" >
            <label>Content</label>
        </p>

        <div>
            <label>Category:</label>
            <select name="category" required>
                <option value="1">Embroidery</option>
                <option value="2">Macrame</option>
                <option value="6">Knitting</option>
            </select>
        </div>

        <?php $default = $post->rating; ?>

        <select name="rating" required>
            <?php
            switch ($default) {
                case 'Beginner':
                    echo "<option><option value='Beginner' selected>Beginner</option></br>"
                    . "<option><option value='Intermediate' >Intermediate</option>"
                    . "<option><option value='Expert'>Expert</option>";
                    break;
                case 'Intermediate':
                    echo "<option><option value='Beginner'>Beginner</option>"
                    . "<option><option value='Intermediate' selected>Intermediate</option>"
                    . "<option><option value='Expert'>Expert</option>";
                    break;
                case 'Expert':
                    echo "<option><option value='Beginner'>Beginner</option>"
                    . "<option><option value='Intermediate'>Intermediate</option>"
                    . "<option><option value='Expert' selected>Expert</option>";
                    break;
            }
            ?>
        </select>
        <label>Difficulty rating</label>
        </br>
        <p>
            <label>Change publish status:</label></br>
            <?php
            switch ($post->poststatus) {
                case 0:
                    echo "<input type= 'radio' name='poststatus' value='1'"
                    . "<label>Set as published</label><br>"
                    . "<input type='radio' name='poststatus' value='0' checked='checked'>"
                    . "<label>Set as unpublished</label><br>";
                    break;

                case 1:
                    echo "<input type= 'radio' name='poststatus' value='1' checked='checked'>"
                    . "<label>Set as published</label><br>"
                    . "<input type='radio' name='poststatus' value='0'>"
                    . "<label>Set as unpublished</label><br>";
                    break;
            }
            ?>
        </p>
        <div class="form-group">
            <label>Change the main blog picture:</label>
            <?php
            $file0 = $post->mainimage;
            if (file_exists($file0)) {
                $img = "<img src='$file0' width='150' />";
                echo $img;
            } else {
                echo "<img src='views/images/standard/_noproductimage.png' width='150' />";
            }
            ?>   
            <input type="file" name="blogpic[]" accept="image/*" class="w3-btn w3-pink" value="<?= $post->mainimage; ?>"/>
        </div>    
        <div class="form-group">
            <label>Change the blog gallery pictures and descriptions:</label></br>
            <label>Image 1:</label>
            <?php
            $file1 = $post->img1;
            if (file_exists($file1)) {
                $img = "<img src='$file1' width='150' />";
                echo $img;
            } else {
                echo "<img src='views/images/standard/_noproductimage.png' width='150' />";
            }
            ?>   
            <input type="file" name="blogpic[]" accept="image/*" class="w3-btn w3-pink" value="<?= $post->img1; ?>"/>

            <div class = "form-group">
                <label>Image 1 description:</label>
                <input type="text" name="img1desc" class="form-control" value="<?= $post->img1desc; ?>" required>
            </div>    
            <label>Image 2:</label>
            <?php
            $file2 = $post->img2;
            if (file_exists($file2)) {
                $img = "<img src='$file2' width='150' />";
                echo $img;
            } else {
                echo "<img src='views/images/standard/_noproductimage.png' width='150' />";
            }
            ?>   
            <input type="file" name="blogpic[]" accept="image/*" class="w3-btn w3-pink" value="<?= $post->img2; ?>"/>

            <div class = "form-group">
                <label>Image 2 description:</label>
                <input type="text" name="img2desc" class="form-control" value="<?= $post->img2desc; ?>" required>
            </div>    
            <label>Image 3:</label>
            <?php
            $file3 = $post->img3;
            if (file_exists($file3)) {
                $img = "<img src='$file3' width='150' />";
                echo $img;
            } else {
                echo "<img src='views/images/standard/_noproductimage.png' width='150' />";
            }
            ?>   
            <input type="file" name="blogpic[]" accept="image/*" class="w3-btn w3-pink" value="<?= $post->img3; ?>"/>

            <div class = "form-group">
                <label>Image 3 description:</label>
                <input type="text" name="img3desc" class="form-control" value="<?= $post->img3desc; ?>" required>
            </div>    
        </div>  
        <p>

            <br/>
        <p>
            <input class = "w3-btn w3-gray" type = "submit" value = "Update Blog Post">
            <input type="reset" class="btn btn-outline-info" value="Reset">
        </p>
    </form>