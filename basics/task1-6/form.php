<?php

require 'print_data.php';
require 'generate_pdf.php';

// When submitting the values in the form , the values are stored in the server and generate the pdf file.
if (isset($_POST['submit'])) {
  $full_name = $_POST['first_name'] . " " . $_POST['last_name'];
  $target_file = 'uploads/' . basename($_FILES['image']['name']);

  // Stores image file to uploads folder in the server.
  move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

  // Generates the pdf file.
  generate_pdf($full_name, $_POST['email'], $_POST['number'], $target_file, $_POST['marks']);
}
