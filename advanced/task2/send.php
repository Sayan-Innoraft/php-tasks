<?php

require 'Mailer.php';
require 'email_validation.php';
require 'creds.php';

session_start();

// Gets SMTP username and password from creds.php file.
global $username, $password;
if(isset($_POST['submit'])) {
  $email = $_POST['email'];

  // Checks if input email address valid or not.
  if(isEmailValid($email)) {

    // Constructor takes exception, hostname, SMTP username, SMTP password, encryption type,
    // port number to create object using Mailer class.
    $mail = new Mailer(true);

    // Sends using SMTP.
    $mail->isSMTP();

    // Sets the SMTP server to send through.
    $mail->Host = 'smtp.gmail.com';

    // Enables SMTP authentication.
    $mail->SMTPAuth = true;

    // SMTP username.
    $mail->Username = $username;

    // SMTP password.
    $mail->Password = $password;

    // Enables implicit TLS encryption.
    $mail->SMTPSecure = 'ssl';

    // TCP port to connect to.
    $mail->Port = 465;

    // Sends mail using senders mail address, recipient's mail address, shall the mail content be html format or not,
    // mail subject, mail body. Return true if mail sent successfully else returns false.
    $check = $mail->sendMail('sayan.manna@innoraft.com', $email, true,
       'PHPMailer', 'Thank You for your submission');

    // If mail sent successfully, display success alert and redirects to homepage.
    if($check) {
      $_SESSION['alert'] = 'Mail sent successfully';
      header('Location:/task2/index.php');
      exit();
    } else {

      // If mail isn't sent successfully, display error alert and redirects to homepage.
      $_SESSION['alert'] = 'Error sending mail';
      header('Location:/task2/index.php');
      exit();
    }
  } else {

    // If input email address is invalid, display invalid alert and redirects to homepage.
    $_SESSION['alert'] = 'Invalid Email Address';
    header('Location:/task2/index.php');
    exit();
  }
}
