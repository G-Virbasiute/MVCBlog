<p>Fill in the following form to create a new blog post:</p>
<form action="" method="POST" class="w3-container" enctype="multipart/form-data">
    
    <h2>Create New Blog Post</h2>
</div>
    <p>
        <input class="w3-input" type="text" name="title" required autofocus>
        <label>Title</label>
    </p>
        <p>
        <input class="w3-input" type="text" name="blurb" required>
        <label>Blurb</label>
    </p>
            
  <input type="hidden" 
	   name="MAX_FILE_SIZE" 
         value="10000000"
         />

  <input type="file" name="myUploader" class="w3-btn w3-pink" required />
  <p>
    <input class="w3-btn w3-pink" type="submit" value="Add Product">
  </p>
</form>