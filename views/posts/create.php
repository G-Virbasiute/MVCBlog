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
<?php
/* * *PRE POPULATE CATEGORIES** */
$db = Db::getInstance();
$categories = $db->prepare('SELECT * FROM POST_CATEGORY');
$categories->execute();
?>

<body style="font-family: 'Amatic SC', cursive; font-size: 30px;">
    <div class="row" style='margin-right: 10px; margin-left: 10px'>
        <div class="leftcolumn" >
            <div class="card">

                <p style="padding-left:20px;padding-top:20px;">Create a new blog post:</p>
                <div class="wrapper" style="width:350px;padding-left:20px;padding-top:20px;">

                    <form action="" method="post" enctype="multipart/form-data">

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
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?= $category['CategoryID'] ?>"><?= $category['Category'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>


                        <div class="form-group">
                            <input type="hidden"  
                                   name="MAX_FILE_SIZE" 
                                   value="10000000"  
                                   />  
                            <label>Main blog image: </label>
                            <input type="file" name="blogpic[]" class="form-control"/>
                        </div>
                        <div class = "form-group">
                            <label>Image 1</label>
                        </div>    
                        <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
                        <input type = "file" name = "blogpic[]" accept="image/*" class="form-control" />
                        <span class="help-block"></span></br>
                        <div class="form-group">
                            <label>Image 2</label>
                        </div>    
                        <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
                        <input type = "file" name = "blogpic[]" accept="image/*" class="form-control" />
                        <span class="help-block"></span></br>
                        <div class="form-group">
                            <label>Image 3</label>
                        </div>    
                        <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
                        <input type = "file" name = "blogpic[]" accept="image/*" class="form-control" />
                        <span class="help-block"></span></br>                     
                </div>

                <div class="form-group">
                    <p>
                        <input class="w3-btn w3-pink" type="submit" name = 'submit' value="Create My Post!">
                    </p>
                </div>
                </form>
            </div>    
        </div>    

    <div class="rightcolumn">
        <div class="card">
            <p style="padding-left:20px;padding-top:20px;"><b>Top Tips:</b></p>
            <p style="font-size: 15px; font-family: 'Lucida Grande', 'Helvetica Neue', sans-serif;"> 1. If you want a new line break, please write &lt;/br&gt; at the end of the line.</p>
            <p style="font-size: 15px; font-family: 'Lucida Grande', 'Helvetica Neue', sans-serif;"> 2. If you want an empty line between the next paragraph, please write &lt;/br&gt;&lt;/br&gt; at the end of the previous paragraph.</p>
            <p style="font-size: 15px; font-family: 'Lucida Grande', 'Helvetica Neue', sans-serif;"> 3. If you would like to display a list with bullet points, please write it likes this:</p>
            <p style="font-size: 15px; margin-left: 10px; font-family: 'Lucida Grande', 'Helvetica Neue', sans-serif;"> &lt;ul&gt; </br> &lt;li&gt;Coffee&lt;/li&gt; </br> &lt;li&gt;Tea&lt;/li&gt;  </br> &lt;li&gt;Milk&lt;/li&gt; </br> &lt;/ul&gt;</p>
        </div>
    </div>
    </div>


</body>