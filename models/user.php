<?php

class User {
    
    private $userID;
    public $userType;
    public $username;
    public $profilePhoto;
    public $firstName;
    public $lastName;
    public $emailAddress;
    private $password;

   
    public function __construct($usertype, $username, $profilephoto, $firstname, $lastname, $emailaddress, $password) {

      $this->userType = $usertype;
      $this->username = $username;
      $this->profilePhoto = $profilephoto;      
      $this->firstName = $firstname;  
      $this->lastName = $lastname;
      $this->emailAddress = $emailaddress;
      $this->password = $password;
    }

     
    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM USER_TABLE');
      // we create a list of User objects from the database results
      foreach($req->fetchAll() as $user) {
        $list[] = new User($user['UserType'], $user['Username'], $user['ProfilePhoto'], $user['FirstName'], $user['LastName'], $user['EmailAddress'], $user['Password']);
      }
      return $list;
    }

    
    public static function find($username) {
      $db = Db::getInstance();
      //use strval to make sure $username is a string
      $username = strval($username);
      $req = $db->prepare('SELECT * FROM USER_TABLE WHERE Username = :username');
      //the query was prepared, now replace :username with the actual $username value
      $req->execute(array('username' => $username));
      $user = $req->fetch();
        if($user){
            return new User($user['UserType'], $user['Username'], $user['ProfilePhoto'], $user['FirstName'], $user['LastName'], $user['EmailAddress'], $user['Password']);
        }
        else
        {
        //replace with a more meaningful exception
        throw new Exception('A real exception should go here');
        }
    }

    
    
    public static function update($username) {
        $db = Db::getInstance();
        $req = $db->prepare("Update USER_TABLE set FirstName=:firstname, LastName=:surname, EmailAddress=:email where Username=:username");
        $req->bindParam(':username', $username);
        $req->bindParam(':firstname', $firstname);
        $req->bindParam(':surname', $surname);
        $req->bindParam(':email', $emailaddress);
   
        if(isset($_POST['firstname'])&& $_POST['firstname']!=""){
            $filteredFirstName = filter_input(INPUT_POST,'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
        }
    
        if(isset($_POST['surname'])&& $_POST['surname']!=""){
            $filteredSurname = filter_input(INPUT_POST,'surname', FILTER_SANITIZE_SPECIAL_CHARS);
        }
    
        if(isset($_POST['email'])&& $_POST['email']!=""){
            $filteredEmail = filter_input(INPUT_POST,'email', FILTER_SANITIZE_SPECIAL_CHARS);
        }

        $firstname = $filteredFirstName;
        $surname = $filteredSurname;
        $emailaddress = $filteredEmail;
        $req->execute();

        //upload user profile pic if it exists
        //BLAHBLAHBLAH
	//}

    }
    
   
    public static function addUser() {
        
        $db = Db::getInstance();
        $req = $db->prepare("Insert into USER_TABLE (Username, ProfilePhoto, FirstName, LastName, EmailAddress, Password) values (:username, :profilepic, :firstname, :surname, :email, :password)");
        $req->bindParam(':username', $username);
        $req->bindParam(':firstname', $firstname);
        $req->bindParam(':surname', $surname);
        $req->bindParam(':email', $emailaddress);
        $req->bindParam(':profilepic', $profilepic);    
        $req->bindParam(':password', $password);

        // set parameters and execute
        if(isset($_POST['username'])&& $_POST['username']!=""){
            $filteredUsername = filter_input(INPUT_POST,'username', FILTER_SANITIZE_SPECIAL_CHARS);
        }
    
        if(isset($_POST['firstname'])&& $_POST['firstname']!=""){
            $filteredFirstName = filter_input(INPUT_POST,'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
        }
    
        if(isset($_POST['surname'])&& $_POST['surname']!=""){
            $filteredSurname = filter_input(INPUT_POST,'surname', FILTER_SANITIZE_SPECIAL_CHARS);
        }
    
        if(isset($_POST['email'])&& $_POST['email']!=""){
            $filteredEmail = filter_input(INPUT_POST,'email', FILTER_SANITIZE_SPECIAL_CHARS);
        }
    
        if(isset($_POST['password'])&& $_POST['password']!=""){
            $filteredPassword = password_hash((filter_input(INPUT_POST,'password', FILTER_SANITIZE_SPECIAL_CHARS)), PASSWORD_DEFAULT);
        }
        
        $username = $filteredUsername;
        $profilepic = 'views/images/profilepics/'.$filteredUsername.'.jpeg';
        $firstname = $filteredFirstName;
        $surname = $filteredSurname;
        $emailaddress = $filteredEmail;
        $password = $filteredPassword;
        $req->execute();

        //call upload file function to upload the profile pic
        User::uploadFile($username);
    }

        
    const AllowedTypes = ['image/jpeg', 'image/jpg'];
    const InputKey = 'profilepic';

    //die() function calls replaced with trigger_error() calls
    //replace with structured exception handling
    public static function uploadFile(string $name) {
            
        if (empty($_FILES[self::InputKey])) {
            trigger_error("File Missing!");
        }

        if ($_FILES[self::InputKey]['error'] > 0) {
            trigger_error("Handle the error! " . $_FILES[InputKey]['error']);
        }

        if (!in_array($_FILES[self::InputKey]['type'], self::AllowedTypes)) {
            trigger_error("Handle File Type Not Allowed: " . $_FILES[self::InputKey]['type']);
        }

        $tempFile = $_FILES[self::InputKey]['tmp_name'];
        $path = __DIR__ . "../../views/images/profilepics/";
        $destinationFile = $path . $name . '.jpeg';

        if (!move_uploaded_file($tempFile, $destinationFile)) {
		trigger_error("Handle Error");
        }
		
        //Clean up the temp file
        if (file_exists($tempFile)) {
            unlink($tempFile); 
        }
    }
    
    
    public static function remove($username) {
      $db = Db::getInstance();
      //make sure $username is a string
      $username = strval($username);
      $req = $db->prepare('delete FROM USER_TABLE WHERE Username = :username');
      // the query was prepared, now replace :username with the actual $username value
      $req->execute(array('username' => $username));
    }
     
}
      

