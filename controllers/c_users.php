<?php
class users_controller extends base_controller {

    public function __construct() {
        parent::__construct();
    } 

    public function index() {

        $this->template->content = View::instance('v_index_index');
        echo $this->template;
    }

    public function signup() {

        $this->template->content = View::instance('v_users_signup');
        echo $this->template;  
    }

    public function p_signup() {

        # set time of creation
        # hash password and login token for cookie
        $_POST['created'] = Time::now();
        $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
        $_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());

        #add user
        $user_id = DB::instance(DB_NAME)->insert("users", $_POST);
        // DB::instance(DB_NAME)->insert_row('users', $_POST);
        echo "You're signed up.";
        // Router::redirect('/users/login');

    }

    public function login() {

        $this->template->content = View::instance('v_users_login');
        $this->template->title = "Login";
        echo $this->template;
    }

    public function rlogin() {

        $this->template->content = View::instance('v_users_rlogin');
        echo $this->template;        
    }

    public function p_login() {

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

            Router::redirect("/users/login");
        }

        else {

        setcookie("token", $token, strtotime('+1 year'), '/');
        Router::redirect("/users/profile");

        }

    }

    public function logout() {

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

    public function profile() {

    # If user is blank, they're not logged in; redirect them to the login page
        if(!$this->user) {
            Router::redirect('/users/login');
        }
        else {
        $this->template->content = View::instance('v_users_profile');
        $this->template->title = "Profile of".$this->user->username;
        echo $this->template;
        }
        
    }

}

?>