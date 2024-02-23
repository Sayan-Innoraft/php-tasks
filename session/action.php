<?php
session_start();

if(isset($_POST["submit"])) {
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];
}
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
    header("Location: /");
}else{
    require "header.php";

    parse_str($_SERVER['QUERY_STRING'], $parameters);
    if (isset($parameters['q'])) {
        if( $parameters['q'] > 0 && $parameters['q'] <= 7){
            include "{$parameters['q']}.html";
        }else{
            ?>
            <h1>Invalid Request</h1>
            <?php
        }
    }
}
?>
