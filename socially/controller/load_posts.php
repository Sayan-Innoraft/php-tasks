<?php

require '../controller/Posts.php';

$posts = new Posts();
$data = $posts->fetch_posts(0,5);
foreach ($data as $item => $datum){
  $user = $datum['user'];
  $text = $datum['text'];
  $post = $datum['post'];
  $post_time = $datum['post_time'];
  include '../view/post.php';
}
