<?php
  class Post {

    // we define 12 attributes
    public $postid;
    public $userid;
    public $title;
    public $blurb;
    public $mainimage;
    public $content;
    public $rating;
    public $created;
    public $published;
    public $updated;
    public $postviews;
    public $poststatus;
    
    function __construct($postid, $userid, $title, $blurb, $mainimage, $content, $rating, $created, $published, $updated, $postviews, $poststatus) {
        $this->postid = $postid;
        $this->userid = $userid;
        $this->title = $title;
        $this->blurb = $blurb;
        $this->mainimage = $mainimage;
        $this->content = $content;
        $this->rating = $rating;
        $this->created = $created;
        $this->published = $published;
        $this->updated = $updated;
        $this->postviews = $postviews;
        $this->poststatus = $poststatus;
    }
     

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM BLOG_POSTS');
      // we create a list of Blog Post objects from the database results
      foreach($req->fetchAll() as $product) {
        $list[] = new Product($product['postid'], $product['userid'], $product['title'],$product['blurb'],$product['mainimage'],$product['content'],$product['rating'],$product['created'],$product['published'],$product['updated'], $product['postviews'],$product['poststatus']);
      }
      return $list;
    }

    public static function find($id) {
      $db = Db::getInstance();
      //use intval to make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM BLOG_POSTS WHERE PostID = :id');
      //the query was prepared, now replace :id with the actual $id value
      $req->execute(array('postid' => $id));
      $product = $req->fetch();
if($product){
      return new Product($product['postid'], $product['userid'], $product['title'],$product['blurb'],$product['mainimage'],$product['content'],$product['rating'],$product['created'],$product['published'],$product['updated'], $product['postviews'],$product['poststatus']);
    }
    else
    {
        //replace with a more meaningful exception
        throw new Exception("We couldn't find that blog post");
    }
    }

public static function update($id) {
    $db = Db::getInstance();
    $req = $db->prepare("Update BLOG_POSTS set UserID=:userid, Title=:title, Blurb=:blurb, MainImage=:mainimage, Content=:content, DifficultyRating=:rating, PostStatus=:poststatus where PostID=:id");
    $req->bindParam(':postid', $id);
    $req->bindParam(':userid', $userid);
    $req->bindParam(':title', $title);
    $req->bindParam(':blurb', $blurb);
    $req->bindParam(':mainimage', $mainimage);
    $req->bindParam(':content', $content);
    $req->bindParam(':rating', $rating);
    $req->bindParam(':poststatus', $poststatus);
    

// set name and price parameters and execute
    if(isset($_POST['userid'])&& $_POST['userid']!=""){
        $filteredUserID = filter_input(INPUT_POST,'userid', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if(isset($_POST['title'])&& $_POST['title']!=""){
        $filteredTitle = filter_input(INPUT_POST,'title', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if(isset($_POST['blurb'])&& $_POST['blurb']!=""){
        $filteredBlurb = filter_input(INPUT_POST,'blurb', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if(isset($_POST['content'])&& $_POST['content']!=""){
        $filteredContent = filter_input(INPUT_POST,'content', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if(isset($_POST['rating'])&& $_POST['rating']!=""){
        $filteredRating = filter_input(INPUT_POST,'rating', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if(isset($_POST['poststatus'])&& $_POST['poststatus']!=""){
        $filteredPostStatus = filter_input(INPUT_POST,'poststatus', FILTER_SANITIZE_SPECIAL_CHARS);
    }
$userid = $filteredUserID;
$title = $filteredTitle;
$blurb = $filteredBlurb;
$content = $filteredContent;
$rating = $filteredRating;
$poststatus = $filteredPostStatus;

$req->execute();

//upload product image if it exists (not sure which paramente use for this)
        if (!empty($_FILES[self::InputKey]['mainimage'])) {
		Product::uploadFile($mainimage);
	}

    }
    
    public static function add() {
    $db = Db::getInstance();
    $req = $db->prepare("INSERT INTO BLOG_POSTS(UserID, Title, Blurb, Content, DifficultyRating, Created) VALUES (:userid, :title, :blurb, :mainimage, :content, :rating, current_timestamp())");
    $req->bindParam(':userid', $userid);
    $req->bindParam(':title', $title);
    $req->bindParam(':blurb', $blurb);
    $req->bindParam(':content', $content);
    $req->bindParam(':rating', $rating);
    

// set parameters and execute
    if(isset($_POST['userid'])&& $_POST['userid']!=""){
        $filteredUserID = filter_input(INPUT_POST,'userid', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if(isset($_POST['title'])&& $_POST['title']!=""){
        $filteredTitle = filter_input(INPUT_POST,'title', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if(isset($_POST['blurb'])&& $_POST['blurb']!=""){
        $filteredBlurb = filter_input(INPUT_POST,'blurb', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if(isset($_POST['content'])&& $_POST['content']!=""){
        $filteredContent = filter_input(INPUT_POST,'content', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if(isset($_POST['rating'])&& $_POST['rating']!=""){
        $filteredRating = filter_input(INPUT_POST,'rating', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    
$userid = $filteredUserID;
$title = $filteredTitle;
$blurb = $filteredBlurb;
$content = $filteredContent;
$rating = $filteredRating;

$req->execute();

//upload product image
Product::uploadFile($title);
    }

const AllowedTypes = ['image/jpeg', 'image/jpg'];
const InputKey = 'myUploader';

//die() function calls replaced with trigger_error() calls
//replace with structured exception handling
public static function uploadFile(string $name) {

	if (empty($_FILES[self::InputKey])) {
		//die("File Missing!");
                trigger_error("File Missing!");
	}

	if ($_FILES[self::InputKey]['error'] > 0) {
		trigger_error("Handle the error! " . $_FILES[InputKey]['error']);
	}


	if (!in_array($_FILES[self::InputKey]['type'], self::AllowedTypes)) {
		trigger_error("File Type Not Allowed: " . $_FILES[self::InputKey]['type']);
	}

	$tempFile = $_FILES[self::InputKey]['tmp_name'];
        $path = "C:/xampp/htdocs/MVCBlog/images/";
	$destinationFile = $path . $title . '.jpeg';

	if (!move_uploaded_file($tempFile, $destinationFile)) {
		trigger_error("Handle Error");
	}
		
	//Clean up the temp file
	if (file_exists($tempFile)) {
		unlink($tempFile); 
	}
}
public static function remove($id) {
      $db = Db::getInstance();
      //make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('DELTE FROM BLOG_POSTS PostID = :id');
      // the query was prepared, now replace :id with the actual $id value
      $req->execute(array('PostID' => $id));
  }
  
}
?>