<?php

require '../model/Query.php';

session_start();

// Parse the query parameter to get the username from the user.
parse_str($_SERVER['QUERY_STRING'], $parameters);

// Username of the user.
$username = $parameters['p'];

// Gets the user profile if exists.
if (Query::connect() && $profile = Query::getProfile($username)) {
  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/profile.css">
  </head>

  <body>

  <header>
    <h2><a href="/home">Socially</a></h2>
    <?php

    if (isset ($_SESSION['username'])) {
      ?>
      <a id="logout" href='/logout'>Logout</a>
      <?php
    }
    ?>
  </header>

  <div class="outer-box">
    <div class="inner-box">
      <?php

      // If the logged-in user accessing their profile, the user will be
      // given access to update their profile.
      if (isset ($_SESSION['username']) && $_SESSION['username'] == $username) {
      ?>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="profile-header">
          <img name="pfp"
               src=<?= $profile['profile_photo'] ?? 'assets/user.png' ?>>
          <h1>
            <?= $username ?>
          </h1>
        </div>
        <main class="profile-body">
          <p>
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name"
                   pattern="^[A-Za-z]{1,28}$" placeholder="First Name"
                   value="<?= $profile['first_name'] ?>" required>
          </p>
          <p>
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name"
                   pattern="^[A-Za-z]{1,28}$"
                   value="<?= $profile['last_name'] ?>"
                   placeholder="Last Name" required>
          </p>
          <p>
            <label for="bio">Bio</label>
            <input type="text" name="bio" id="bio"
                   value="<?= $profile['bio'] ?>" placeholder="Bio">
          </p>
          <p>
            <label for="email">Email</label>
            <input type="email" name="email" id="email"
                   value="<?= $profile['email'] ?>" placeholder="Email id"
                   required>
          </p>
          <p>Select a Profile photo</p>
          <label for='image' id='img_upload'><img id="input_img"
                                                  src='assets/picture.svg'></label>
          <input accept="image/*" id="image" name="image" type="file"/>
          <p>
            <input type="submit" id="submit" value="Submit" name="submit">
          </p>
        </main>
      </form>
    </div>
    <?php

    if (isset ($_POST['submit'])) {
      $target_file = 'profile_photos/' . $_SESSION['username'] . '.jpeg';
      $tmp = $_FILES['image']['tmp_name'];
      move_uploaded_file($tmp, $target_file);
      if ($tmp !== null) {
        $image = $target_file;
      }
      else {
        $image = 'profile_photos/' . $_POST['pfp'];
      }

      Query::uprateProfile(
        trim(htmlentities($_SESSION['username'])),
        trim(htmlentities($_POST['first_name'])),
        trim(htmlentities($_POST['last_name'])),
        trim($_POST['email']),
        trim(htmlentities($_POST['bio'])),
        trim($image)
      );
      unset($_POST);
    }
    } else {
    ?>
    <div class="profile-header">
      <img name="pfp" src=<?php

      // Shows the other users' profiles.
      if (file_exists("profile_photos/{$profile['username']}.jpeg")) {
        echo "profile_photos/{$profile['username']}.jpeg";
      }
      else {
        echo 'assets/user.png';
      }
      ?>>
      <h1>
        <?= $username ?>
      </h1>
    </div>
    <main class="profile-body">
      <p>First Name :
        <?= $profile['first_name'] ?>
      </p>
      <p>Last Name :
        <?= $profile['last_name'] ?>
      </p>
      <p>Email id :
        <?= $profile['email'] ?>
      </p>
      <p>Bio :
        <?= $profile['bio'] ?>
      </p>
    </main>
  </div>
  <?php
  }
  ?>

  <div class="circle c1"></div>
  <div class="circle c2"></div>
  </body>

  </html>
  <?php
}
else {
  ?>
  <h1>Invalid Username</h1>
  <?php
}
