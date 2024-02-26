<?php
session_start();
/**
 * Hard-coding the username and passwords
 */
$username = 'sayan';
$password = '1234';

if (isset($_POST["submit"])) {
    /**
     * checking if the username and passwords are  valid else go back to login page after showing alert
     */
  if ($username != $_POST['username'] || $password != $_POST['password']) {
    ?>
    <script>
      function myFunction() {
        alert("Wrong Username and/or password");
        window.location.href = "/";
      }
      myFunction();
    </script>
    <?php
    exit;
  }
    /**
     * Storing the username and password in the super-global variable SESSION
     */
  $_SESSION['username'] = $_POST['username'];
  $_SESSION['password'] = $_POST['password'];
}
/**
 * If  username and passwords aren't stored in the SESSION variable then go back to login page
 */
if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
  header("Location: /");
} else {

  require "header.php";
    /**
     * Getting the query parameter value from  parsing query string. If  the query parameter value is valid then go to targeted page elso show error
     */
  parse_str($_SERVER['QUERY_STRING'], $parameters);
  if (isset($parameters['q'])) {
    if ($parameters['q'] > 0 && $parameters['q'] <= 7) {
      include "{$parameters['q']}.html";
    } else {
      ?>
      <h1>Invalid Request</h1>
      <?php
    }
  }
}
