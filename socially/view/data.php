<?php

require_once '../controller/Posts.php';

// Takes the starting value from where the next posts will be shown to the user.
$start = $_POST['starting'];
$posts = new Posts();

// Loads next 5 posts from start index.
$data = $posts->fetch_posts($start, 5);
foreach ($data as $item => $datum) {
  $user = $datum['user'];
  $text = $datum['text'];
  $post = $datum['post'];
  $post_time = $datum['post_time'];
  $pfp = '';
  $output = '';

  // If a profile photo exists, display that, else show the default blank user
  // image.
  if (file_exists("profile_photos/{$user}.jpeg")) {
    $pfp = "profile_photos/{$user}.jpeg";
  }
  else {
    $pfp = 'assets/user.png';
  }
  $output .= '<div class="post">
  <div class="top">
    <img src=' . $pfp . '><a href="profile.php?p=' . $user .
    '" class="username">' . $user . '</a>
    <p class="post_time">' . $post_time . '</p>
  </div>
  <p class="post-text">' . $text .
    '</p>';

  // Checks the post-media type before displaying to the web page.
  if ($post !== '' && $post !== null) {
    if (str_starts_with(mime_content_type($post), 'image')) {
      $output .= '<div class="post-img">
                  <img src="' . $post . '">
              </div>';
    }
    elseif (str_starts_with(mime_content_type($post), 'audio')) {
      $output .= '<div class="post-audio">
                  <audio controls src="' . $post . '"></audio>
              </div>';
    }
    elseif (str_starts_with(mime_content_type($post), 'video')) {
      $output .= '<div class="post-video">
        <video controls loop play width="660px">
          <source src="' . $post . '"/>
        </video>
      </div>';
    }
  }
  $output .= '</div>';
  echo $output;
}
