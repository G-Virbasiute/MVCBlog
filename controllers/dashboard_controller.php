<?php


//'delete', 'createPost', 'updateDetails', 'deletePost'
class DashboardController {
    public function read() {
      $categories = Category::all();
      require_once('views/dashboard/read.php');
    }

    public function create() {
        // we expect a url of form ?controller=products&action=create
        // if it's a GET request display a blank form for creating a new blog post
        // else it's a POST so add to the database and redirect to readAll action
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            //require_once('views/posts/create.php');
        }
        else { 
            Category::add();
             
            $categories = Category::all(); //$posts is used within the view
            //require_once('views/posts/readAll.php');
        }
    }
    public function update() {
        
      if($_SERVER['REQUEST_METHOD'] == 'GET'){
          if (!isset($_GET['id']))
        return call('pages', 'error');

        // we use the given id to get the correct post
        $category = Category::find($_GET['id']);
      
        //require_once('views/posts/update.php');
        }
      else
          { 
            $id = $_GET['id'];
            Category::update($id);
                        
            $categories = Category::all();
            //require_once('views/posts/readAll.php');
      }
      
    }
    public function delete() {
            Category::remove($_GET['id']);
            
            $categories = Category::all();
            //require_once('views/posts/readAll.php');
      }
      
    }
  
?>
