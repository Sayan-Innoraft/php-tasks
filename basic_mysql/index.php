<?php

require 'dbconnect.php';
?>
<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title>Basic MySQL</title>
  <link rel='stylesheet'
    href='//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css'>
</head>

<body>

  <?php

  global $conn;

  // Gets all table names.
  $sql = 'show tables';
  $tbl = mysqli_query($conn, $sql);
  $k = mysqli_num_rows($tbl);

  // Iterate through all tables.
  if ($k > 0) {
    while ($k-- > 0) {

      // Gets current table name.
      $tbl_name = mysqli_fetch_assoc($tbl)['Tables_in_employee'];
      ?>
      <h2>
        <?= $tbl_name ?>
      </h2>
      <?php

      // Gets the table column names.
      $sql = 'show columns from ' . $tbl_name;
      $result = mysqli_query($conn, $sql);
      $n = mysqli_num_rows($result);

      // Stores column names of current table.
      $cols = null;
      $i = 0;
      ?>
      <table class='display'>
        <thead>
          <tr>
            <?php

            // Iterate through all columns of current table.
            if ($n > 0) {
              while ($n-- > 0) {

                // Gets table column names.
                $curr = mysqli_fetch_assoc($result);
                ?>
                <th>
                  <!-- Sets column names in cols array. -->
                  <?= $cols[$i++] = $curr['Field'] ?>
                </th>
                <?php
              }
            }
            ?>
          </tr>
        </thead>
        <tbody>
          <?php

          // Gets the table data.
          $sql = 'select * from ' . $tbl_name;
          $result = mysqli_query($conn, $sql);
          $n = mysqli_num_rows($result);

          // Iterate through all columns of current table.
          if ($n > 0) {
            while ($n-- > 0) {
              $curr = mysqli_fetch_assoc($result);
              ?>
              <tr>
                <?php
                foreach ($cols as $col) {
                  ?>
                  <td>
                    <!-- Puts column data according to their column names in
                    the table. -->
                    <?= $curr[$col] ?>
                  </td>
                  <?php
                }
                ?>
              </tr>
              <?php
            }
          }
          ?>
        </tbody>
      </table>
      <?php
    }
  }
  ?>
  <script
    src='https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js'>
    </script>
  <script src='//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js'>
  </script>
  <script src="scripts/script.js">
  </script>
</body>

</html>
