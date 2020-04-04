<p>Registered Users:</p>

<?php foreach($users as $user) { ?>
  <p>
    <?php echo $user->firstName. ' '. $user->lastName; ?> &nbsp; &nbsp;
    <a href='?controller=user&action=readUser&username=<?php echo $user->username; ?>'>See User Information</a> &nbsp; &nbsp;
    <a href='?controller=user&action=deleteUser&username=<?php echo $user->username; ?>'>Delete User</a> &nbsp; &nbsp;
    <a href='?controller=user&action=updateUser&username=<?php echo $user->username; ?>'>Update User</a> &nbsp;
  </p>
<?php } ?>

