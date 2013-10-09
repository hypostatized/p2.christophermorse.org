<?php
class users_controller extends base_controller {

    public function __construct() {
        parent::__construct();
        echo "users_controller construct called<br><br>";
    } 

    public function index() {
        echo "This is the index page";
    }

    public function signup() {
        echo "This is the signup page";
    }

    public function login() {
        echo "This is the login page";
    }

    public function logout() {
        echo "This is the logout page";
    }

    public function profile($user_name = NULL) {

        if($user_name == NULL) {
            echo "No user specified";
        }
        else {
            echo "This is the profile for ".$user_name;
        }
    }

} # end of the class

#admin_users
#search_controller
#follow_user
#unfollow_user
#posts_new } posts controller
#posts_edit } posts controller
#posts_delete } posts controller
#pass in parameters: p2.christophermorse.org/users/profile/chris
#$_GET['ship_on_sunday'] --> p2.christophermorse.org/users/profile/chris?ship_on_sunday=true
#public function shipping($shippingtype, $giftwrap)