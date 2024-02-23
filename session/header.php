
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
<p>Hello <?= $_SESSION['username']?> ,your password <?=  $_SESSION['password'] ?></p>
<a href="logout.php">Logout</a>
</body>
</html>
