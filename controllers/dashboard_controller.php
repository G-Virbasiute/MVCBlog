<?php

//'delete', 'createPost', 'updateDetails', 'deletePost'
class DashboardController {
    public function read() {

      $username = Dashboard::find($_SESSION['username']);
      $usertype = Dashboard::getUserType($_SESSION['uid']);
      
      
    if($usertype == 'Member') {
      require_once('views/dashboard/read.php');
    }
    elseif ($usertype == 'Writer'){
        require_once('views/dashboard/writer_dashboard.php');
    }
    elseif ($usertype == 'Admin'){
        require_once('views/dashboard/admin_dashboard.php');
    }
    else {
        return call('pages', 'error');
    }
}
}