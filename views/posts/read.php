<div class="row">
            <div class="leftcolumn">
                <div class="card">
                    <?php
                    
                        echo '<div>';
                        echo '<h1>' . $post->title . '</h1>';
                        //echo '<p>Written by ' . $post->username . '</p>';
                        echo '<img style="width: auto; height: 400px" src="' . $post->mainimage . '">';
                        echo '<p>Category: ' . $post->category . '</p>';
                        echo '<p>Difficulty rating: ' . $post->rating . '</p>';
                        echo '<p>' . $post->content . '</p>';
                        echo '<p>Posted on ' . $post->created . '</p>';
                        echo '</div>';
                    ?>
                </div>
                <div style="border-top: 2px solid black; border-bottom: 2px solid black; margin-top: 10px">
                <h1 style="margin-left: 15px"> Comments: </h1>
                </div>
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
