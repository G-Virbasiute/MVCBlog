<?php

class CommentController {

    public function postComment() {
        
       if (!isset($_GET['id']))
            return call ('pages', 'error');
        
        try {
            $comments = Comment::postComment($_GET['id']);
            require_once('views/comments/postComment.php');
        } 
        catch (Exception $ex) {
            return call('pages', 'error');

        }
    } 
    
    public function userComment() {
        if (!isset($_GET['id']))
            return call ('pages', 'error');
        
        try {
            $comments = Comment::userComment($_GET['id']);
            require_once('views/posts/userComment.php');
        } 
        catch (Exception $ex) {
            return call('pages', 'error');

        }
    } 
            
    public function create() {
        
        
      if($_SERVER['REQUEST_METHOD'] == 'GET'){
          require_once('views/comments/create.php');
      }
      else { 
            Comment::add($_GET['id']);
      }
      
    }
    
    
    public function delete() {
            Comment::remove($_GET['id']);
      }
    }
  
?>