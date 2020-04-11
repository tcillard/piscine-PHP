<?php
function  open_passwd()
{
  if (!file_exists("../private"))
    mkdir("../private");
  if (file_exists("../private/passwd"))
    return unserialize(file_get_contents("../private/passwd"));
}
function  push_new_account($content)
{
  $i = 0;
  while ($content[$i])
    $i++;
  $content[$i]['login'] = $_POST['login'];
  $content[$i]['passwd'] = hash("SHA256", $_POST['passwd']);
  file_put_contents("../private/passwd", serialize($content));
  echo "OK\n";
}
if ($_POST['submit'] == "OK" && $_POST['login'] && $_POST['passwd'])
{
  $content = open_passwd();
  if ($content)
  {
    $i = 0;
    while ($content[$i])
    {
      if ($content[$i]['login'] == $_POST['login'])
      {
        echo "ERROR\n";
        exit;
      }
      $i++;
    }
  }
  push_new_account($content);
}
else
  echo "ERROR\n";
?>
