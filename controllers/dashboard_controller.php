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
    
   
    public static function update($username) {
        $db = Db::getInstance();
        $req = $db->prepare("Update USER_TABLE set ProfilePhoto=:profilephoto, FirstName=:firstname, LastName=:surname, EmailAddress=:email where Username=:username");
        $req->bindParam(':username', $username);
        $req->bindParam(':profilephoto', $profilephoto);
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
        $profilephoto = 'views/images/profilepics/' . $username . '.jpeg';
        $emailaddress = $filteredEmail;
        $req->execute();

        User::uploadFile($username);
    }
    
    public function delete() {
        // todo
    }
    
    public function deletePost() {
        // todo
    }
      
    }
  
?>
