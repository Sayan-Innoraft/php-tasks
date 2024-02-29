<?php

require 'Mailer.php';
require 'email_validation.php';

if(isset($_POST['submit'])) {

  $email = $_POST['email'];

  // Checks if input email address valid or not.
  if(isEmailValid($email)) {
    // Constructor takes exception, hostname, SMTP username, SMTP password, encryption type,
    // port number to create object using Mailer class.
    $mail = new Mailer(true,'smtp.gmail.com','sayan.manna@innoraft.com',
      'oeug rrnk bfjx dbro','ssl',465);

    //  Sends mail using senders mail address, recipient's mail address, shall the mail content be html format or not,
    // mail subject, mail body. Return true if mail sent successfully else returns false.
    $check = $mail->sendMail('sayan.manna@innoraft.com',$email,true,
      'PHPMailer','Thank You for your submission');

    // If mail sent successfully, display success alert.
    if($check) {
      ?>
      <script src="alerts/success.js"></script>
      <?php
    }else{
      // If mail isn't sent successfully, display error alert.
      ?>
      <script src="alerts/error.js"></script>
      <?php
    }
  }else{

    // If input email address is invalid, display invalid alert.
    ?>
    <script src="alerts/invalid.js"></script>
    <?php
  }
}
