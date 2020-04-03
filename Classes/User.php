<?php

//Do we need an include statement here to connect another class?


//Regex to validate login username and email:
define('USERNAME_REGEX', '%[^a-z0-9\-\[\]\.\_=!\$\%\^&*(){}?@#$+\'"\/]+%is');
define('EMAIL_REGEX', '%[a-z0-9._-]+@[a-z0-9_-]+\.[a-z.]+%i');



class User {
    
    public $username;
    public $firstname;
    public $lastname;
    public $emailaddress;
    public $profilephoto;
    
    private $password;
    
    protected $userID;          //not yet linked anywhere below
    protected $usertype;        //not yet linked anywhere below
    
    public $role = 'Admin';     //not yet linked anywhere below
    

    public function __construct($username, $firstname, $lastname, $emailaddress, $profilephoto, $password) {
      
      $this->username = $username;
      $this->firstname = $firstname;  
      $this->lastname = $lastname;
      $this->emailaddress = $emailaddress;
      $this->profilephoto = $profilephoto;
      
      $this->password = $password;
    }
    
    public function setUsername($username) {
    $this->usernameame = $username;
    }
    
    public function setFirstname($firstname) {
    $this->firstname = $firstname;
    }
    
    public function setLastname($lastname) {
    $this->emailaddress = $lastname;
    }
    
    public function setProfilephoto($profilephoto) {
    $this->profilephoto = $profilephoto;
    }
    
    public function setPassword($password) {
    $this->phonenumber = $password;
    }
    
 
    
    public function setEmailAddress($emailddress) {
    if(strpos($emailaddress, '@') > -1){
    $this->emailaddress = $emailaddress;
    }
    }

    public function getEmailAddress() {
    return $this->emailaddress;
    }
    
}
        ?>