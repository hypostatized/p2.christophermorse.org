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

        #set up the view
        $this->template->content = View::instance('v_users_signup');
    
        #render the view
        echo $this->template;    }

    public function p_signup() {

        #echo "<pre>";
        #print_r($_POST);
        #echo "<pre>";

        $_POST['created'] = Time::now();
        $_POST['password'] = sha1($_POST['password']);

        DB::instance(DB_NAME)->insert_row('users', $_POST);

        Router::redirect('/users/signup');

    }

    public function login() {
        echo "This is the login page";
    }

    public function logout() {
        echo "This is the logout page";
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