<?php
require 'pdf.php';
require 'print_data.php';
require 'generate_pdf.php';

if (isset($_POST["submit"])) {
    $target_dir = "uploads/";
    $full_name =  $_POST["first_name"] . " " . $_POST["last_name"];
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $number = $_POST['number'] ?? '';
    $email_address = $_POST["email"];
    $marks_data =  $_POST['marks'];
    $marks = $_POST["marks"];
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    $image = $target_file;
    generate_pdf($full_name, $email_address, $number, $image, $marks_data);
}
