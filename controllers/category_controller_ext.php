<?php

class CategoryController {
    public function readAll() {
      $categories = Category::all();
      require_once('views/categories/readAll.php');
    }

    public function read() {
      // we expect a url of form ?controller=posts&action=show&id=x
      // without an id we just redirect to the error page as we need the post id to find it in the database
      if (!isset($_GET['id']))
        return call('pages', 'error');

      try{
      // we use the given id to get the correct post
      $category = Category::find($_GET['id']);
      //require_once('views/posts/read.php');
      }
 catch (Exception $ex){
     return call('pages','error');
 }
    }
    public function create() {
      
      if($_SERVER['REQUEST_METHOD'] == 'GET'){
          require_once('views/categories/create.php');
      }
      else { 
            Category::add();
             
            $categories = Category::all();
            return call('pages', 'home');
      }
      
    }
    public function update() {
        
      if($_SERVER['REQUEST_METHOD'] == 'GET'){
          if (!isset($_GET['id']))
        return call('pages', 'error');

        // we use the given id to get the correct post
        $category = Category::find($_GET['id']);
      
        require_once('views/categories/update.php');
        }
      else
          { 
            $id = $_GET['id'];
            Category::update($id);
                        
            $categories = Category::all();
            return call('pages', 'home');
      }
      
    }
    public function delete() {
            Category::remove($_GET['id']);
            
             //***AMEND THIS URL TO MATCH YOUR PROJECT NAME*** 
            echo '<script>window.location="/mvcindex.php"</script>';   
            }
}
?>

