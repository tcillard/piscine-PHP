<?php
session_start();
if (!isset($_SESSION) || $_SESSION['loggued_on_user'] == "")
  echo "ERROR\n";
else
  echo $_SESSION['loggued_on_user'] . "\n";
?>
