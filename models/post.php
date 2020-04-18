<?php

//these are the file handling errors that show up for image uploads
$phpFileUploadErrors = array(
    0 => 'Successful upload!',
    1 => 'Max filesize in php.ini exceeded',
    2 => 'Max filesize in html exceeded',
    3 => 'Only partial upload',
    4 => 'No file uploaded, note that if you are updating a blog post and did not select a file, this is ok and your image will have stayed the same as before.',
    6 => 'Mising a temporary folder',
    7 => 'Failed to write to disk',
    8 => 'PHP stopped file upload',
);

class Post {

// we define 12 attributes
    public $postid;
    public $userid;
    public $title;
    public $category;
    public $blurb;
    public $mainimage;
    public $content;
    public $rating;
    public $created;
    public $postviews;
    public $poststatus;
    public $likes;
    public $img1;
    public $img1desc;
    public $img2;
    public $img2desc;
    public $img3;
    public $img3desc;
    public $username;

    function __construct($postid, $userid, $title, $category, $blurb, $mainimage, $content, $rating, $created, $postviews, $poststatus, $likes, $img1, $img1desc, $img2, $img2desc, $img3, $img3desc) {
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
        $this->likes = $likes;
        $this->img1 = $img1;
        $this->img1desc = $img1desc;
        $this->img2 = $img2;
        $this->img2desc = $img2desc;
        $this->img3 = $img3;
        $this->img3desc = $img3desc;
    }

    public static function all() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM BLOG_POSTS ORDER BY Created DESC');
// we create a list of Blog Post objects from the database results
        foreach ($req->fetchAll() as $post) {
            $list[] = new Post($post['PostID'], $post['UserID'], $post['Title'], $post['Category'], $post['Blurb'], $post['MainImage'], $post['Content'], $post['DifficultyRating'], $post['Created'], $post['PostViews'], $post['PostStatus'], $post['Likes'], $post['galimg1'], $post['galimg1desc'], $post['galimg2'], $post['galimg2desc'], $post['galimg3'], $post['galimg3desc']);
        }
        return $list;
    }

    public static function find($id) {
        $db = Db::getInstance();
//use intval to make sure $id is an integer
        $id = intval($id);
        $req = $db->prepare('SELECT PostID, BLOG_POSTS.UserID, Title, POST_CATEGORY.Category, Blurb, MainImage, Content, DifficultyRating, Created, PostViews, PostStatus, Likes, galimg1, galimg1desc, galimg2, galimg2desc, galimg3, galimg3desc, USER_TABLE.Username FROM BLOG_POSTS INNER JOIN USER_TABLE ON BLOG_POSTS.UserID = USER_TABLE.UserID INNER JOIN POST_CATEGORY ON BLOG_POSTS.Category = POST_CATEGORY.CategoryID WHERE PostID = :id');
//the query was prepared, now replace :id with the actual $id value
        $req->execute(array('id' => $id));
        $post = $req->fetch();
        if ($post) {
            return new Post($post['PostID'], $post['UserID'], $post['Title'], $post['Category'], $post['Blurb'], $post['MainImage'], $post['Content'], $post['DifficultyRating'], $post['Created'], $post['PostViews'], $post['PostStatus'], $post['Likes'], $post['galimg1'], $post['galimg1desc'], $post['galimg2'], $post['galimg2desc'], $post['galimg3'], $post['galimg3desc'], $post['Username']);
        } else {
//replace with a more meaningful exception
            throw new Exception("We couldn't find that blog post");
        }
    }

    public static function finduserpost($id) {
        $list = [];
        $db = Db::getInstance();
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM BLOG_POSTS WHERE UserID = :id');
        $req->execute(array('id' => $id));
        foreach ($req->fetchAll() as $post) {
            $list[] = new Post($post['PostID'], $post['UserID'], $post['Title'], $post['Category'], $post['Blurb'], $post['MainImage'], $post['Content'], $post['DifficultyRating'], $post['Created'], $post['PostViews'], $post['PostStatus'], $post['Likes'], $post['galimg1'], $post['galimg1desc'], $post['galimg2'], $post['galimg2desc'], $post['galimg3'], $post['galimg3desc']);
        }
        return $list;
    }

    public static function search($search) {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query("SELECT * FROM BLOG_POSTS WHERE CONCAT (Title, Blurb, Content) REGEXP '$search'");
        foreach ($req->fetchAll() as $post) {
            $list[] = new Post($post['PostID'], $post['UserID'], $post['Title'], $post['Category'], $post['Blurb'], $post['MainImage'], $post['Content'], $post['DifficultyRating'], $post['Created'], $post['PostViews'], $post['PostStatus'], $post['Likes'], $post['galimg1'], $post['galimg1desc'], $post['galimg2'], $post['galimg2desc'], $post['galimg3'], $post['galimg3desc']);
        }

        return $list;
    }

    public static function getUsername($id) {
        $db = Db::getInstance();
        $req = $db->prepare('SELECT Username FROM USER_TABLE WHERE UserID=:id');
        $req->execute(array('id' => $id));
        $username = $req->fetch();
        return $username['Username'];
    }

    public static function readCategory($id) {
        $list = [];
        $db = Db::getInstance();
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM BLOG_POSTS WHERE Category = :id');
        $req->execute(array('id' => $id));
        foreach ($req->fetchAll() as $post) {
            $list[] = new Post($post['PostID'], $post['UserID'], $post['Title'], $post['Category'], $post['Blurb'], $post['MainImage'], $post['Content'], $post['DifficultyRating'], $post['Created'], $post['PostViews'], $post['PostStatus'], $post['Likes'], $post['galimg1'], $post['galimg1desc'], $post['galimg2'], $post['galimg2desc'], $post['galimg3'], $post['galimg3desc']);
        }

        return $list;
    }

    public static function update($id) {
        $db = Db::getInstance();
        $req = $db->prepare("Update BLOG_POSTS set Title=:title, Category=:category, Blurb=:blurb, MainImage=:mainimage, Content=:content, DifficultyRating=:rating, galimg1=:galimg1, galimg1desc=:galimg1desc, galimg2=:galimg2, galimg2desc=:galimg2desc, galimg3=:galimg3, galimg3desc=:galimg3desc WHERE PostID=:postid");
        $req->bindParam(':postid', $id);
        $req->bindParam(':title', $title);
        $req->bindParam(':category', $category);
        $req->bindParam(':blurb', $blurb);
        $req->bindParam(':mainimage', $mainimage);
        $req->bindParam(':content', $content);
        $req->bindParam(':rating', $rating);
        $req->bindParam(':galimg1', $galimg1);
        $req->bindParam(':galimg1desc', $galimg1desc);
        $req->bindParam(':galimg2', $galimg2);
        $req->bindParam(':galimg2desc', $galimg2desc);
        $req->bindParam(':galimg3', $galimg3);
        $req->bindParam(':galimg3desc', $galimg3desc);

// set parameters and execute
        if (isset($_POST['title']) && $_POST['title'] != "") {
            $filteredTitle = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['category']) && $_POST['category'] != "") {
            $filteredCategory = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['blurb']) && $_POST['blurb'] != "") {
            $filteredBlurb = filter_input(INPUT_POST, 'blurb', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['content']) && $_POST['content'] != "") {
            $filteredContent = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['rating']) && $_POST['rating'] != "") {
            $filteredRating = filter_input(INPUT_POST, 'rating', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['img1desc']) && $_POST['img1desc'] != "") {
            $filteredImg1desc = filter_input(INPUT_POST, 'img1desc', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['img2desc']) && $_POST['img2desc'] != "") {
            $filteredImg2desc = filter_input(INPUT_POST, 'img2desc', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['img3desc']) && $_POST['img3desc'] != "") {
            $filteredImg3desc = filter_input(INPUT_POST, 'img3desc', FILTER_SANITIZE_SPECIAL_CHARS);
        }

        $title = $filteredTitle;
        $category = $filteredCategory;
        $blurb = $filteredBlurb;
        $mainimage = 'views/images/blogpics/' . $filteredTitle . '0' . '.jpeg';
        $content = $filteredContent;
        $rating = $filteredRating;
        $galimg1 = 'views/images/blogpics/' . $filteredTitle . '1' . '.jpeg';
        $galimg1desc = $filteredImg1desc;
        $galimg2 = 'views/images/blogpics/' . $filteredTitle . '2' . '.jpeg';
        $galimg2desc = $filteredImg2desc;
        $galimg3 = 'views/images/blogpics/' . $filteredTitle . '3' . '.jpeg';
        $galimg3desc = $filteredImg3desc;

        $req->execute();

//upload post image
        Post::uploadMultiFile($title);
    }

    public static function add($userid) {
        $db = Db::getInstance();
        $req = $db->prepare("INSERT INTO BLOG_POSTS(UserID, Title, Category, Blurb, MainImage, Content, DifficultyRating, Created, galimg1, galimg1desc, galimg2, galimg2desc, galimg3, galimg3desc) VALUES ($userid, :title, :category, :blurb, :mainimage, :content, :rating, SYSDATE(), :galimg1, :galimg1desc, :galimg2, :galimg2desc, :galimg3, :galimg3desc)");
//$req->bindParam(':userid', $userid);
        $req->bindParam(':title', $title);
        $req->bindParam(':category', $category);
        $req->bindParam(':blurb', $blurb);
        $req->bindParam(':mainimage', $mainimage);
        $req->bindParam(':content', $content);
        $req->bindParam(':rating', $rating);
        $req->bindParam(':galimg1', $img1);
        $req->bindParam(':galimg1desc', $img1desc);
        $req->bindParam(':galimg2', $img2);
        $req->bindParam(':galimg2desc', $img2desc);
        $req->bindParam(':galimg3', $img3);
        $req->bindParam(':galimg3desc', $img3desc);


// set parameters and execute
//if (isset($_POST['userid']) && $_POST['userid'] != "") {
//   $filteredUserID = filter_input(INPUT_POST, 'userid', FILTER_SANITIZE_SPECIAL_CHARS);
//}
        if (isset($_POST['title']) && $_POST['title'] != "") {
            $filteredTitle = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['category']) && $_POST['category'] != "") {
            $filteredCategory = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['blurb']) && $_POST['blurb'] != "") {
            $filteredBlurb = filter_input(INPUT_POST, 'blurb', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['content']) && $_POST['content'] != "") {
            $filteredContent = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['rating']) && $_POST['rating'] != "") {
            $filteredRating = filter_input(INPUT_POST, 'rating', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['img1desc']) && $_POST['img1desc'] != "") {
            $filteredImg1desc = filter_input(INPUT_POST, 'img1desc', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['img2desc']) && $_POST['img2desc'] != "") {
            $filteredImg2desc = filter_input(INPUT_POST, 'img2desc', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['img3desc']) && $_POST['img3desc'] != "") {
            $filteredImg3desc = filter_input(INPUT_POST, 'img3desc', FILTER_SANITIZE_SPECIAL_CHARS);
        }


        $title = $filteredTitle;
        $category = $filteredCategory;
        $blurb = $filteredBlurb;
        $mainimage = 'views/images/blogpics/' . $filteredTitle . '0' . '.jpeg';
        $content = $filteredContent;
        $rating = $filteredRating;
        $img1 = 'views/images/blogpics/' . $filteredTitle . '1' . '.jpeg';
        $img1desc = $filteredImg1desc;
        $img2 = 'views/images/blogpics/' . $filteredTitle . '2' . '.jpeg';
        $img2desc = $filteredImg2desc;
        $img3 = 'views/images/blogpics/' . $filteredTitle . '3' . '.jpeg';
        $img3desc = $filteredImg3desc;

        $req->execute();

//upload post image
        Post::uploadMultiFile($title);
    }

    const AllowedTypes = ['jpeg', 'JPEG', 'jpg', 'JPG'];
    const InputKey = 'blogpic';

//this is a function which re-keys a multi-dimensional array so it is keyed per file and not per info type, as normal $_FILES arrays are
    public static function reArrayFiles($file_post) {
        $file_ary = array();
        $file_count = count($file_post['name']);
        $file_keys = array_keys($file_post);

        for ($i = 0; $i < $file_count; $i++) {
            foreach ($file_keys as $key) {
                $file_ary[$i][$key] = $file_post[$key][$i];
            }
        }

        return $file_ary;
    }

//function for handling multiple file uploads (warning this function right here is mega)
    public static function uploadMultiFile(string $name) {

        if (empty($_FILES[self::InputKey])) {
            trigger_error("File Missing!");
        } elseif (!empty($_FILES[self::InputKey])) {

//reArrayFiles as defined above, re-structures to a lovely nice array not a horrible $_FILES one 
            $multifiles = self::reArrayFiles($_FILES[self::InputKey]);
        }

//Loop through your lovely re-structure array
        for ($i = 0; $i < count($multifiles); $i++) {
//if there's an error in the new array
            if (($multifiles[$i]['error']) > 0) {
//print out the error messages defined in phpFileUploadErrors file, and this also tells you which file is the issue here.
                echo ($multifiles[$i]['error']) . '-' . ($multifiles[$i]['name']);
            } else {
//if there's no error messages in your array
//find the file extension of your files and look at them
                $file_ext = explode('.', $multifiles[$i]['name']);
                $file_ext = end($file_ext);
                //are your file extensions in the permitted types defined as a constant above?
                if (!in_array($file_ext, self::AllowedTypes)) {
//if not, prints out offending file name and tells you the error
                    echo ($multifiles[$i]['name']) . '-' . 'Invalid file extension; file type not allowed';
                } else {
//if your filetype is definitely allowed, loop through different file names and move them into directory

                    $current_name = ($multifiles[$i]['name']);
                    $tmp_name = ($multifiles[$i]['tmp_name']);
// We define the static final name for uploaded files (in the loop we will add an number to the end)
                    $static_final_name = $name;
//define directory 
                    $path = dirname(__DIR__) . "/views/images/blogpics/";

//move uploaded files
                    if (move_uploaded_file($tmp_name, $path . $static_final_name . $i . "." . $file_ext)) {
                        echo "Image file " . $i . " uploaded successfully!" . "</br>";
                    } else {
                        echo "move_uploaded_file function failed for " . $current_name . "<br>";
                    } if (file_exists($tmp_name)) {
                        unlink($tmp_name);
                    }
                }
            }
        }
    }

    public static function remove($id) {
        $db = Db::getInstance();
//make sure $id is an integer
        $id = intval($id);
        $req = $db->prepare('DELETE FROM BLOG_POSTS WHERE PostID = :id');
// the query was prepared, now replace :id with the actual $id value
        $req->execute(array('id' => $id));
    }

    public static function like($id) {
        $db = Db::getInstance();
        $id = intval($id);
        $req = $db->prepare('UPDATE BLOG_POSTS SET Likes = Likes + 1 WHERE PostID = :id');
        $req->execute(array('id' => $id));
    }

}

?>
