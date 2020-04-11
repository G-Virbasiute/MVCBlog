<?php

   if(isset($_GET['search']))
      $query = $_GET['search'];

       header("Location: https://lifesastitch.uk/mvcindex.php?controller=post&action=search&search={$query}");

?>