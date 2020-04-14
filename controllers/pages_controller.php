<?php

class PagesController {
   
    public function home() {
      //example data to use in the home page
      $first_name = 'Lisa';
      $last_name  = 'Simpson';
      require_once('views/pages/home.php');
    }

    public function error() {
      require_once('views/pages/error.php');
    }
    
    public function contact() {
        require_once('views/pages/contact.php');
    }
    
    public function thankyou(){
        require_once('views/pages/thankyou.php');
    }
    
    public function suggest() {
        require_once('views/pages/suggest.php');
    }
    
    public function privacy() {
        require_once('views/pages/privacy.php');
    }
}
