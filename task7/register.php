<?php

require 'Query.php';

if(isset($_POST['submit'])){

  // Checks if the connection to database is successful and the input
  // username already exists in the database or not. If username already
  // exists in the database, show warning message.
  if( Query::connect() && Query::checkUser($_POST['username'])){
    $msg = 'Username already exists';
  }else{

    // After successfully adding the user, redirects to the login page.
    if(Query::addUser($_POST['username'],$_POST['password2'])){
      header('Location:/task7/');
      exit();
    }
  }
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
                 pattern="^[\w](?!.*?\.{2})[\w.]{1,28}[\w]$*"
                 placeholder="Username" required>
        </p>
        <p>
          <label for="password1">Enter Password</label>
          <input type="password" id="password1" minlength="1" name="password1"
                 placeholder="Enter Password" required>
        </p>
        <p>
          <label for="password2">Re-enter Password</label>
          <input type="password" id="password2" name="password2"
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
    <p class="opts">Already an user? <a id="reset" href="index.php"> Log
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
