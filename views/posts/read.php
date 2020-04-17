
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v6.0"></script>


<div class="row" style='margin-right: 10px; margin-left: 10px'>
    <div class="leftcolumn" >
        <div class="card">
            <?php
            echo '<div>';
            echo '<h1>' . $post->title . '</h1>';
            echo '<img style="width: 100%; max-width: 400px; height: auto;" src="' . $post->mainimage . '"></br>';
            echo '<div style="margin-right:15px">';
            echo '<p> Written by: ' . $user->username . '</p>';
            echo '<p> Category: ' . $post->category . '</p>';
            echo '<p> Difficulty rating: ' . $post->rating . '</p>';
            echo '</div>';
            echo '<p style="border-top: 2px solid black; border-bottom: 2px solid black;"></p>';
            echo '<p>' . $post->content . '</p>';
            echo '<p>Posted on ' . $post->created . '</p>';
            echo '</div>';
            ?>
        

            <div class="responsive" id="gal">
                <div class="gallery">
                    <a target="_blank" href="##">
                        <?php echo '<img src= "' . $post->img1 . '" alt="Gallery1" width="600" height="400">' ?>
                    </a>
                    <div class="desc"><?php echo $post->img1desc ?></div>
                </div>
            </div>


            <div class="responsive" id="gal">
                <div class="gallery">
                    <a target="_blank" href="##">
                        <?php echo '<img src= "' . $post->img2 . '" alt="Gallery2" width="600" height="400">' ?>
                    </a>
                    <div class="desc"><?php echo $post->img2desc ?></div>
                </div>
            </div>

            <div class="responsive" id="gal">
                <div class="gallery">
                    <a target="_blank" href="##">
                        <?php echo '<img src= "' . $post->img3 . '" alt="Gallery3" width="600" height="400">' ?>
                    </a>
                    <div class="desc"><?php echo $post->img3desc ?></div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

        
        <div class="container1">
            <span onclick="this.parentElement.style.display = 'none'" class="closebtn">&times;</span>

            <img id="expandedImg" style="width:100%">
        </div>

    </div>

    <div class="rightcolumn">
        <div class="card">
            <h2>About the author</h2>
            <div style="height:200px;"><img style="height:200px; border-style: solid;" src='<?php echo $user->profilePhoto; ?>' alt=''></div>
            <?php echo '<p>' . $user->firstName . " " . $user->lastName . '</p>'; ?>
        </div>
        <div class="card">
            <h3>Posts by the author:</h3>
            <?php foreach ($posts as $post): ?>
                <tr>
                    <?php
                    echo '<div>';
                    echo '<a href="?controller=post&action=read&id=' . $post->postid . '"><img src="' . $post->mainimage . '" style="height:200px;"></a>';
                    echo '</div>';
                    ?>
                </tr>
            <?php endforeach;?>
        </div>
        <div class="card">
            <h3>Follow Me</h3>
            <p>Link to the author's social media page</p>
        </div>
        <center>
        <div class="card" style="padding-top: 20px;">
            <h3>Share this post on Facebook!</h3>
            <?php
            echo '<div class="fb-share-button" data-href="https://lifesastitch.uk/mvcindex.php?controller=post&action=read&id=' . $post->postid . '" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=lifesastitch.uk/mvcindex.php?controller=post&action=read&id=' . $post->postid . '"  class="fb-xfbml-parse-ignore">Share</a></div>';
            ?>
        </div>
            
        <div class="card" style="padding-top: 20px;">
            <h3>Like this post (if you're logged in)!</h3>

        <?php
        if (isset($_SESSION["loggedin"])) {
            echo '<div style="background-color: #d3c1e6; width: 200px; border: 5px solid black; padding: 50px; margin: 20px; text-align:center">';
            echo '<div>';
            echo '<p style="font-size: 30px; font-family: "Amatic SC", cursive;"><a style="color: red" href="?controller=post&action=like&id=' . $post->postid . '" onclick="pop()"><i class="fa fa-heart"></i></a>' . $post->likes . '</p>';
            echo '</div>';
            echo '</div>';
        } else {
            echo '<div style="background-color: #d3c1e6; width: 200px; border: 5px solid black; padding: 50px; margin: 20px; text-align:center">';
            echo '<div>';
            echo '<p style="font-size: 30px; font-family: "Amatic SC", cursive;"><a style="color: red"><i class="fa fa-heart"></i></a>' . $post->likes . '</p>';
            echo '</div>';
            echo '</div>';
        }
        ?>
        </div>
        </center>
    </div>
</div>

<script>
    function pop() {
        alert("You have liked the post!\nClick OK to go back home.");
    }
    function myFunction(imgs) {
        var expandImg = document.getElementById("expandedImg");
        expandImg.src = imgs.src;
        expandImg.parentElement.style.display = "block";
    }
</script>