<?php
function  open_passwd()
{
  if (!file_exists("../private"))
    mkdir("../private");
  if (file_exists("../private/passwd"))
    return unserialize(file_get_contents("../private/passwd"));
}
function  push_new_passwd($content, $i)
{
  $content[$i]['passwd'] = hash("SHA256", $_POST['newpw']);
  file_put_contents("../private/passwd", serialize($content));
  echo "OK\n";
}
if ($_POST['submit'] == "OK" && $_POST['login'] && $_POST['oldpw'] && $_POST['newpw'])
{
  $content = open_passwd();
  if ($content)
  {
    $i = 0;
    while ($content[$i])
    {
      if ($content[$i]['login'] == $_POST['login'])
        break;
      $i++;
    }
    if ($content[$i] && $content[$i]['passwd'] == hash("SHA256", $_POST['oldpw']))
      push_new_passwd($content, $i);
    else
      echo "ERROR\n";
  }
}
else
  echo "ERROR\n";
?>
