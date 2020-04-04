<p>Fill in the following form to update an existing blog post:</p>
<form action="" method="POST" class="w3-container" enctype="multipart/form-data">
    <h2>Update Blog Post</h2>
    <p>
        <input class="w3-input" type="text" name="name" value="<?= $post->title; ?>">
        <label>Title</label>
    </p>
    <p>
        <input class="w3-input" type="text" name="price" value="<?= $post->blurb; ?>" >
        <label>Blurb</label>
    </p>
            
  <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
<?php 
$file = 'views/images/' . $post->title . '.jpeg';
if(file_exists($file)){
    $img = "<img src='$file' width='150' />";
    echo $img;
}
else
{
echo "<img src='views/images/standard/_noproductimage.png' width='150' />";
}

?>
  <br/>
  <input type="file" name="myUploader" class="w3-btn w3-pink" />
  <p>
    <input class="w3-btn w3-gray" type="submit" value="Update Product">
    </p>
</form>