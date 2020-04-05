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

    <p>
        <label>Current difficulty rating:</label>
        <?= $post->rating; ?>
    </p>

    <label>New difficulty rating:</label>
    <select name="rating" required>
        <option><option value="Beginner">Beginner</option>
        <option><option value="Intermediate">Intermediate</option>
        <option><option value="Expert">Expert</option>
    </select>
   <p>
        <input class="w3-input" type="text" name="poststatus" value="<?= $post->poststatus; ?>" >
        <label>Post Status</label>
    </p>

<!--    <br/>   -->
<!--    <input type="file" name="myUploader" class="w3-btn w3-pink" />    -->
    <p>
        <input class="w3-btn w3-gray" type="submit" value="Update Blog Post">
    </p>
</form>