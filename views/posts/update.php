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
                <p style="padding-left:20px;padding-top:20px;">Fill in the following form to update an existing blog post:</p>
                <div class="wrapper" style="width:350px;padding-left:20px;padding-top:20px;">

                    <form action="" method="POST" class="w3-container" enctype="multipart/form-data">

                        <div class="form-group">
                            <p>
                                Author: <?php echo $user->username; ?>
                            </p>
                        </div>     

                        <div class="form-group">
                            <p>
                                <input class="w3-input" type="text" name="title" value="<?= $post->title; ?>">
                                <label>Title</label>
                            </p>
                        </div>
                        <div class="form-group">

                            <p>
                                <textarea class="w3-input" type="text" name="blurb"><?php echo $post->blurb; ?></textarea>
                                <label>Blurb</label>
                            </p>
                        </div>

                        <div class="form-group">
                            <p>
                                <textarea class="w3-input" type="text" name="content"><?php echo $post->content; ?>"</textarea>
                                <label>Content</label>
                            </p>
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
                            <label>Difficulty rating</label>
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
                        </div>
                        <div class="form-group">
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
                        </div>
                        <div class="form-group">
                            <label>Change the main blog picture:</label></br>
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
                            </br></br>
                        </div>    
                        <div class="form-group">
                            <label>Change the blog gallery:</label></br>
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
                            <span class="help-block"></span></br>                     
                        </div>
                        <div class = "form-group">
                            <label>Image 1 description:</label>
                            <input type="text" name="img1desc" class="form-control" value="<?= $post->img1desc; ?>" required>
                            </br>
                        </div>    
                        <div class = "form-group">
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
                            <span class="help-block"></span></br>                     
                        </div>
                        <div class = "form-group">
                            <label>Image 2 description:</label>
                            <input type="text" name="img2desc" class="form-control" value="<?= $post->img2desc; ?>" required>
                            </br>
                        </div>    
                        <div class = "form-group">
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
                            <span class="help-block"></span></br>                     
                        </div>
                        <div class = "form-group">
                            <label>Image 3 description:</label>
                            <input type="text" name="img3desc" class="form-control" value="<?= $post->img3desc; ?>" required>
                            </br>
                        </div>

                        <div class="form-group">
                            <p>
                                <input class = "w3-btn w3-gray" type = "submit" value = "Update Blog Post">
                                <input type="reset" class="btn btn-outline-info" value="Reset">                    
                            </p>
                        </div>
                    </form>
                </div>    
            </div>    
        </div>    

        <div class="rightcolumn">
            <div class="card">
                <p style="padding-left:20px;padding-top:20px;"><b>Top Tips:</b></p>
                <p style="font-size: 15px; font-family: 'Lucida Grande', 'Helvetica Neue', sans-serif;"> 1. If you want a new line break, please write &lt;/br&gt; at the end of the line.</p>
                <p style="font-size: 15px; font-family: 'Lucida Grande', 'Helvetica Neue', sans-serif;"> 2. If you want an empty line between the next paragraph, please write &lt;/br&gt;&lt;/br&gt; at the end of the previous paragraph.</p>
                <p style="font-size: 15px; font-family: 'Lucida Grande', 'Helvetica Neue', sans-serif;"> 3. If you would like to display a list with bullet points, please write it likes this:</p>
                <p style="font-size: 15px; margin-left: 10px; font-family: 'Lucida Grande', 'Helvetica Neue', sans-serif;"> &lt;ul&gt; </br> &lt;li&gt;Coffee&lt;/li&gt; </br> &lt;li&gt;Tea&lt;/li&gt;  </br> &lt;li&gt;Milk&lt;/li&gt; </br> &lt;/ul&gt;</p>
                <p style="font-size: 15px; font-family: 'Lucida Grande', 'Helvetica Neue', sans-serif;"> 4. The form will only accept .jpeg image files.</p>

            </div>
        </div>









    </div>  

