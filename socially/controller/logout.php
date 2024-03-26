<?php

// After destroying the session, it redirects to the login page.
session_start();
session_unset();
session_destroy();
header('Location: /');
