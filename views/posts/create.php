
<form action="" method="POST" class="w3-container" enctype="multipart/form-data">

    <h2>Create a new blog post:</h2>

<div style="width: 40%; margin-left: 50px; margin-top: 50px;">
    <div>
        <label>User ID</label>
        <input class="w3-input" type="text" name="userid" placeholder="Your User ID" required autofocus>
    </div>
    <div>
        <label>Title</label>
        <input class="w3-input" type="text" name="title" placeholder="Title for your blog post" required autofocus>
    </div>
    <div>
        <label>Blurb</label>
        <textarea class="w3-input" type="text" name="blurb" placeholder="Short blurb about your post" required></textarea>
    </div>
    <div>
        <label>Content</label>
        <textarea class="w3-input" type="text" name="content" placeholder="Your post's contents" required></textarea>
    </div>
    <div>
        <label>Difficulty rating:</label>
        <select name="rating" required>
            <option><option value="Beginner">Beginner</option>
            <option><option value="Intermediate">Intermediate</option>
            <option><option value="Expert">Expert</option>
        </select>
    </div>

    <div>
        <input type="hidden"  
               name="MAX_FILE_SIZE" 
               value="10000000"  
               />  

        <input type="file" name="blogpic" class="w3-btn w3-pink" required />
        <p>
            <input class="w3-btn w3-pink" type="submit" value="Create My Post!">
        </p>
    </div>
</div>
</form>

