<?php

/**
 * Executes the url and returns json file.
 *
 * @param string $url
 *   URL to call the api.
 *
 * @return string
 *   Returns JSON file as output.
 */
function request(string $url): string {
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $data = curl_exec($ch);
  curl_close($ch);
  return $data;
}
