<?php

require '../model/Query.php';
require '../model/creds.php';
require '../../vendor/autoload.php';

global $google_oauth_client_id,$google_oauth_client_secret,$google_oauth_redirect_uri;
session_start();

$client = new Google_Client();
$client->getClientId($google_oauth_client_id);
$client->setClientSecret($google_oauth_client_secret);
$client->setRedirectUri($google_oauth_redirect_uri);
$client->addScope('profile');
$client->addScope('email');
if(isset($_POST['code'])){
  echo $_POST['code'];
}else{
  echo "<a href='$google_oauth_redirect_uri'>Login with google</a>";
}

if (isset($_POST['submit'])) {

  // If the connection to the database server is successful and username
  // exists in the database, and password to the user gets validated
  // successfully, then set username and password key to SESSION variable.
  if (preg_match('/^[A-Za-z0-9._]{1,28}$/',trim($_POST['username']))
    && Query::connect()) {
    if(Query::checkUser(trim($_POST['username']))) {
      if (trim($_POST['password']) == Query::getUserPassword(trim($_POST['username']))) {

        // Storing the username and password in the super-global variable
        // SESSION.
        $_SESSION['username'] = trim($_POST['username']);
        $_SESSION['password'] = trim($_POST['password']);
      } else {

        // If the user puts wrong credentials, then show a waring message on
        // the login page.
        $msg = 'Wrong Password';
      }
    }else{
      $msg = 'Username doesn\'t exist';
    }

  } else {

    // If the username doesn't exist in the database, show warning of
    // invalid username.
    $msg = 'Invalid Username';
  }
}

// If the user is already logged in, then redirects to homepage.
if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
  header('Location: /home');
  exit();
}

// Show an error message if set to error key in SESSION variable.
if(isset($_SESSION['error'] )){
  $msg = $_SESSION['error'] ;
  unset($_SESSION['error']);
}
