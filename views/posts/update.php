<p>Fill in the following form to update an existing blog post:</p>
<form action="" method="POST" class="w3-container" enctype="multipart/form-data">
    <h2>Update Blog Post</h2>

    <p>
        <input class="w3-input" type="text" name="userid" value="<?= $post->userid; ?>">
        <label>User ID</label>
    </p>

    <p>
        <input class="w3-input" type="text" name="title" value="<?= $post->title; ?>">
        <label>Title</label>
    </p>
    <p>
        <input class="w3-input" type="text" name="blurb" value="<?= $post->blurb; ?>" >
        <label>Blurb</label>
    </p>

    <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />

    <?php
    $file = 'views/images/' . $post->title . '.jpeg';
    if (file_exists($file)) {
        $img = "<img src='$file' width='150' />";
        echo $img;
    } else {
        echo "<img src='views/images/standard/_noproductimage.png' width='150' />";
    }
    ?>

    <p>
        <input class="w3-input" type="text" name="content" value="<?= $post->content; ?>" >
        <label>Content</label>
    </p>


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

    <br/>
    <input type = "file" name = "blogpic" class = "w3-btn w3-pink" value="<?= $post->mainimage; ?>" />
    <p>
        <input class = "w3-btn w3-gray" type = "submit" value = "Update Blog Post">
    </p>
</form>