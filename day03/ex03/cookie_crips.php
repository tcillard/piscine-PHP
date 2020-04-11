<?php
function  set_cookies()
{
  echo "la\n";
  if ($_GET['name'] && $_GET['value'])
    echo setcookie($_GET['name'], $_GET['value']);
}
function  get_cookies()
{
  if ($_GET['name'])
    echo $_COOKIE[$_GET['name']] . "\n";
}
function  del_cookies()
{
  if ($_GET['name'])
  {
    setcookie($_GET['name']);
    unset($_COOKIE[$_GET['name']]);
  }
}
if ($_GET['action'] == "set")
  set_cookies($_GET);
else if ($_GET['action'] == "get")
  get_cookies();
else if ($_GET['action'] == "del")
  del_cookies();
?>
