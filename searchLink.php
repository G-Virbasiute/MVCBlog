<?php

   if(isset($_GET['search']))
      $query = $_GET['search'];

       header("Location: http://localhost/FINAL_PROJECT_MVC/mvcindex.php?controller=post&action=search&search={$query}");


?>