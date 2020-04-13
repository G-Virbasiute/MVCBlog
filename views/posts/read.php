
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v6.0"></script>


<div class="row" style='margin-right: 10px; margin-left: 10px'>
    <div class="leftcolumn" >
        <div class="card">
            <?php
            echo '<div>';
            echo '<h1>' . $post->title . '</h1>';
            echo '<img style="width: auto; height: 400px" src="' . $post->mainimage . '"></br>';
            echo '<p>Written by: ' . $username . '</p>';
            echo '<p>Category: ' . $post->category . '</p>';
            echo '<p>Difficulty rating: ' . $post->rating . '</p>';
            echo '<p>' . $post->content . '</p>';
            echo '<p>Posted on ' . $post->created . '</p>';
            echo '</div>';
            ?>
        </div>
        <div class="card">
            <?php 
                echo '<div class="fb-share-button" data-href="https://lifesastitch.uk/mvcindex.php?controller=post&action=read&id=' . $post->postid .'" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=lifesastitch.uk/mvcindex.php?controller=post&action=read&id=' . $post->postid .'"  class="fb-xfbml-parse-ignore">Share</a></div>';
            ?>
        </div>
        
                <?php
        if (isset($_SESSION["loggedin"])) {
            echo '<div style="background-color: #d3c1e6; width: 200px; border: 5px solid black; padding: 50px; margin: 20px; text-align:center">';
            echo '<div>';
            echo '<p style="font-size: 30px; font-family: "Amatic SC", cursive;"><a style="color: red" href="?controller=post&action=like&id=' .  $post->postid . '" onclick="pop()"><i class="fa fa-heart"></i></a>' . $post->likes . '</p>';
            echo '</div>';
            echo '</div>';
        } else {
            echo '<div style="background-color: #d3c1e6; width: 200px; border: 5px solid black; padding: 50px; margin: 20px; text-align:center">';
            echo '<div>';
            echo '<p style="font-size: 30px; font-family: "Amatic SC", cursive;"><a style="color: red"><i class="fa fa-heart"></i></a>' .  $post->likes . '</p>';
            echo '</div>';
            echo '</div>';
        }
        ?>


    </div>

    <div class="rightcolumn">
        <div class="card">
            <h2>About the author</h2>
            <div class="fakeimg" style="height:100px;">Author's profile picture</div>
            <?php //echo '<p>' . $user->firstName ." ". $user->lastName . '</p>'; ?>
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

<script>
            function pop() {
                alert("You have liked the post!\nClick OK to go back home.");
            }
        </script>