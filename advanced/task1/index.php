<?php

session_start();

// Setting txt variable values according to feedback from send.php to display feedback on homepage.
$txt = $_SESSION['alert'] ?? '';
unset($_SESSION['alert']);
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHPMailer</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="outer-box">
    <div class="inner-box">
      <header>Enter email address</header>
      <main class='mail-body'>
        <form action="send.php" method="post">
          <p>
            <label for="email">Username</label>
            <input type="email" name="email" id="email"
              placeholder="abc@example.com" required>
          </p>
          <p>
            <input type="submit" value="Submit" name="submit">
          </p>
        </form>
      </main>
      <p id="feedback"><?=$txt ?></p>
    </div>
    <div class="circle c1"></div>
    <div class="circle c2"></div>
  </div>
</body>

</html>
