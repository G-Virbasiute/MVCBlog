<?php

include 'models/post.php';
include 'models/user.php';
include 'models/category.php';

//'delete', 'createPost', 'updateDetails', 'deletePost'
class DashboardController {
    public function read() {
        $posts = Post::finduserpost($_SESSION['uid']);
        $username = Dashboard::find($_SESSION['username']);
        $usertype = Dashboard::getUserType($_SESSION['uid']);
        $allposts = Post::all();
        $users = User::all();
        $categories = Category::all();


        if($usertype == 'Member') {
          require_once('views/dashboard/member.php');
        }
        elseif ($usertype == 'Writer'){
            require_once('views/dashboard/writer.php');
        }
        elseif ($usertype == 'Administrator'){
            require_once('views/dashboard/admin.php');
        }
        else {
            return call('pages', 'error');
        }
    }
}