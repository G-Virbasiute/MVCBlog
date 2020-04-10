<?php

class UserController {

    public function readAllUsers() {
        // we store all the users in a variable
        $users = User::all();
        require_once('views/users/readallusers.php');
    }

    public function readUser() {
        // we expect a url of form ?controller=posts&action=show&username=x
        // without a username we just redirect to the error page as we need the post username to find it in the database
        if (!isset($_GET['username']))
            return call('pages', 'error');

        try {
            // we use the given username to get the correct post
            $username = User::find($_GET['username']);
            require_once('views/users/readuser.php');
        } catch (Exception $ex) {
            return call('pages', 'error');
        }
    }

    public function createUser() {
        // we expect a url of form ?controller=users&action=create
        // if it's a GET request display a blank form for creating a new product
        // else it's a POST so add to the database and redirect to readAll action
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require_once('views/users/createuser.php');
        } else {
            User::adduser();
            call('user', 'authUser');
        }
    }

    public function updateUser() {

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (!isset($_SESSION['username']))
                return call('pages', 'error');

            // we use the given username to get the correct user
            $user = User::find($_SESSION['username']);
            require_once('views/users/updateuser.php');
        }
        else {
            $username = $_SESSION['username'];
            User::update($username);

            $users = User::all();
            require_once('views/users/readallusers.php');
        }
    }

    public function updatePicture() {

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (!isset($_SESSION['username']))
                return call('pages', 'error');
            // we use the given username to get the correct user
            $user = User::find($_SESSION['username']);
            require_once('views/users/updatepicture.php');
        }
        else {
            $username = $_SESSION['username'];
            User::updatePicture($username);

            $username = User::find($_SESSION['username']);
            require_once('views/users/readuser.php');
        }
    }

    public function deleteUser() {
        User::remove($_GET['username']);

        $users = User::all();
        require_once('views/users/readallusers.php');
    }

    public function authUser() {

        // Check if the user is already logged in, if yes then redirect them to home page
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
            return call('pages', 'home');
            exit;
        }

        // Expects a url of form ?controller=users&action=authUser
        // If it's a GET request display the login form

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require_once('views/pages/login.php');
        }

        // If it's a POST request, sanitise the input and pass the details to be authenticated           
        else {
            if (isset($_POST['username']) && $_POST['username'] != "") {
                $filteredUsername = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
            }

            if (isset($_POST['password']) && $_POST['password'] != "") {
                $filteredPassword = (filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS));
            }

            $username = $filteredUsername;
            $password = $filteredPassword;

            User::logIn($username, $password);
        }
    }

    public function logOut() {

        User::lOut();
    }

}
