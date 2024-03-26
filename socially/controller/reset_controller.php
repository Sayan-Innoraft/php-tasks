<?php

require '../model/Query.php';
require '../controller/password_validation.php';

if (isset($_POST['submit'])) {

// Checks if the password is valid or not.
  if (is_password_valid(trim($_POST['new_password']), trim($_POST['new_password'])
    ) !== 'SUCCESS') {
    $msg = is_password_valid($_POST['password1'], $_POST['password2']);
  }
  elseif (preg_match('/^[A-Za-z0-9._]{1,28}$/', trim($_POST['username']))) {

    // Checks if the connection to the database is successful and the username
    // exists in the database.
    if (Query::connect() && Query::checkUser(trim($_POST['username']))) {

      if (Query::getUserPassword(trim($_POST['username'])) === $_POST['new_password']) {
        $msg = 'Same password';
      }
      // If old password to the username doesn't match, show warning.
      elseif (!Query::resetPassword(trim($_POST['username']), trim($_POST['old_password']),
        trim($_POST['new_password']))) {
        $msg = 'Wrong old password';
      }
      else {

        // If resetting password successful, redirects to the login page.
        header('Location:/login');
        exit();
      }
    }
    else {
      $msg = 'username doesn\'t exist';
    }
  }
  else {
    $msg = 'invalid username';
  }
}
