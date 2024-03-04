<?php

// After destroying the task7 , it redirects to the login page.
session_start();
session_unset();
session_destroy();
header('Location: /');
