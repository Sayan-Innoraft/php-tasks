<?php

require_once '../model/Query.php';

// Takes the starting value from where the next posts will be shown to the user.
$start = $_POST['starting'];
Query::connect();

// Loads next 5 posts.
$all_posts = Query::showPost($start, 5);
$output = '';
while ($post = mysqli_fetch_assoc($all_posts)) {
  $pfp = '';
  if (file_exists("profile_photos/{$post['username']}.jpeg")) {
    $pfp = "profile_photos/{$post['username']}.jpeg";
  } else {
    $pfp = 'assets/user.png';
  }
  $output .= '<div class="post">
  <div class="top">
    <img src=' . $pfp . '><a href="profile.php?p=' . $post['username'] .
    '" class="username">' . $post['username'] . '</a>
    <p class="post_time">' . $post['post_time'] . '</p>
  </div>
  <p class="post-text">' . $post['text'] .
    '</p>';

  if ($post['post'] !== '' && $post['post'] !== null) {
    if (str_starts_with(mime_content_type($post['post']), 'image')) {
      $output .= '<div class="post-img">
                  <img src="' . $post['post'] . '">
              </div>';
    } elseif (str_starts_with(mime_content_type($post['post']), 'audio')) {
      $output .= '<div class="post-audio">
                  <audio controls src="' . $post['post'] . '"></audio>
              </div>';
    } elseif (str_starts_with(mime_content_type($post['post']), 'video')) {
      $output .= '<div class="post-video">
        <video controls loop play width="660px">
          <source src="' . $post['post'] . '"/>
        </video>
      </div>';
    }
  }
  $output .= '</div>';

}
echo $output;
