<style>
    .fa {
  padding: 20px;
  font-size: 30px;
  height: 100%;
  width: 25%;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
  border-radius: 50%;
}
.fa-youtube {
  background: #bb0000;
  color: white;
}

.fa-instagram {
  background: #125688;
  color: white;
}
</style>
<div class="row" style='margin-right: 10px; margin-left: 10px'>
    <div class="leftcolumn">
        <div class="card">
            <table>
                <?php foreach ($posts as $post): ?>
                    <tr>
                        <?php
                        echo '<div>';
                        echo '<h1><a href="?controller=post&action=read&id=' . $post->postid . '">' . $post->title . '</a></h1>';
                        echo '<p>Posted on ' . ($post->created) . '</p>';
                        echo '<p>' . $post->blurb . '</p>';
                        echo '<button><a href="?controller=post&action=read&id=' . $post->postid . '">Read More</a></button>';
                        echo '<p><br/></p>';
                        echo '</div>';
                        ?>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    <div class="rightcolumn">
        <div class="card">
            <h2>Events Calendar</h2>
            <p style="margin-top: 30px;"><iframe style=" width: 100%" src="https://calendar.google.com/calendar/embed?height=300&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=Europe%2FLondon&amp;src=Y2c3dWt2c2t2MTY0cjJiNm9xZmtnbG9wdG9AZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;color=%238E24AA&amp;showTz=0" style="border:solid 1px #777" width="400" height="300" frameborder="0" scrolling="no"></iframe></p>
        </div>
        <div class="card">
            <h3>Card for something else:</h3>
            <div class="fakeimg">Image link to a post</div><br>
            <div class="fakeimg">Image link to a post</div><br>
            <div class="fakeimg">Image link to a post</div>
        </div>
        <div class="card">
            <h3>Follow Us</h3>
            <div>
    <a href="https://www.youtube.com/channel/UCFtOhloeiDNyVMDLRgZpGuw?view_as=subscriber" class="fa fa-youtube"></a>
    <a href="https://www.instagram.com/lifesa2020stitch/" class="fa fa-instagram"></i></a>
    </div>
            </div>
    </div>
</div>