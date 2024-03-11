<?php

use GuzzleHttp\Client;

require '../../vendor/autoload.php';

/**
 * Executes the url and returns string as  response.
 *
 * @param string $url
 *   URL to call the api.
 *
 * @return string
 *   Returns string as response.
 */
function request(string $url): string {
  $client = new Client();
  $response = $client->request('GET', $url);
  return $response->getBody();
}
