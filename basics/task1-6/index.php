<?php

require 'generate_pdf.php';
require 'email_validation.php';
require 'marks_validation.php';

// When submitting the values in the form , the values are stored in the server and generate the pdf file.
if (isset($_POST['submit'])) {
  $full_name = $_POST['first_name'] . " " . $_POST['last_name'];
  $target_file = 'uploads/' . basename($_FILES['image']['name']);
  $marks_data = $_POST['marks'] ;
  $email = $_POST['email'];

  // Stores image file to uploads folder in the server.
  move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

  // Checks if marks data format is correct or not.
  $marks_valid = is_marks_valid($marks_data);

  // Checks if email address is valid or not.
  $email_valid = is_email_valid($email);

  if($marks_valid && $email_valid){

    // Generates the pdf file if marks and email address are valid.
    generate_pdf($full_name, $email, $_POST['number'], $target_file, $marks_data);
  }
  if(!$marks_valid){
    $marks_err = 'Invalid marks format';
  }
  if(!$email_valid){
    $email_err = 'Invalid email address';
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" />
  <title>PHP Form</title>
  <link href="css/style.css" rel="stylesheet" />
</head>

<body>
  <form action="" enctype="multipart/form-data" method="post">
    <label for="first_name">First Name:</label>
    <input id="first_name" name="first_name" oninput="setFullName()"
      pattern="^[A-Za-z]{1,20}" required type="text" />
    <label for="last_name">Last Name:</label>
    <input id="last_name" name="last_name" oninput="setFullName()"
      pattern="^[A-Za-z]{1,20}" required type="text" />
    <label for="full_name">Full Name:</label>
    <input disabled id="full_name" name="full_name" readonly type="text" />
    <label for="image">Select Image:</label>
    <input accept="image/*" id="image" name="image" required type="file" onchange='openFile(event)'/>
    <img id='output' style="height:100px; width:100px; display: none">
    <img src="" name="img" alt="No Image" id="img" style='height:150px;display: none'>
    <label for="marks">Enter Marks:</label>
    <textarea cols="50" id="marks" name="marks" placeholder="Subject|Mark"
      required rows="4"></textarea>
    <p name="marks_err" style="color: red;"><?= $marks_err??null ?></p>
    <label for="number">Enter phone number</label>
    <input id="number" name="number" pattern="\+91[0-9]{10}" required
      title="Indian phone number must begin with +91 and be 10 digits long"
      type="text" />
    <label for="email">Email id: </label>
    <input id="email" name="email" type="text" />
    <p name="marks_err" style="color: red;"><?= $email_err??null ?></p>
    <input id="submit" name="submit" type="submit" value="Submit" />
  </form>
  <script src="scripts/script.js"></script>
</body>

</html>
