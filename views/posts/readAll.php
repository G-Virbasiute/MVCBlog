<p>Here is a list of all blog posts:</p>

<?php foreach($posts as $post) { ?>
  <p>
    <?php echo $post->title; ?> &nbsp; &nbsp;
    <a href='?controller=post&action=read&id=<?php echo $post->postid; ?>'>See blog information</a> &nbsp; &nbsp;
    <a href='?controller=post&action=delete&id=<?php echo $post->postid; ?>'>Delete blog</a> &nbsp; &nbsp;
    <a href='?controller=post&action=update&id=<?php echo $post->postid; ?>'>Update blog</a> &nbsp;
  </p>
<?php } ?>