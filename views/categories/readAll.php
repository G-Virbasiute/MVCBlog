<div class="row" style='margin-right: 10px; margin-left: 10px'>
    <div class="leftcolumn">
        <div class="card">
            <h3>Here are all our craft categories:</h3>
            <table>
                <?php foreach ($categories as $category): ?>
                    <tr>
                        <td><a href="?controller=post&action=readCategory&id= <?php echo $category->categoryid ?> " style="font-size: 30px; font-family: 'Amatic SC', cursive;"><?= $category->category ?></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    <div class="rightcolumn">
        <div class="card">
            <h2>Events Calendar</h2>
            <div class="fakeimg" style="height:100px;">Put in the calendar here</div>

        </div>
        <div class="card">
            <h3>Card for something else:</h3>
            <div class="fakeimg">Image link to a post</div><br>
            <div class="fakeimg">Image link to a post</div><br>
            <div class="fakeimg">Image link to a post</div>
        </div>
        <div class="card">
            <h3>Follow Us</h3>
            <p>Link to our social media</p>
        </div>
    </div>
</div>
