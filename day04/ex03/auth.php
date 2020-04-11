<?php
function   auth($login, $passwd)
{
  if (($content = unserialize(file_get_contents("../private/passwd"))) == FALSE)
    return FALSE;
  $i = 0;
  while ($content[$i]['login'] != $login)
   $i++;
  if ($content[$i]['passwd'] == hash("SHA256", $passwd))
    return TRUE;
  else
    return FALSE;
}
?>
