<div class="row" style='margin-right: 10px; margin-left: 10px'>
    <div class="leftcolumn">
        
                <div style="border-top: 2px solid black; border-bottom: 2px solid black; margin-top: 10px">
                <h1 style="margin-left: 15px"> Comments: </h1>
                </div>
        <?php foreach ($comments as $comment): ?>
            <tr>
                <?php
                echo '<div class="card" style="width:50%">';
                echo '<p>' . $comment->username . ' said:</p>';
                echo '<p>' . $comment->comment . '</p>';
                echo '<p> Comment posted on ' . $comment->time . '</p>';
                echo '</div>';
                ?>
            </tr>
        <?php endforeach; ?>
    </div>
</div>