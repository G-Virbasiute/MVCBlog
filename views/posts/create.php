<!-- Previous Form
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
            <option value="Beginner">Beginner</option>
            <option value="Intermediate">Intermediate</option>
            <option value="Expert">Expert</option>
        </select>
    </div>
    <div>
        <label>Category:</label>
        <select name="category" required>
            <option value="1">Embroidery</option>
            <option value="2">Macrame</option>
            <option value="6">Knitting</option>
        </select>
    </div>

    <div>
        <input type="hidden"  
               name="MAX_FILE_SIZE" 
               value="10000000"  
               />  

        <input type="file" name="blogpic" class="w3-btn w3-pink"/>
        <p>
            <input class="w3-btn w3-pink" type="submit" value="Create My Post!">
        </p>
    </div>
</div>
</form>
-->

<body style="font-family: 'Amatic SC', cursive; font-size: 30px;">


    <p style="padding-left:20px;padding-top:20px;">Create a new blog post:</p>
    <div class="wrapper" style="width:350px;padding-left:20px;padding-top:20px;">

        <form action="" method="post" enctype="multipart/form-data">

            <div class="form-group ">
                <label>User ID </label>
                <input type="text" name="userid" class="form-control" placeholder="Your User ID" required autofocus>
            </div>           

            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" placeholder="Title for your blog post" required autofocus>
            </div>     

            <div class="form-group">
                <label>Blurb</label>
                <textarea type="text" name="blurb" class="form-control" placeholder="Short blurb about your post" required></textarea>
            </div> 

            <div class="form-group">
                <label>Content</label>
                <textarea class="form-control" type="text" name="content" placeholder="Your post's contents" required></textarea>
            </div> 

            <div class="form-group">
                <label>Difficulty rating:</label>
                <select name="rating" required>
                    <option value="Beginner">Beginner</option>
                    <option value="Intermediate">Intermediate</option>
                    <option value="Expert">Expert</option>
                </select>
            </div>

            <div class="form-group">
                <label>Category:</label>
                <select name="category" required>
                    <option value="1">Embroidery</option>
                    <option value="2">Macrame</option>
                    <option value="6">Knitting</option>
                </select>
            </div>


            <div class="form-group">
                <input type="hidden"  
                       name="MAX_FILE_SIZE" 
                       value="10000000"  
                       />  

                <input type="file" name="blogpic" class="w3-btn w3-pink"/>

            </div>


            <div class="form-group">
                <p>
                    <input class="w3-btn w3-pink" type="submit" value="Create My Post!">
                </p>
            </div>
        </form>
    </div>    
</body>