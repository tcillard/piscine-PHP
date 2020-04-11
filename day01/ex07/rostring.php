#!/usr/bin/php
<?php
if (!$argv[1])
  exit;
$str = explode(' ', $argv[1]);
$swap = $str[0];
$i = 0;
while ($str[$i])
  $i++;
$str[$i] = $str[0];
array_shift($str);
$i = 0;
while ($str[$i])
{
  echo $str[$i];
  if ($str[$i + 1])
    echo " ";
  $i++;
}
echo "\n";
?>
