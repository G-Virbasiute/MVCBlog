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
        $req = $db->query('SELECT * FROM USER_TABLE ORDER BY UserType');
        // we create a list of User objects from the database results
        foreach ($req->fetchAll() as $user) {
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
        if ($user) {
            return new User($user['UserType'], $user['Username'], $user['ProfilePhoto'], $user['FirstName'], $user['LastName'], $user['EmailAddress'], $user['Password']);
        } else {
            //replace with a more meaningful exception
            throw new Exception('A real exception should go here');
        }
    }
    
        
        public static function findbyid($id) {
        $db = Db::getInstance();
        //use strval to make sure $username is a string
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM USER_TABLE WHERE UserID = :id');
        //the query was prepared, now replace :username with the actual $username value
        $req->execute(array('id' => $id));
        $user = $req->fetch();
        if ($user) {
            return new User($user['UserType'], $user['Username'], $user['ProfilePhoto'], $user['FirstName'], $user['LastName'], $user['EmailAddress'], $user['Password']);
        } else {
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

        if (isset($_POST['firstname']) && $_POST['firstname'] != "") {
            $filteredFirstName = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
        }

        if (isset($_POST['surname']) && $_POST['surname'] != "") {
            $filteredSurname = filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_SPECIAL_CHARS);
        }

        if (isset($_POST['email']) && $_POST['email'] != "") {
            $filteredEmail = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
        }

        $firstname = $filteredFirstName;
        $surname = $filteredSurname;
        $emailaddress = $filteredEmail;
        $req->execute();
    }

        public static function updatebyAdmin($username) {
        $db = Db::getInstance();
        $req = $db->prepare("Update USER_TABLE set UserType=:usertype, FirstName=:firstname, LastName=:surname, EmailAddress=:email where Username=:username");
        $req->bindParam(':usertype', $usertype);
        $req->bindParam(':username', $username);
        $req->bindParam(':firstname', $firstname);
        $req->bindParam(':surname', $surname);
        $req->bindParam(':email', $emailaddress);

        if (isset($_POST['usertype']) && $_POST['usertype'] != "") {
            $filteredUserType = filter_input(INPUT_POST, 'usertype', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        
        if (isset($_POST['firstname']) && $_POST['firstname'] != "") {
            $filteredFirstName = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
        }

        if (isset($_POST['surname']) && $_POST['surname'] != "") {
            $filteredSurname = filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_SPECIAL_CHARS);
        }

        if (isset($_POST['email']) && $_POST['email'] != "") {
            $filteredEmail = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        
        $usertype = $filteredUserType;
        $firstname = $filteredFirstName;
        $surname = $filteredSurname;
        $emailaddress = $filteredEmail;
        $req->execute();
    }

    
    public static function updatePicture($username) {
        $db = Db::getInstance();
        $req = $db->prepare("Update USER_TABLE set ProfilePhoto=:profilephoto where Username=:username");
        $req->bindParam(':username', $username);
        $req->bindParam(':profilephoto', $profilephoto);


        $profilephoto = 'views/images/profilepics/' . $username . '.jpeg';
        $req->execute();

        User::uploadFile($username);
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
        if (isset($_POST['username']) && $_POST['username'] != "") {
            $filteredUsername = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
        }

        if (isset($_POST['firstname']) && $_POST['firstname'] != "") {
            $filteredFirstName = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
        }

        if (isset($_POST['surname']) && $_POST['surname'] != "") {
            $filteredSurname = filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_SPECIAL_CHARS);
        }

        if (isset($_POST['email']) && $_POST['email'] != "") {
            $filteredEmail = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
        }

        if (isset($_POST['password']) && $_POST['password'] != "") {
            $filteredPassword = password_hash((filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS)), PASSWORD_DEFAULT);
        }

        $username = $filteredUsername;
        $profilepic = 'views/images/profilepics/' . $filteredUsername . '.jpeg';
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

    //replace with structured exception handling
    public static function uploadFile(string $name) {

        if (empty($_FILES[self::InputKey])) {
            trigger_error("Please select a profile picture");
        }

        if ($_FILES[self::InputKey]['error'] > 0) {
            trigger_error("There was a problem uploading your profile picture. Please go to your dashboard to upload a picture." . $_FILES[self::InputKey]['error']);
        }

        if (!in_array($_FILES[self::InputKey]['type'], self::AllowedTypes)) {
            trigger_error("File Type Not Allowed: " . $_FILES[self::InputKey]['type']);
        }

        $tempFile = $_FILES[self::InputKey]['tmp_name'];
        //$path = __DIR__ . "../../views/images/profilepics/";
        $path = dirname(__DIR__) . "/views/images/profilepics/";
        $destinationFile = $path . $name . '.jpeg';

        if (!move_uploaded_file($tempFile, $destinationFile)) {
            trigger_error("Your profile picture could not be saved. Please go to your dashboard to upload a picture.");
        }

        //Clean up the temp file
        if (file_exists($tempFile)) {
            unlink($tempFile);
        }

        //Direct newly registered user to login page
        return call('user', 'authUser');
    }

    public static function remove($username) {
        $db = Db::getInstance();
        //make sure $username is a string
        $username = strval($username);
        $req = $db->prepare('SET FOREIGN_KEY_CHECKS=0; delete FROM USER_TABLE WHERE Username = :username');
        // the query was prepared, now replace :username with the actual $username value
        $req->execute(array('username' => $username));
    }

/**   ****ORIGINAL LOGIN FUNCTION****
    public static function logIn($username, $password) {
        $db = Db::getInstance();
        $stmt = $db->prepare("SELECT * FROM USER_TABLE WHERE Username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if (password_verify($password, $user['Password'])) {
            //session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['username'] = filter_input(INPUT_POST, 'username');
            $_SESSION["uid"] = $user['UserID'];
            return call('pages', 'home');
        } else {
            // Display an error message if password is not valid
            echo '<p style="padding-left:20px;padding-top:20px;font-family: \'Amatic SC\', cursive; font-size: 30px;">Your logon details have not been recognised...</p>';
        }
    }
*/
 

    public static function logIn($username, $password) {
        $db = Db::getInstance();
        $stmt = $db->prepare("SELECT * FROM USER_TABLE WHERE Username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();
        
        $username_exists = false;
        $lockout_minutes = 5;
        $login_fail_max = 5;
        $login_fail_count = 0;
        $timestamp = date("Y-m-d H:i:s");
        
        // Checks that the username exists...
        if (count($user) > 1) {
                $userid = $user['UserID'];
                $username_exists = true;
                
                //Checks whether the account is already locked out, and if it is, whether enough time has elapsed for it to be unlocked 
                if ($user['IsLocked'] == 1) {
                    $lock_start_timestamp = $user['LockStartTimestamp'];
                        if ($lock_start_timestamp != NULL) {
                            $dif = (strtotime($timestamp) - strtotime($lock_start_timestamp));
                        if ($dif > $lockout_minutes * 60) {
                            $login_fail_count = 0;
                            $stmt = $db->prepare("UPDATE USER_TABLE SET IsLocked = 0, LoginFailCount = 0, LockStartTimestamp = NULL WHERE UserID = $userid");
                            $stmt->execute();
                        }
                        }
                } 
                else {
                    $login_fail_count = $user['LoginFailCount'];
                }
        
        if ($username_exists) {
            //If the account isn't locked out and the correct password has been given, the login is successful
            $sql = "SELECT * FROM USER_TABLE WHERE Username = '$username'";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $user = $stmt->fetch();
            if (password_verify($password, $user['Password'])) {
            
                if (count($user) > 0) {
                    if ($user["IsLocked"] == 0) {
                        $sql = "UPDATE USER_TABLE SET LoginFailCount = 0 WHERE UserID = $userid";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();
                        // Login Successful
                        $_SESSION['loggedin'] = TRUE;
                        $_SESSION['username'] = $username;
                        $_SESSION["uid"] = $userid;
                        // Refreshes page to remove session info and redirects to home page
                        //***AMEND THIS URL TO MATCH YOUR PROJECT NAME*** 
                        echo '<script>window.location="/mvcindex.php"</script>';

                }    
            }
                
            else {
                // Account is locked. Increment failed login count
                $sql = "UPDATE USER_TABLE SET LoginFailCount = LoginFailCount + 1 WHERE UserID = $userid";
                $stmt = $db->prepare($sql);
                $stmt->execute();
                echo "<pre>Account is locked.</pre>";
                }
            } else {
                // Not Successful. Increment failed login count
                $will_be_locked = ($login_fail_count == $login_fail_max - 1);
                $timestamp = date("Y-m-d H:i:s");
                if ($will_be_locked) {
                    $sql = "UPDATE USER_TABLE SET LoginFailCount = LoginFailCount + 1, IsLocked = 1, LockStartTimestamp = '$timestamp' WHERE UserID = $userid";
                } else {
                    $sql = "UPDATE USER_TABLE SET LoginFailCount = LoginFailCount + 1 WHERE UserID = $userid";
                }
                $stmt = $db->prepare($sql);
                $stmt->execute();
                
                if ($will_be_locked) {
                    echo '<p style="padding-left:20px;padding-top:20px;font-family: \'Amatic SC\', cursive; font-size: 30px;">Sorry sausage fingers, too many attempts. <br>Try again in 5 minutes...</p>';
                } else {
                    $attempts_remaining = ($login_fail_max - ($login_fail_count + 1));
                    if ($attempts_remaining > 0) {
                        echo '<p style="padding-left:20px;padding-top:20px;font-family: \'Amatic SC\', cursive; font-size: 30px;">Your login details have not been recognised. <a href="?controller=user&action=authUser">Try again?</a></p>';
                        
                        if ($attempts_remaining <= 3) {
                           echo '<p style="padding-left:20px;padding-top:20px;font-family: \'Amatic SC\', cursive; font-size: 30px;">Attempts remaining: ' . ($login_fail_max - ($login_fail_count + 1)) . '</p>';
                        }
                    }
                }
            }
        }
        } else {
           echo '<p style="padding-left:20px;padding-top:20px;font-family: \'Amatic SC\', cursive; font-size: 30px;">Your login details have not been recognised. <a href="?controller=user&action=authUser">Try again?</a></p>';
        }
            
    }
    
    
    public static function lOut() {
        // Unset all of the session variables
        $_SESSION = array();

        // Destroy the session.
        session_unset();
        session_destroy();

        // Refreshes page to remove session info and redirects to home page
        //***AMEND THIS URL TO MATCH YOUR PROJECT NAME*** 
        echo '<script>window.location="/mvcindex.php"</script>';
        exit;
    }

    
    public static function genToken($email){
        //Generates a token
        $selector = bin2hex(random_bytes(8));
        $token = random_bytes(32);
        
        //Creates a link to the create password page with the token appended
        //***EDIT THE URL TO MATCH YOUR NETBEANS PROJECT NAME***
        $url = "http://lifesastitch.uk/mvcindex.php?controller=user&action=createNewPassword&selector=" . $selector . "&validator=" . bin2hex($token);
        
        //Sets token expiry to 1hr (in seconds) from now
        $expires = date("U") + 1800;
            
        $db = Db::getInstance(); 
        //Deletes any old tokens associated with the user's email from the db
        $stmt = $db->prepare("DELETE FROM PWD_RESET WHERE pwdResetEmail=?");
        $stmt->execute([$email]);
        //New token is associated with the user's email address and stored it in the db
        $stmt2 = $db->prepare("INSERT INTO PWD_RESET (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (:email, :selector, :token, :expires)");
        $hashedToken = password_hash($token,PASSWORD_DEFAULT);
        $stmt2->bindParam(':email', $email);
        $stmt2->bindParam(':selector', $selector);
        $stmt2->bindParam(':token', $hashedToken);
        $stmt2->bindParam(':expires', $expires);
        $stmt2->execute();
        
        //Emails a password reset link to the user
        $to = $email;
        $subject = 'Reset your password for Life\'s A Stitch';
        $message = '<p>We received a password reset request for your Life\'s A Stitch account. Here\'s the link to reset your password....</p>';
        $message .= '<a href="' . $url . '">' . $url . '</a></p>';
        $message .= '<p>If you didn\'t make this request you can ignore this email.';        
        $message .= '<p>Hope to see you soon!<br>';
        $message .= '<p>Love from,<br>';
        $message .= '<p>Life\'s A Stitch x<br>';
        
        $headers = "From: Life's A Stitch <info@lifesastitch.uk>\r\n";
        $headers .= "Reply-To: info@lifesastitch.uk\r\n";
        $headers .= "Content-type: text/html\r\n";
            
        mail($to, $subject, $message, $headers);
        
        //Tell user to check their email
        //require_once('views/auth/forgotpassword.php?reset=success');
        echo '<p style="padding-left:20px;padding-top:20px;font-family: \'Amatic SC\', cursive; font-size: 30px;">We got this! Please check your email for a password reset link...</p>';
              
    }
        
        
    public static function setNewPassword($selector, $validator, $password) {
        //Initiated by the forgotten password feature
        $currentDate = date("U");
        $db = Db::getInstance();
        //Checks that the token is present in the db and hasn't expired
        $req = $db->prepare("SELECT * FROM PWD_RESET WHERE pwdResetSelector = :selector AND pwdResetExpires >= :currentdate");
        $req->bindParam(':selector', $selector);
        $req->bindParam(':currentdate', $currentDate);
        $req->execute();
        $result = $req->fetch(PDO::FETCH_ASSOC);
        
        $tokenBin = hex2bin($validator);
        $tokenCheck = password_verify($tokenBin, $result["pwdResetToken"]);
            if ($tokenCheck === false) {
                echo "You need to resubmit your reset request";
                exit();
            } 
            elseif ($tokenCheck === true) {
                $tokenEmail = $result['pwdResetEmail'];
                $db = Db::getInstance();
                //Uses the email address to fetch the relevant user info from the db
                $req = $db->prepare("SELECT * FROM USER_TABLE WHERE EmailAddress = :email");
                $req->bindParam(':email', $tokenEmail);
                $req->execute();
            
                $result = $req->fetch(PDO::FETCH_ASSOC);
                //Updates the db with the new password
                $stmt = $db->prepare("UPDATE USER_TABLE SET Password = :password WHERE EmailAddress = :email");
                $newPwdHash =  password_hash($password, PASSWORD_DEFAULT);
                $stmt->bindParam(':password', $newPwdHash);
                $stmt->bindParam(':email', $tokenEmail);
                $stmt->execute();
                //Deletes the used token from the db
                $stmt = $db->prepare("DELETE FROM PWD_RESET WHERE pwdResetEmail = :email");
                $stmt->bindParam(':email', $tokenEmail);
                $stmt->execute();
                //Links the user back to the login page
                echo '<p style="padding-left:20px;padding-top:20px;font-family: \'Amatic SC\', cursive; font-size: 30px;"><a href="?controller=user&action=authUser">Return to login page</a></p>';
                //require_once('views/pages/login.php');
            }  
   
    }
    
    
        public static function resetPW($username, $password) {
            
            $db = Db::getInstance();
            $stmt = $db->prepare("UPDATE USER_TABLE SET password = :password WHERE Username = :username");
            $stmt->bindParam(':password', $password);            
            $stmt->bindParam(':username', $username);
            if ($stmt->execute()){
                // Password updated successfully. Destroy the session, and redirect to login page
                session_unset();
                session_destroy();
                //call('user', 'authUser');
                echo '<p style="padding-left:20px;padding-top:20px;font-family: \'Amatic SC\', cursive; font-size: 30px;">Your password\'s been reset! You can log back in <a href="?controller=user&action=authUser">here</a>.</p>';
                exit();
            } 
            else{
                echo "Something's gone wrong here. Please try again later.";
            }
        
        }
}
