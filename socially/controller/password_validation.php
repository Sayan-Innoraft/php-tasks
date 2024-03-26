<?php

// Checks if the password has at least 8 characters, and those 8 characters
// contain at least 1 number, 1 capital letter, 1 small letter and 1 special
// character, and both passwords match.If all criteria matches, returns
// SUCCESS string else returns an error message.
function is_password_valid(string $password, string $cpassword):string{
  $passwordErr = 'SUCCESS';
  if($password != null && $cpassword != null) {
    if (strlen($password) < 8) {
      $passwordErr = "Your Password Must Contain At Least 8 Characters!";
    }
    elseif(!preg_match("#[0-9]+#",$password)) {
      $passwordErr = "Your Password Must Contain At Least 1 Number!";
    }
    elseif(!preg_match("#[A-Z]+#",$password)) {
      $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
    }
    elseif(!preg_match("#[a-z]+#",$password)) {
      $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
    }
    elseif(!preg_match("#[\W]+#",$password)) {
      $passwordErr = "Your Password Must Contain At Least 1 Special Character!";
    }
    elseif (strcmp($password, $cpassword) !== 0) {
      $passwordErr = "Passwords must match!";
    }
  } else {
    $passwordErr = "Please enter password   ";
  }
  return $passwordErr;
}
