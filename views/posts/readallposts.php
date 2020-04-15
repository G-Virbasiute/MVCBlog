<p>All Posts on 'Life's a Stitch':</p>

<?php foreach($posts as $post) { ?>
  <p>
    <?php echo $post->title ?> &nbsp; &nbsp;
    <a href='?controller=post&action=delete&id=<?php echo $post->postid; ?>'>Delete Post</a> &nbsp; &nbsp;
      </p>
<?php } ?>

