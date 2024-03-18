<?php

require '../model/Query.php';

session_start();
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

        // If the user puts wrong credentials then show a waring message on
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

// If the user is already logged in then redirects to homepage.
if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
  header('Location: /home');
  exit();
}

// Show error message if set to error key in SESSION variable.
if(isset($_SESSION['error'] )){
  $msg = $_SESSION['error'] ;
  unset($_SESSION['error']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
<div class="outer-box">
  <div class="inner-box">
    <header class="login-header">
      <h1>Log in</h1>
    </header>
    <main class="login-body">
      <form action="" method="post">
        <p>
          <label for="username">Username</label>
          <input type="text" name="username" id="username"
                 pattern="^[A-Za-z0-9._#$@!&%*]{1,28}$"
                 placeholder="Username" required>
        </p>
        <p>
          <label for="password">Password</label>
          <input type="password" id="password" name="password"
                 pattern="^[A-Za-z0-9._#$@!&%*]{1,28}$"
                 placeholder="Password" required>
        </p>
        <p>
          <input type="submit" value="Submit" name="submit">
        </p>
      </form>
    </main>
    <p class="error">
      <?= $msg ?? '' ?>
    </p>
    <hr>
    <p class="opts"><a id="reset" href="/reset">Reset password</a></p>
    <p class="opts">Not an user? <a href="/register"> Register now</a></p>
  </div>
  <div class="circle c1"></div>
  <div class="circle c2"></div>
</div>
</body>

</html>
