<?php

session_start();

// If the user is already logged in then redirects to homepage.
if(isset($_SESSION['username']) && isset($_SESSION['password'])){
  header('Location:homepage.php');
  exit();
}

// If the user puts wrong credentials then show a waring message on the login page.
$msg = $_SESSION['error'] ?? '';
unset($_SESSION['error']);
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
        <form action="homepage.php" method="post">
          <p>
            <label for="username">Username</label>
            <input type="text" name="username" id="username"
              placeholder="Sayan Manna" required>
          </p>
          <p>
            <label for="password">Password</label>
            <input type="password" id="password" name="password"
              placeholder="Atleast 8 characters" required>
          </p>
          <p>
            <input type="submit" value="Submit" name="submit">
          </p>
        </form>
      </main>
      <p class="error">
        <?php
        echo $msg;
        ?>
    </div>
    <div class="circle c1"></div>
    <div class="circle c2"></div>
  </div>
</body>

</html>
