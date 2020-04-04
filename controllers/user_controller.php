<?php

class UserController {
    public function readAllUsers() {
      // we store all the users in a variable
      $users = User::all();
      require_once('views/users/readallusers.php');
    }

    public function readUser() {
      // we expect a url of form ?controller=posts&action=show&username=x
      // without a username we just redirect to the error page as we need the post username to find it in the database
      if (!isset($_GET['username']))
        return call('pages', 'error');
      
      try{
      // we use the given username to get the correct post
      $username = User::find($_GET['username']);
      require_once('views/users/readuser.php');
      }
 catch (Exception $ex){
     return call('pages','error');
 }
    }
    public function createUser() {
      // we expect a url of form ?controller=users&action=create
      // if it's a GET request display a blank form for creating a new product
      // else it's a POST so add to the database and redirect to readAll action
      if($_SERVER['REQUEST_METHOD'] == 'GET'){
          require_once('views/users/createuser.php');
      }
      else { 
            User::adduser();
             
            $users = User::all(); //$users is used within the view
            require_once('views/users/readallusers.php');
      }
      
    }
    public function updateUser() {
        
      if($_SERVER['REQUEST_METHOD'] == 'GET'){
          if (!isset($_GET['username']))
        return call('pages', 'error');

        // we use the given username to get the correct user
        $user = User::find($_GET['username']);     
        require_once('views/users/updateuser.php');
        }
      else
          { 
            $username = $_GET['username'];
            User::update($username); 
            
            $users = User::all();
            require_once('views/users/readallusers.php');
      }
      
    }
    public function deleteUser() {
            User::remove($_GET['username']);
            
            $users = User::all();
            require_once('views/users/readallusers.php');
      }
      
    }
  

    

