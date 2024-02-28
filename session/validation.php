<?php
// If username or password nto saved in session the redirect to login page.
if(!isset($_SESSION['username']) || !isset($_SESSION['password'])){
  header('Location:/');
}
