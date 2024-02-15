<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible">
    <title>PHP Form</title>
</head>

<body>

    <form action="form.php" method="post" enctype="multipart/form-data">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" pattern="[A-Za-z]+" required>

        <br><br>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" pattern="[A-Za-z]+" required>

        <br><br>
        <label for="image">Select Image:</label>
        <input type="file" name="image" id="image" accept="image/*">

        <br><br>

        <label for="full_name">Full Name:</label>
        <input type="text" id="full_name" name="full_name" disabled value="<?php
        echo isset($_POST['first_name']) && isset($_POST['last_name']) ? $_POST['first_name'] . ' ' . $_POST['last_name'] : '';
        ?>">

        <br><br>
        <label for="marks">Enter Marks:</label><br>
        <textarea name="marks" id="marks" rows="4" cols="50" placeholder="Subject|Mark
                                                                          Maths|90
                                                                          Science|85
                                                                          History|75"></textarea>

        <br><br>

        <label for="number">Enter phone number</label>
        <input type="text" name="number" id="number" e pattern="\+91[0-9]{10}" title="Indian phone number must begin with +91 and be 10 digits long" required>

        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    if (isset($_POST["submit"])) {
        $firstName = $_POST["first_name"];
        $lastName = $_POST["last_name"];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $fullName = $firstName . " " . $lastName;
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "<br><img style='height: 200px' src='{$target_file}' alt='Uploaded Image'>";
        }
        echo "<h1>Hello $fullName</h1>";
        echo "<h2>Subject Marks</h2>";
        echo "<table border '1'>";
        echo "<tr><th>Subject</th><th>Mark</th></tr>";


        $marks = explode("\n", $_POST['marks']);
        foreach ($marks as $mark) {

            $subject_mark = explode("|", $mark);
            $subject = isset($subject_mark[0]) ? trim($subject_mark[0]) : '';
            $mark = isset($subject_mark[1]) ? trim($subject_mark[1]) : '';


            echo "<tr><td>$subject</td><td>$mark</td></tr>";
        }
        echo "</table>";
        $number = isset($_POST['number']) ? $_POST['number'] : '';
        echo "<p>Phone Number: $number</p>";
    }
    ?>

</body>

</html>