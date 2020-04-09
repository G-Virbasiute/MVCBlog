<div class="row">
    <div class="leftcolumn">
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