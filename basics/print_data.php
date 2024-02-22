<?php
require 'email_validation.php';
function show_data($fullName,$email_address,$number,$image,$marks): void
{
    echo "\n<img style='height: 200px' src='{$image}' alt='Uploaded Image'>";
    echo "<h1>Hello $fullName</h1>";
    echo "<h2>Subject Marks</h2>";
    echo "<table>";
    echo "<tr><th>Subject</th><th>Mark</th></tr>";
    $marks = explode("\n",$marks);
    foreach ($marks as $mark) {
        $subject_mark = explode("|", $mark);
        $subject = isset($subject_mark[0]) ? trim($subject_mark[0]) : '';
        $mark = isset($subject_mark[1]) ? trim($subject_mark[1]) : '';
        echo "<tr><td>$subject</td><td>$mark</td></tr>";
    }
    echo "</table>";
    echo "<p>Phone Number: $number</p>";
//    $valid = true;
    $valid = validOrNot($email_address);
    echo $valid? $email_address . ' is a valid email address':$email_address . ' is not a valid email address';
}
