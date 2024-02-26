<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
</head>
<!-- Welcomes user after authenticating the username and password successfully  -->
<body>
  <p>Hello
    <?=$_SESSION['username'] ?> ,your password
    <?=$_SESSION['password'] ?>
  </p>
<!-- Logs out user, removes values form the session variable and destroys the session  -->
  <a href="logout.php">Logout</a>
</body>

</html>
