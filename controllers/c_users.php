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

        $q = "SELECT token FROM users WHERE username = '".$_POST['username']."' AND password = '".$_POST['password']."'";
        echo DB::instance(DB_NAME)->select_field($q);

        # set cookie or redirect back to login page if failed
        if (!$token) {

            Router::redirect("/users/rlogin");
        }
        else {

            setCookie("shaberi", $token, strtotime('+1 year'), '/');
            Router::redirect("/");
        }

    }

    public function logout() {
        
        # Generate and save a new token for next login
        $new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());

        # Create the data array we'll use with the update method
        # In this case, we're only updating one field, so our array only has one entry
        $data = Array("token" => $new_token);

        # Do the update
        DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$this->user->token."'");

        # Delete their token cookie by setting it to a date in the past - effectively logging them out
        setcookie("shaberi", "", strtotime('-1 year'), '/');

        # Send them back to the main index.
        Router::redirect("/");
    }

    public function profile($user_name = NULL) {

        #$view = View::instance('v_users_profile');
        #$view->user_name = $user_name;
        #echo $view;
        
        # set up template view
        $this->template->content = View::instance('v_users_profile');
        $this->template->title = "Profile";
        
        $client_files_head = Array('/css/profile.css', '/css/master.css');
        $this->template->client_files_head = Utils::load_client_files($client_files_head);
        
        $client_files_body = Array('/css/profile.css', '/css/master.css');
        $this->template->client_files_body = Utils::load_client_files($client_files_body);
    
        $this->template->content->user_name = $user_name;
        
        # display view
        echo $this->template;
        
        
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

?>