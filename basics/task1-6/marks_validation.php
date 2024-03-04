<?php

/**
 * Checks if the marks data format is correct or not.
 *
 * @param string $marks_data
 *   Subject marks data.
 *
 * @return bool
 *   Returns true if format is correct else returns false.
 */
function is_marks_valid(string $marks_data): bool {
  $marks_data = explode("\n", trim($marks_data));
  foreach ($marks_data as $datum){
    $datum = explode('|', $datum);
    if(!ctype_alpha(trim( $datum[0])) || !ctype_digit(trim($datum[1]))){
      return false;
    }
  }
  return  true;
}
