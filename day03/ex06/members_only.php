<?php
header("WWW_Authenticate: Basic real=''Espace membres''");
if ($_SERVER['PHP_AUTH_USER'] == 'zaz' && $_SERVER['PHP_AUTH_PW'] == 'jaimelespetitsponey')
{
?>
<html><body>
Bonjour Zaz<br />
<?php
  echo "<img src='data:image/png;base64," . base64_encode(file_get_contents('../img/42.png')) . "'>";
?>
</body></html>
<?php
}
else
{
?>
<html><body>Cette zone est accessible uniquement aux membres du site</body></html>
<?php
}
?>
