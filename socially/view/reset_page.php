<?php

require '../model/Query.php';

if(isset($_POST['submit'])){

  // Checks if the connection to database is successful and the username
  // exists in the database.
  if(Query::connect() && Query::checkUser(trim($_POST['username']))){

    // If old password to the username doesn't match, show warning.
    if(!Query::resetPassword(trim($_POST['username']),trim($_POST['old_password']),
    trim($_POST['new_password']))){
      $msg = 'Wrong old password';
    }else{

      // If resetting password successful, redirects to the login page.
      header('Location:/');
      exit();
    }
  }else{
    $msg = 'Invalid username';
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset Password</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
<div class="outer-box">
  <div class="inner-box">
    <header class="login-header">
      <h1>Reset Password</h1>
    </header>
    <main class="login-body">
      <form action="" method="post">
        <p>
          <label for="username">Username</label>
          <input type="text" name="username" id="username"
                 pattern="^[\w](?!.*?\.{2})[\w.]{1,28}[\w]$*"
                 placeholder="Username" required>
        </p>
        <p>
          <label for="old_password">Old Password</label>
          <input type="password" id="old_password" name="old_password"
                 placeholder="Old Password" required>
        </p>
        <p>
          <label for="new_password">New Password</label>
          <input type="password" id="new_password" name="new_password"
                 placeholder="New Password" required>
        </p>
        <p>
          <input type="submit" value="Submit" name="submit">
        </p>
      </form>

    </main>
    <p class="error">
      <?=$msg??'' ?>
    </p>
    <hr>
    <p class="opts" ><a href="login.php">Log in</a></p>
  </div>
  <div class="circle c1"></div>
  <div class="circle c2"></div>
</div>
</body>

</html>
