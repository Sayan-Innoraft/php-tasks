<?php

require '../model/Query.php';

$prefix = $_POST['prefix'];
Query::connect();

if(strlen($prefix) > 0){
  $usernames = Query::getUsernames($prefix);
  while ($username = mysqli_fetch_assoc($usernames)){
    echo '<option class="option">'.$username['username'].'</option>';
  }
}
