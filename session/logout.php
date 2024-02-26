<?php
    session_start();
    session_unset();
    session_destroy();
/**
 * After destroying the session , it redirects to the login page.
 */
    header("Location: /");
    exit;
