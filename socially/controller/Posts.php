<?php

require_once '../model/Query.php';

Query::connect();
class Posts{
  function fetch_posts(int $start, int $end): false|array {
    $all_posts = Query::showPost($start, $end);
    $posts_array = array();
    $id = 0;
    while($post = mysqli_fetch_assoc($all_posts)){
      $posts_array[$id]['user'] = $post['username'];
      $posts_array[$id]['text'] = $post['text'];
      $posts_array[$id]['post'] = $post['post'];
      $posts_array[$id]['post_time'] = $post['post_time'];
      $id++;
    }
    return $posts_array;
  }

}
