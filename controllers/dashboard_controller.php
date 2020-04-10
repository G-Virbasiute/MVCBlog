<?php

//'delete', 'createPost', 'updateDetails', 'deletePost'
class DashboardController {
    public function read() {
//         if (!isset($_GET['mariaflan']))
//        return call('pages', 'error');
      // we use the given username to get the correct post
//      $username = User::find($_GET['username']);
      $username = Dashboard::find($_SESSION['username']);  
      require_once('views/dashboard/read.php');
    }
}

