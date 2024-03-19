<?php
global $user, $post_time, $text, $post;
?>
<div class="post">
  <div class="top">
    <img src=<?php
    if (file_exists("profile_photos/$user.jpeg")) {
      echo "profile_photos/$user.jpeg";
    } else {
      echo 'profile_photos/user.png';
    }
    ?>>
    <a href="profile.php?p=<?= $user ?>" class='username'>
      <?= $user ?>
    </a>
    <p class="post_time">
      <?= $post_time ?>
    </p>
  </div>
  <p class="post-text">
    <?= $text ?>
  </p>
  <?php

  if ($post !== '' && $post !== null) {
    if (str_starts_with(mime_content_type($post), 'image')) {
      ?>
      <div class="post-img">
        <img src=<?= $post ?>>
      </div>
      <?php
    } elseif (str_starts_with(mime_content_type($post), 'audio')) {
      ?>
      <div class="post-audio">
        <audio controls src=<?= $post ?>></audio>
      </div>
      <?php
    } elseif (str_starts_with(mime_content_type($post), 'video')) {
      ?>
      <div class="post-video">
        <video controls width="660px">
          <source src=<?= $post ?> />
        </video>
      </div>
      <?php
    }
  }
  ?>
</div>
