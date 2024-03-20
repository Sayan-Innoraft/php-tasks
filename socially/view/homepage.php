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
    $target_file = 'uploads/' . $_SESSION['username'] . '_' . str_replace(
      " ",
      "",
      basename($_FILES['post']['name'])
    );
    $tmp = $_FILES['post']['tmp_name'];
    $post_text = htmlentities($_POST['post_text']);
    move_uploaded_file($tmp, $target_file);
    $post = $target_file;
    if ($post_text != null && $tmp != null) {
      Query::addPost($_SESSION['username'], $post_text, $post);
    } elseif ($post_text != null && $tmp == null) {
      Query::addPost($_SESSION['username'], $post_text, null);
    } elseif ($post_text == null && $tmp != null) {
      Query::addPost($_SESSION['username'], null, $post);
    }
    unset($_POST);
  }
  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Socially</title>
    <link rel="stylesheet" href="css/welcome.css">
  </head>

  <!-- Welcomes user after authenticating. -->
  <!--  the username and password successfully. -->
  <body>
    <header>
      <!--When clicks to Socially, redirects to homepage.-->
      <h2><a href="/home">Socially</a></h2>

      <form id="search" action="" method="post">
        <label>
          <input type="text" name="search_username" id="search_bar"
            placeholder="Username" required>
        </label>
        <input type="submit" id="search_button" value="Search" name="search">
      </form>

      <?php

      // Redirects to profile if the profile exists.
      if (isset ($_POST['search'])) {
        header('Location:/profile.php?p=' . trim(htmlentities($_POST['search_username'])));
        exit;
      }
      ?>

      <div class='user'>
        <p>Hello
          <a class="name" href="profile.php?p=<?= $_SESSION['username'] ?>">
            <?= $_SESSION['username'] ?>
          </a>
        </p>
        <!-- Logs out user, removes values form the session variable and
   destroys the session.  -->
        <a class="logout" href='/logout'>Logout</a>
      </div>
    </header>
    <div class="add-post-container" id="postsContainer">
      <form id="frm" class="add-post" action="" enctype="multipart/form-data"
        method="post">
        <label for="post_text"></label>
        <input id="post_text" type="text" name="post_text"
          placeholder="type something nice...">
        <label for='post' id='img_upload'><img id="input_img"
            src='assets/attachment.png'></label>
        <input accept="image/*, audio/*, video/*" id="post" name="post"
          type="file" />
        <input id="btn" name="submit" type="submit" value="Post">
      </form>
    </div>
    <div id="posts" class="posts">

      <?php

      // Loads initial 5 posts when page loads.
      require '../controller/load_posts.php';

      ?>
    </div>

    <!--Button to load more posts.-->
    <input type="button" id='load_more' value="Load More">
    <input type="hidden" id="start" value=0>
    <script
      src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js">
      </script>

    <!--Ajax script tpo load posts asynchronously.-->
    <script>
      $(document).ready(
        function () {
          $('#load_more').click(function () {
            $start = parseInt($('#start').val());
            $start = $start + 5;
            $('#start').val($start);
            $.ajax({
              url: 'data.php',
              method: 'POST',
              data: { 'starting': $start },
              success: function (response) {
                if (response !== '') {
                  $('#posts').append(response);
                } else {
                  $('#load_more').val('No More Posts').prop("disabled", true);
                }
              },
              error: function () {
                alert('There was some error performing the AJAX call!');
              }
            });
          });
        }
      )
    </script>
    <script src="scripts/script.js"></script>
  </body>

  </html>

  <?php

} else {
  echo 'Error connecting to database';
}
?>
