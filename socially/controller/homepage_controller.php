<?php

require '../model/Query.php';

session_start();

// If username and passwords aren't stored in the SESSION variable then
// redirects to login page.
if (!isset ($_SESSION['username']) || !isset ($_SESSION['password'])) {

  // Setting the error message in the error key in SESSION to show error in
  // the login page.
  $_SESSION['error'] = 'User not logged in';
  header('Location: /login');
  exit();
} elseif (Query::connect()) {

  if (isset ($_POST['submit'])) {
    $target_file = 'uploads/' . $_SESSION['username'] . '_' . str_replace(
        " ",
        "",
        basename($_FILES['post']['name'])
      );
    $tmp = $_FILES['post']['tmp_name'];
    $post_text = htmlentities($_POST['post_text']);
    move_uploaded_file($tmp, $target_file);
    $post = $target_file;
    if ($post_text != null && $tmp != null) {
      Query::addPost($_SESSION['username'], $post_text, $post);
    }
    elseif ($post_text != null && $tmp == null) {
      Query::addPost($_SESSION['username'], $post_text, null);
    }
    elseif ($post_text == null && $tmp != null) {
      Query::addPost($_SESSION['username'], null, $post);
    }
    unset($_POST);
  }
}else{
  echo 'Error Connecting to database';
}