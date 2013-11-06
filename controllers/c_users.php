<?php
class users_controller extends base_controller {
    public
    function __construct() {
        parent::__construct();
    }

    public
    function viewProfile($whatuser) {

        if(!$this->user) {
            Router::redirect('/users/login');
        } else {

            $this_user = $whatuser;
            $this->template->content = View::instance('v_posts_viewProfile');
            $this->template->title = "Profile of " . $whatuser;

            $q = "SELECT users.about, users.location, users.avatar
            FROM users 
            WHERE users.username = '".$this_user."'";

            $f = "SELECT
            posts.content,
            posts.created,
            posts.user_id,
            posts.avatar,
            posts.username
            FROM posts 
            WHERE posts.username = '".$this_user."' 
            ORDER BY posts.created DESC";


# Run the query, store the results in the variable $posts
            $this_posts = DB::instance(DB_NAME)->select_rows($f);
            $this_profile = DB::instance(DB_NAME)->select_row($q);
            $this->template->content->this_profile = $this_profile;
            $this->template->content->this_posts = $this_posts;
            echo $this->template;

        }
    }

    public
    function index() {
        $this->template->content = View::instance('v_index_index');
        $this->template->title = "Shaberi";
        echo $this->template;
    }

    public
    function signup($error) {

        $this->template->content = View::instance('v_users_signup');
        $this->template->title = "Sign up";
        $this->template->content->error = $error;
        echo $this->template;
    }

    public
    function p_signup() {
# set time of creation
# hash password and login token for cookie
        $_POST['created'] = Time::now();
        $_POST['avatar'] = "shaberi.png";
        $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
        $_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());

# check for user with the same name        
        $username = $_POST['username'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $q = "SELECT username 
        FROM users 
        WHERE username = '".$username."'";

        $result = DB::instance(DB_NAME)->select_row($q);

        if($result){
            Router::redirect('/users/signup/username');
        }

        else{
            if(!$email || !$first_name || !$last_name || !$email || !$password){
                Router::redirect('/users/signup/form');
            }
            else {
#add user
                $user_id = DB::instance(DB_NAME)->insert("users", $_POST);
                Router::redirect('/users/login');
            }
        }

    }


    public
    function login($error = NULL) {
        $this->template->content = View::instance('v_users_login');
        $this->template->title = "Login";
        $this->template->content->error = $error;
        echo $this->template;
    }

    public
    function p_login() {
# sanitize user entry data
        $_POST = DB::instance(DB_NAME)->sanitize($_POST);
# hash password for comparison with DB
        $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
# search database for username and password that match
# retrieve token if exists
        $q = "SELECT token 
        FROM users 
        WHERE username = '".$_POST['username']."' 
        AND password = '".$_POST['password']."'";

        $token = DB::instance(DB_NAME)->select_field($q);

        if(!$token) {
            Router::redirect("/users/login/error");
        } else {
            setcookie("token", $token, strtotime('+1 year'), '/');
            Router::redirect("/users/profile");
        }

    }

    public
    function logout() {
# Generate and save a new token for next login
        $new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());
# Create the data array we'll use with the update method
# In this case, we're only updating one field, so our array only has one entry
        $data = Array("token" => $new_token);
# Do the update
        DB::instance(DB_NAME)->update("users", $data, "WHERE user_id = '".$this->user->user_id."'");
# Delete their token cookie by setting it to a date in the past - effectively logging them out
        setcookie("token", "", strtotime('-1 year'), '/');
# Send them back to the main index.
        Router::redirect("/");
    }

    public
    function profile() {
# If user is blank, they're not logged in; redirect them to the login page

        if(!$this->user) {
            Router::redirect('/users/login');
        } else {
            $this->template->content = View::instance('v_users_profile');
            $this->template->title = "Profile of " . $this->user->username;
            $q = 'SELECT
            posts.content,
            posts.created,
            posts.user_id,
            posts.avatar
            FROM posts
            WHERE posts.user_id = '.$this->user->user_id .'
            ORDER BY posts.created DESC' ;
# Run the query, store the results in the variable $posts
            $posts = DB::instance(DB_NAME)->select_rows($q);
# Pass data to the View
            $this->template->content->posts = $posts;
# Render the View
            echo $this->template;
        }

    }

    public
    function editProfile($error = NULL) {

        if(!$this->user) {
            Router::redirect('/users/login');
        } else {
# Setup view
            $this->template->content = View::instance('v_users_editProfile');
            $this->template->content->error = $error;
            $this->template->title   = "Edit Profile";
# Render template
            echo $this->template;
        }

    }

    public
    function p_editProfile() {

        if(!$this->user) {
            Router::redirect('/users/login');
        } else {
# sanitize user entry data
            $_POST = DB::instance(DB_NAME)->sanitize($_POST);
            $location = Array("location" => $_POST['location']);
            $about = Array("about" => $_POST['about']);
            DB::instance(DB_NAME)->update("users", $location, "WHERE user_id = '".$this->user->user_id."'");
            DB::instance(DB_NAME)->update("users", $about, "WHERE user_id = '".$this->user->user_id."'");
            Router::redirect('/users/profile');
        }

    }

    public
    function myImg() {

        if(!$this->user) {
            Router::redirect('/users/login');
        } else {
            $this->template->content = View::instance('v_users_myImg');
            $this->template->title = "Upload a Profile Picture";
            echo $this->template;
        }

    }

    public
    function pMyImg() {

        if(!$this->user) {
            Router::redirect('/users/login');
        } 
        else {
            $this_user = $this->user->username;
# get file extension
            $ext = strtolower(substr(strrchr($_FILES["file"]["name"], '.'), 1));
# generate random string for filename
            $img = Utils::generate_random_string(10);
            $newFile = $img . "." . $ext;
            $avatar = Array("avatar" => $newFile);    
            Upload::upload($_FILES, "/uploads/avatars/", array("jpg", "jpeg", "gif", "png"), $img);
            DB::instance(DB_NAME)->update("users", $avatar, "WHERE user_id = '".$this->user->user_id."'");
            DB::instance(DB_NAME)->update("posts", $avatar, "WHERE user_id = '".$this->user->user_id."'");            
            Router::redirect('/users/profile');
        }

    }

}

?>