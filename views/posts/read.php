<div class="row">
            <div class="leftcolumn">
                <div class="card">
                    <?php
                    
                        echo '<div>';
                        echo '<h1>' . $post->title . '</h1>';
                        //echo '<p>Written by ' . $post->username . '</p>';
                        echo '<img src="' . $post->mainimage . '">';
                        echo '<p>Category: ' . $post->category . '</p>';
                        echo '<p>Difficulty rating: ' . $post->rating . '</p>';
                        echo '<p>' . $post->content . '</p>';
                        echo '<p>Posted on ' . $post->created . '</p>';
                        echo '</div>';
                    ?>
                </div>
                <div class="card">
                    <button><a href="?controller=comment&action=postComment&id= <?php echo $post->postid?>"> View Comments</a></button>
                </div>
                <div class="card">
                    <button><a href="?controller=comment&action=create&id= <?php echo $post->postid?>"> Write a Comment</a></button>
                </div>
     <!--           <div class="card" id="comment">
                    <a onclick="comment('<?php// echo $post->postid ?>')">
                        <button>View Comments</button>
                    </a>
                </div>
     -->
            </div>
            <div class="rightcolumn">
                <div class="card">
                    <h2>About the author</h2>
                    <div class="fakeimg" style="height:100px;">Author's profile picture</div>
                    <?php //echo '<p>' . $user->firstName ." ". $user->lastName . '</p>';?>
                </div>
                <div class="card">
                    <h3>Other posts by the author:</h3>
                    <div class="fakeimg">Image link to a post</div><br>
                    <div class="fakeimg">Image link to a post</div><br>
                    <div class="fakeimg">Image link to a post</div>
                </div>
                <div class="card">
                    <h3>Follow Me</h3>
                    <p>Link to the author's social media page</p>
                </div>
            </div>
        </div> 
