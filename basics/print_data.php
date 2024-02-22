<?php
require 'email_validation.php';

function show_data($full_name, $email_address, $number, $image, $marks): void
{
    ?>
    <h1>Hello
    <?= $full_name ?>
    </h1>
    <img src="<?= $image ?>" height='200px'>
    <h2>Subject Marks</h2>
    <table border='1px'>
        <tr>
            <th>Subject</th>
            <th>Mark</th>
        </tr>
        <?php
        $marks = explode("\n", $marks);
        foreach ($marks as $mark) {
            $subject_mark = explode("|", $mark);
            $subject = isset($subject_mark[0]) ? trim($subject_mark[0]) : '';
            $mark = isset($subject_mark[1]) ? trim($subject_mark[1]) : '';
            ?>
            <tr>
                <td>
                    <?= $subject ?>
                </td>
                <td>
                    <?= $mark ?>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    <p>Phone Number:
        <?= $number ?>
    </p>
    <?php
    $valid = isEmailValid($email_address);
    echo $valid ? $email_address . ' is a valid email address' : $email_address . ' is not a valid email address';
}
