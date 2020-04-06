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
