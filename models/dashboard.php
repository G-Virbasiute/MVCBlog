<?php

class Dashboard {

    public $dashboardid;
    public $dashboard;

   function __construct($postid, $userid, $title, $category, $blurb, $mainimage, $content, $rating, $created, $postviews, $poststatus) {
        $this->postid = $postid;
        $this->userid = $userid;
        $this->title = $title;
        $this->category = $category;
        $this->blurb = $blurb;
        $this->mainimage = $mainimage;
        $this->content = $content;
        $this->rating = $rating;
        $this->created = $created;
        $this->postviews = $postviews;
        $this->poststatus = $poststatus;
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
            return $user;
//            return new User($user['UserType'], $user['Username'], $user['ProfilePhoto'], $user['FirstName'], $user['LastName'], $user['EmailAddress'], $user['Password']);
        } else {
            //replace with a more meaningful exception
            throw new Exception('A real exception should go here');
        }
    }
    
    public static function getUserType($id) {
        $db = Db::getInstance();
        $req = $db->prepare('SELECT UserType FROM USER_TABLE WHERE UserID=:id');
        $req->execute(array('id' => $id));
        $usertype = $req->fetch();
        return $usertype['UserType'];
    }
}
?>