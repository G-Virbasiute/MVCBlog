<?php


//'delete', 'createPost', 'updateDetails', 'deletePost'
class DashboardController {
    public function read() {
      $categories = Category::all();
      require_once('views/dashboard/read.php');
    }

    public function createPost() {
        // todo
    }
    
    public function updateDetails() {
        // todo
    }
    public function delete() {
        // todo
    }
    
    public function deletePost() {
        // todo
    }
      
    }
  
?>
