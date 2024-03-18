<?php

require '../model/Query.php';

session_start();

// If username and passwords aren't stored in the SESSION variable then
// redirects to login page.
if (!isset ($_SESSION['username']) || !isset ($_SESSION['password'])) {

  // Setting the error message in the error key in SESSION to show error in
  // the login page.
  $_SESSION['error'] = 'User not logged in';
  header('Location: /login');
  exit();
} elseif (Query::connect()) {
  if (isset ($_POST['submit'])) {
    $target_file = 'uploads/' . $_SESSION['username'] . '_' . basename
    ($_FILES['image']['name']);
    $tmp = $_FILES['image']['tmp_name'];
    $post_text = htmlentities($_POST['post_text']);
    move_uploaded_file($tmp, $target_file);
    $image = $target_file;
    if ($post_text != null && $tmp != null) {
      Query::addPost($_SESSION['username'], $post_text, $image);
    } elseif ($post_text != null && $tmp == null) {
      Query::addPost($_SESSION['username'], $post_text, null);
    } elseif ($post_text == null && $tmp != null) {
      Query::addPost($_SESSION['username'], null, $image);
    }
    unset($_POST);
  }
  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/welcome.css">
    <title>Socially</title>
  </head>

  <!-- Welcomes user after authenticating. -->
  <!--  the username and password successfully. -->

  <body>
    <header>
      <h2><a href="/home">Socially</a></h2>
      <div class='user'>
        <p>Hello
          <a class="name" href="profile.php?p=<?=$_SESSION['username']?>"
          ><?= $_SESSION['username'] ?>
          </a>
        </p>
        <!-- Logs out user, removes values form the session variable and destroys
      the session.  -->
        <a class="logout" href='/logout'>Logout</a>
      </div>
    </header>
    <div class="add-post-container" id="postsContainer">
      <form id="frm" class="add-post" action="" enctype="multipart/form-data"
        method="post">
        <label for="post_text"></label>
        <input id="post_text" type="text" name="post_text"
          placeholder="type something nice...">
        <label for='image' id='img_upload'><img id="input_img"
                                                src='picture.svg'></label>
        <input accept="image/*" id="image" name="image" type="file" />
        <input id="btn" name="submit" type="submit" value="Post"
         >
      </form>
    </div>
    <div class="posts">
      <?php
      $post = null;
      $all_posts = Query::showPost();
      while ($post = mysqli_fetch_assoc($all_posts)) {
        $user = $post['username'];
        $text = $post['text'];
        $img = $post['image'];
        $post_time = $post['post_time'];
        ?>
          <div class="post">
            <div style="position: relative" class="top">
              <img src=<?php
              if(file_exists("profile_photos/$user.jpeg")){
                echo "profile_photos/$user.jpeg";
              }else{
                echo 'profile_photos/user.png';
              }
              ?>
              >
              <a href="profile.php?p=<?=$user?>" class='username'>
                <?= $user ?>
              </a>
              <p class="post_time"><?=$post_time?></p>
            </div>
            <p class="post-text">
              <?= $text ?>
            </p>
            <?php
              if ($img !== '' && $img !== null) {
            ?>
            <div class="post-img">
              <img src=<?= $img ?>>
            </div>
            <?php
              }
            ?>
          </div>
          <?php
      }
      ?>
    <script src="scripts/script.js"></script>

  </body>

  </html>

  <?php

} else {
  echo 'Error connecting to database';
}
?>
