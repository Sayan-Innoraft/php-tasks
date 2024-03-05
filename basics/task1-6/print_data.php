<?php

/**
 * Prints the user data on the webpage
 *
 * @param string $full_name
 *   User's full name.
 * @param string $email_address
 *   User's email address.
 * @param string $number
 *   User's contact number.
 * @param mixed $image
 *   User's input image.
 * @param string $marks
 *   User's subject marks.
 */
function show_data(string $full_name, string $email_address, string $number,
                   mixed $image, string $marks): void {
  ?>
  <h1>Hello
    <?= $full_name ?>
  </h1>
  <img src='<?= $image ?>' height='200px'>
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

  //Checks if the input email address is valid or not.
  $valid = is_email_valid($email_address);
  echo $valid ? $email_address . ' is a valid email address' : $email_address .
    ' is not a valid email address';
}
