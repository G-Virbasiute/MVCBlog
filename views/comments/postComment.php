

    <?php foreach ($comments as $comment): ?>
        <tr>
            <?php
            echo '<div class="card">';
            echo '<p>' . $comment->userid . ' said:</p>';
            echo '<p>' . $comment->comment . '</p>';
            echo '<p><br/></p>';
            echo '</div>';
            ?>
        </tr>
    <?php endforeach; ?>

