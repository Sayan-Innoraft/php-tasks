<?php

require '../model/Query.php';
require '../controller/password_validation.php';

if(isset($_POST['submit'])){
  if(is_password_valid($_POST['password1'],$_POST['password2']) !== 'SUCCESS'){
    $msg = is_password_valid($_POST['password1'],$_POST['password2']);
  }elseif(preg_match('/^[A-Za-z]{1,28}$/',trim($_POST['first_name'])) &&
    preg_match('/^[A-Za-z]{1,28}$/',trim($_POST['last_name']))
    && preg_match('/^[A-Za-z0-9._]{1,28}$/',trim($_POST['username']))){
    if(Query::connect() && Query::checkUser(trim($_POST['username']))){

      $msg = 'Username already exists';
    }else{

      // After successfully adding the user, redirects to the login page.
      if(Query::addUser(trim($_POST['username']),trim($_POST['first_name']),
        trim($_POST['last_name']),trim($_POST['password2']))){
        header('Location: /login');
        exit();
      }
    }
  }else{
    $msg = 'Invalid input format';
  }
  // Checks if the connection to database is successful and the input
  // username already exists in the database or not. If username already
  // exists in the database, show a warning message.

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
<div class="outer-box">
  <div class="inner-box">
    <header class="login-header">
      <h1>Register yourself</h1>
    </header>
    <main class="login-body">
      <form action="" method="post">
        <p>
          <label for="username">Username</label>
          <input type="text" name="username" id="username"
                 pattern="^[A-Za-z0-9._]{1,28}$"
                 placeholder="Username" required>
        </p>
        <p>
          <label for="first_name">First Name</label>
          <input type="text" name="first_name" id="first_name"
                 pattern="^[A-Za-z0-9._]{1,28}$"
                 placeholder="First Name" required>
        </p>
        <p>
          <label for="last_name">Last Name</label>
          <input type="text" name="last_name" id="last_name"
                 pattern="^[A-Za-z0-9._]{1,28}$"
                 placeholder="Last Name" required>
        </p>
        <p>
          <label for="password1">Enter Password</label>
          <input type="password" id="password1" minlength="1" name="password1"
                 pattern="^[A-Za-z0-9._#$@!&%*]{1,28}$"
                 placeholder="Enter Password" required>
        </p>
        <p>
          <label for="password2">Re-enter Password</label>
          <input type="password" id="password2" name="password2"
                 pattern="^[A-Za-z0-9._#$@!&%*]{1,28}$"
                 placeholder="Re-enter Password" required>
        </p>
        <span id="message"></span>
        <p>
          <input type="submit" id="submit" value="Submit" name="submit" >
        </p>
      </form>

    </main>
    <p class="error">
      <?=$msg??'' ?>
    </p>
    <hr>
    <p class="opts">Already a user? <a id="reset" href="/login"> Log
        in</a></p>
  </div>
  <div class="circle c1"></div>
  <div class="circle c2"></div>
</div>
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'>
</script>
<script src='//cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js'>
</script>
<script src="//cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js">
</script>
<script src="scripts/script.js"></script>
</body>

</html>
