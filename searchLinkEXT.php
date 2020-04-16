<?php

   if(isset($_GET['search']))
      $query = $_GET['search'];

       header("Location: /mvcindex.php?controller=post&action=search&search={$query}");


?>