<?php

include 'models/comment.php';
include 'models/user.php';

class PostController {

    public function readAll() {
// we store all the posts in a variable
        $posts = Post::all();
        require_once('views/posts/readAll.php');
    }

    public function read() {
// we expect a url of form ?controller=posts&action=show&id=x
// without an id we just redirect to the error page as we need the post id to find it in the database
        if (!isset($_GET['id']))
            return call('pages', 'error');

        try {
// we use the given id to get the correct post
            $post = Post::find($_GET['id']);
            $username = Post::getUsername($post->userid);
            $comments = Comment::postComment($_GET['id']);
            $user = User::findbyid($post->userid);
            require_once('views/posts/read.php');
            require_once('views/comments/postComment.php');
        } catch (Exception $ex) {
            return call('pages', 'error');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_SESSION["loggedin"])) {
            require_once('views/comments/create.php');
        } else if (isset($_SESSION["loggedin"])) {
            Comment::add($_GET['id'], $_SESSION["uid"]);
            $post = Post::find($_GET['id']);
            $comments = Comment::postComment($_GET['id']);

            require_once('views/posts/read.php');
            require_once('views/comments/postComment.php');
            require_once('views/comments/create.php');
        }
    }

    public function search() {

            if (!isset($_GET['search']))
                return call('pages', 'error');
            try {
                $search = $_GET['search'];
                $posts = Post::search($search);
                require_once('views/posts/searchResults.php');
            } catch (Exception $ex) {
                return call ('pages', 'error');
            }
        }
    

    public function readCategory() {
        if (!isset($_GET['id']))
            return call('pages', 'error');

        try {
            $posts = Post::readCategory($_GET['id']);
            require_once('views/posts/readCategory.php');
        } catch (Exception $ex) {
            return call('pages', 'error');
        }
    }

    public function create() {
// we expect a url of form ?controller=products&action=create
// if it's a GET request display a blank form for creating a new blog post
// else it's a POST so add to the database and redirect to readAll action
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require_once('views/posts/create.php');
        } else {
            Post::add($_SESSION["uid"]);

            $posts = Post::all(); //$posts is used within the view
            require_once('views/posts/readAll.php');
        }
    }

    public function update() {

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (!isset($_GET['id']))
                return call('pages', 'error');

// we use the given id to get the correct post
            $post = Post::find($_GET['id']);
            $username = Post::getUsername($_GET['id']);

            require_once('views/posts/update.php');
        }
        else {
            $id = $_GET['id'];
            Post::update($id);

            $posts = Post::all();
            require_once('views/posts/readAll.php');
        }
    }

    public function updateBlogPicture() {

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (!isset($_GET['id']))
                return call('pages', 'error');

// we use the given id to get the correct post
            $post = Post::find($_GET['id']);
            require_once('views/posts/updateblogpicture.php');
        }
        else {
            $id = $_GET['id'];
            Post::updateBlogPicture($id);
            $post = Post::find($_GET['id']);
            $username = Post::getUsername($_GET['id']);
            require_once('views/posts/read.php');
        }
    }

    public function delete() {
        Post::remove($_GET['id']);

        $posts = Post::all();
        require_once('views/posts/readAll.php');
    }

    public function like() {
        Post::like($_GET['id']);
        require_once('views/posts/like.php');
    }

}

?>