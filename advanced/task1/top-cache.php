<?php

$url = $_SERVER["SCRIPT_NAME"];
$break = explode('/', $url);
$file = $break[count($break) - 1];
$cachefile = 'cached-' . substr_replace($file, "", -4) . '.html';

// time to cache in seconds.
$cachetime = 3600;

// Check if index.php has been modified since the cache file was created.
$script_modified_time = filemtime('index.php');
if (file_exists($cachefile) && (filemtime($cachefile) >=
    $script_modified_time || time() - $cachetime <= filemtime($cachefile))) {
  // Serve from the cache.
  readfile($cachefile);
  exit;
}

// Start the output buffer.
ob_start();
