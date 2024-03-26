<?php

require '../controller/login_controller.php';
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
      <?=$msg ?? '' ?>
    </p>
    <hr>
    <p class="opts"><a id="reset" href="/reset">Reset password</a></p>
    <p class="opts">Not a user? <a href="/register"> Register now</a></p>
  </div>
  <div class="circle c1"></div>
  <div class="circle c2"></div>
</div>
</body>

</html>
