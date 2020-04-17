<?php

class Category {

    public $categoryid;
    public $category;
    
    function __construct($categoryid, $category) {
        $this->categoryid = $categoryid;
        $this->category = $category;
    }

    public static function all() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM POST_CATEGORY');
        foreach ($req->fetchAll() as $category) {
            $list[] = new Category($category['CategoryID'], $category['Category']);
        }
        return $list;
    }

    public static function find($id) {
        $db = Db::getInstance();
        //use intval to make sure $id is an integer
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM POST_CATEGORY WHERE CategoryID = :id');
        //the query was prepared, now replace :id with the actual $id value
        $req->execute(array('id' => $id));
        $category = $req->fetch();
        if ($category) {
            return new Category($category['CategoryID'], $category['Category']);
        } else {
            //replace with a more meaningful exception
            throw new Exception("We couldn't find that category");
        }
    }

    public static function update($id) {
        $db = Db::getInstance();
        $req = $db->prepare("Update POST_CATEGORY set Category=:category WHERE CategoryID = $id");
        $req->bindParam(':category', $category);


// set parameters and execute
        if (isset($_POST['category']) && $_POST['category'] != "") {
            $filteredCategory = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_SPECIAL_CHARS);
        }

       
        $category = $filteredCategory;
        $req->execute();

    }

    public static function add() {
        $db = Db::getInstance();
        $req = $db->prepare("INSERT INTO POST_CATEGORY(Category) VALUES (:category)");
        $req->bindParam(':category', $category);

        echo $category;
             
// set parameters and execute
        if (isset($_POST['category']) && $_POST['category'] != "") {
            $filteredCategory = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        
        $category = $filteredCategory;

        $req->execute();

    }

    public static function remove($id) {
        $db = Db::getInstance();
        //make sure $id is an integer
        $id = intval($id);
        $req = $db->prepare('DELETE FROM POST_CATEGORY WHERE CategoryID = :id');
        // the query was prepared, now replace :id with the actual $id value
        $req->execute(array('id' => $id));
    }

}

?>