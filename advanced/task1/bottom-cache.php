<?php

// Cache the contents to a cache file.
$cached = fopen($cachefile, 'w');
fwrite($cached, ob_get_contents());
fclose($cached);

// Send the output to the browser.
ob_end_flush();
?>
