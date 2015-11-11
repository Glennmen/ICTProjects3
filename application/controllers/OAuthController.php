<?php

class OAuthController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //session_start();
    }

    public function index()
   {
       $sContent = null;


        require_once('C:/xampp/htdocs/ICTProjects3/application/libraries/Google/autoload.php');

//Insert your cient ID and secret 
//You can get it from : https://console.developers.google.com/
        $client_id = '452281875900-3mmee3tiiu38kp4a2s6lerokmg22r20r.apps.googleusercontent.com';
        $client_secret = 'hfok_9MOqFGP--y5i0yJjzY0';
        $redirect_uri = 'http://localhost/ICTProjects3/OAuthController';

//database
        $db_username = "xxxxxxxxx"; //Database Username
        $db_password = "xxxxxxxxx"; //Database Password
        $host_name = "localhost"; //Mysql Hostname
        $db_name = 'xxxxxxxxx'; //Database Name

//incase of logout request, just unset the session var
        if (isset($_GET['logout'])) {
            unset($_SESSION['access_token']);
        }

        /************************************************
         * Make an API request on behalf of a user. In
         * this case we need to have a valid OAuth 2.0
         * token for the user, so we need to send them
         * through a login flow. To do this we need some
         * information from our API console project.
         ************************************************/
        $client = new Google_Client();
        $client->setClientId($client_id);
        $client->setClientSecret($client_secret);
        $client->setRedirectUri($redirect_uri);
        $client->addScope("email");
        $client->addScope("profile");

        /************************************************
         * When we create the service here, we pass the
         * client to it. The client then queries the service
         * for the required scopes, and uses that when
         * generating the authentication URL later.
         ************************************************/
        $service = new Google_Service_Oauth2($client);

        /************************************************
         * If we have a code back from the OAuth 2.0 flow,
         * we need to exchange that with the authenticate()
         * function. We store the resultant access token
         * bundle in the session, and redirect to ourself.
         */

        if (isset($_GET['code'])) {
            $client->authenticate($_GET['code']);
            $_SESSION['access_token'] = $client->getAccessToken();
            header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
            exit;
        }

        /************************************************
         * If we have an access token, we can make
         * requests, else we generate an authentication URL.
         ************************************************/
        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $client->setAccessToken($_SESSION['access_token']);
        } else {
            $authUrl = $client->createAuthUrl();
        }


//Display user info or display login url as per the info we have.
        $sContent = '<div style="margin:20px">';
        if (isset($authUrl)) {
            //show login url
            $sContent .='<div align="center">';
            $sContent .='<h3>Login with Google</h3>';
            $sContent .='<p><div>Please click login button to connect to the Bowling WebApplication with Google.</div><p>';
            $sContent .='<a class="login" href="' . $authUrl . '"><img src="assets/images/google-login-button.png" /></a>';
            $sContent .='</div>';

        } else {

            $user = $service->userinfo->get(); //get user info

            // connect to database
            $this->load->model('OAuth_model');
            $user_count = $this->OAuth_model->CheckIfUserExist($user);



//            $mysqli = new mysqli($host_name, $db_username, $db_password, $db_name);
//            if ($mysqli->connect_error) {
//                die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
//            }

//            //check if user exist in database using COUNT
//            $result = $mysqli->query("SELECT COUNT(google_id) as usercount FROM google_users WHERE google_id=$user->id");
//            $user_count = $result->fetch_object()->usercount; //will return 0 if user doesn't exist

            //show user picture



            $sContent .= '<img src="' . $user->picture . '" style="float: right;margin-top: 33px;" />';

            if ($user_count) //if user already exist change greeting text to "Welcome Back"
            {
                $sContent .=  'Welcome back ' . $user->name . '! [<a href="' . $redirect_uri . '?logout=1">Log Out</a>]';
            } else //else greeting text "Thanks for registering"
            {
                $sContent .= 'Hi ' . $user->name . ', Thanks for Registering! [<a href="' . $redirect_uri . '?logout=1">Log Out</a>]';

                $this->load->model('OAuth_model');
                $this->Inlog_model->RegisterUser($user);

            }

        }
        $sContent .= '</div>';
        $this->load->library('navbar');
        $data['inhoud'] = $sContent;
        $data['nav'] = $this->navbar->get_navbar();
        $this->load->view('OAuthView',$data);

    }
}
?>