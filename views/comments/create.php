<form action="" method="POST" class="w3-container" enctype="multipart/form-data">

    <h2>Leave a comment:</h2>

    <div style="width: 40%; margin-left: 50px; margin-top: 50px;">
        <div>
            <label>Post ID</label>
            <input class="w3-input" type="text" name="postid" placeholder="Post ID" required autofocus>
        </div>
        <div>
            <label>User ID</label>
            <input class="w3-input" type="text" name="userid" placeholder="Your User ID" required autofocus>
        </div>
        <div>
            <label>Comment</label>
            <textarea class="w3-input" type="text" name="comment" placeholder="Your comment" row="1" required autofocus></textarea>
        </div>
        <p>
            <input class="w3-btn w3-pink" type="submit" value="Comment">
        </p>
    </div>
    
</form>

