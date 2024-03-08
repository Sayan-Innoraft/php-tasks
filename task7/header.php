<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/welcome.css">
</head>

<!-- Welcomes user after authenticating -->
<!--  the username and password successfully -->
<body>
  <div class="outer-box">
    <p class="name">Hello
      <?= $_SESSION['username'] ?>
    </p>

    <!-- Logs out user, removes values form the session variable and destroys
     the session  -->
    <a class="logout" href='logout.php'>Logout</a>
  </div>
</body>

</html>
