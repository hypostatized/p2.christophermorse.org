<?php
class users_controller extends base_controller {

    public function __construct() {
        parent::__construct();
    } 

    public function index() {

        $this->template->content = View::instance('v_index_index');
        $this->template->title = "Shaberi";
        echo $this->template;
    }

    public function signup() {

        $this->template->content = View::instance('v_users_signup');
        $this->template->title = "Sign up";
        echo $this->template;  
    }

    public function p_signup() {

        # set time of creation
        # hash password and login token for cookie
        $_POST['created'] = Time::now();
        $_POST['avatar'] = "shaberi.png";
        $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
        $_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());

        #add user
        $user_id = DB::instance(DB_NAME)->insert("users", $_POST);
        Router::redirect('/users/login');

    }

    public function login($error = NULL) {

        $this->template->content = View::instance('v_users_login');
        $this->template->title = "Login";
        $this->template->content->error = $error;
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

            Router::redirect("/users/login/error");
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

    public function editProfile($error = NULL) {

        # Setup view
        $this->template->content = View::instance('v_users_editProfile');
        $this->template->content->error = $error;
        $this->template->title   = "Edit Profile";

        # Render template
        echo $this->template;

    }

    public function p_editProfile() {

        # sanitize user entry data
        $_POST = DB::instance(DB_NAME)->sanitize($_POST);

        $location = Array("location" => $_POST['location']);
        $about = Array("about" => $_POST['about']);
        DB::instance(DB_NAME)->update("users", $location, "WHERE user_id = '".$this->user->user_id."'");
        DB::instance(DB_NAME)->update("users", $about, "WHERE user_id = '".$this->user->user_id."'");

        Router::redirect('/users/profile');
    }

    public function myImg() {

        if(!$this->user) {
            Router::redirect('/users/login');
        }
        else {

        $this->template->content = View::instance('v_users_myImg');
        $this->template->title = "Upload a Profile Picture";
        echo $this->template;  
        }
    }

    public function pMyImg() {

        if(!$this->user) {
            Router::redirect('/users/login');
        }
        else {
            $allowedExts = array("gif", "jpeg", "jpg", "png");
            $temp = explode(".", $_FILES["file"]["name"]);
            $extension = end($temp);
            if ((($_FILES["file"]["type"] == "image/gif")
                || ($_FILES["file"]["type"] == "image/jpeg")
                || ($_FILES["file"]["type"] == "image/jpg")
                || ($_FILES["file"]["type"] == "image/pjpeg")
                || ($_FILES["file"]["type"] == "image/x-png")
                || ($_FILES["file"]["type"] == "image/png"))
                && ($_FILES["file"]["size"] < 400000)
                && in_array($extension, $allowedExts))
            {
                if ($_FILES["file"]["error"] > 0)
                {
                    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                }
                else
                {
                    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
                    echo "Type: " . $_FILES["file"]["type"] . "<br>";
                    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
                    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

                    if (file_exists("/uploads/avatars/" . $_FILES["file"]["name"]))
                    {
                        echo $_FILES["file"]["name"] . " already exists. ";
                    }
                    else
                    {
                        move_uploaded_file($_FILES["file"]["tmp_name"],
                            "/uploads/avatars/" . $_FILES["file"]["tmp_name"]);
                        $filename = $_FILES["file"]["tmp_name"];
                        $avatar = Array("avatar" => $filename);
                        DB::instance(DB_NAME)->update("users", $avatar, "WHERE user_id = '".$this->user->user_id."'");
                        Router::redirect('/users/profile')
                    }
                }
            }
            else
            {
                echo "Invalid file";
            }
        }
    }

}

?>