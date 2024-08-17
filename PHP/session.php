<?php

session_start();

$timeout_duration = 600;

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
  session_unset();
  session_destroy();
  header("Location: pages-login.php");
  exit();
}

$_SESSION['LAST_ACTIVITY'] = time();

$username = $_SESSION['username'];

if (!isset($username)) {
  header("Location: pages-login.php");
  exit;
}

?>