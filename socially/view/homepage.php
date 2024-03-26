<?php

require '../controller/homepage_controller.php';
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
          <input type="text" name="search_username" list="search-list"
                 id="search-bar"
            placeholder="Username" required>
        </label>
        <datalist id="search-list">
        </datalist>

        <input type="submit" id="search-button" value="Search" name="search">
      </form>

      <?php

      // Redirects to profile if the profile exists.
      if (isset ($_POST['search'])) {
        header('Location:/profile.php?p=' .
          trim(htmlentities($_POST['search_username'])));
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

      // Loads initial 5 posts when the page loads.
      require '../controller/load_posts.php';

      ?>
    </div>

    <!--Button to load more posts.-->
    <input type="button" id='load_more' value="Load More">
    <input type="hidden" id="start" value=0>
    <script
      src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js">
      </script>
    <script src="scripts/ajax.js"></script>

    <script src="scripts/script.js"></script>
  </body>

  </html>
