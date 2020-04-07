<?php

class Comment {

    public $commentid;
    public $postid;
    public $userid;
    public $comment;

    function __construct($commentid, $postid, $userid, $comment) {
        $this->commentid = $commentid;
        $this->postid = $postid;
        $this->userid = $userid;
        $this->comment = $comment;
    }

    
    /* Might be an unnecesary function
     * 
    public static function all() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT CommentID, COMMENTS.UserID, PostID, Comment, Username FROM COMMENTS INNER JOIN USER_TABLE ON Comments.UserID = USER_TABLE.UserID');
        
        foreach ($req->fetchAll() as $comment) {
            $list[] = new Comment($comment['CommentID'], $comment['UserID'], $comment['PostID'], $comment['Comment'], $comment['Username']);
        }
        return $list;
    }
    */
     public static function getUsername($id) {
        $db = Db::getInstance();
        $req = $db->prepare('SELECT Username FROM USER_TABLE WHERE UserID=:id LIMIT 1');
        $req->execute(array('id' => $id));
        $username = $req->fetch();
        return $username['Username'];
    }
    
    public static function postComment($id) {
        $list = [];
        $db = Db::getInstance();
        $id = intval($id);
        $req = $db->prepare('SELECT CommentID,  PostID, COMMENTS.UserID, Comment FROM COMMENTS WHERE PostID = :id');
        $req->execute(array('id' => $id));
        foreach ($req->fetchAll() as $comment) {
            $list[] = new Comment($comment['CommentID'], $comment['PostID'], $comment['UserID'], $comment['Comment']);
        }

        return $list;
    }
    
    public static function userComment($id) {
        $list = [];
        $db = Db::getInstance();
        $id = intval($id);
        $req = $db->prepare('SELECT CommentID, PostID, COMMENTS.UserID, Comment, Username FROM COMMENTS INNER JOIN USER_TABLE ON Comments.UserID = USER_TABLE.UserID WHERE Comments.UserID = :id');
        $req->execute(array('id' => $id));
        foreach ($req->fetchAll() as $comment) {
            $list[] = new Comment($comment['CommentID'], $comment['PostID'], $comment['UserID'], $comment['Comment'], $comment['Username']);
        }

        return $list;
    }

    public static function add($id) {
        $db = Db::getInstance();
        $id = intval($id);
        $req = $db->prepare("INSERT INTO COMMENTS (PostID, UserID, Comment) VALUES ($id, :userid, :comment)");
        $req->bindParam($id, $postid);
        $req->bindParam(':userid', $userid);
        $req->bindParam(':comment', $comment);


        if (isset($_POST[$id]) && $_POST[$id] != "") {
            $filteredPostID = filter_input(INPUT_POST, $id, FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['userid']) && $_POST['userid'] != "") {
            $filteredUserID = filter_input(INPUT_POST, 'userid', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['comment']) && $_POST['comment'] != "") {
            $filteredComment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_SPECIAL_CHARS);
        }

        $postid = $filteredPostID;
        $userid = $filteredUserID;
        $comment = $filteredComment;

        $req->execute();
    }
    

    public static function remove($id) {
        $db = Db::getInstance();
        $id = intval($id);
        $req = $db->prepare('DELETE FROM COMMENTS WHERE CommentID = :id');
        $req->execute(array('id' => $id));
    }

}

?>