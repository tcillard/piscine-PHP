#!/usr/bin/php
<?php
$i = 0;
$argv = trim($argv[1]);
while ($argv[$i])
{
  echo $argv[$i];
  if ($argv[$i] == ' ')
  {
    while ($argv[$i] == ' ')
      $i++;
  }
  else
    $i++;
}
echo "\n";
?>
