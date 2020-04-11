#!/usr/bin/php
<?php
$str = implode(' ', $argv);
$str = explode(' ', $str);
array_shift($str);
sort($str);
$i = 0;
while ($str[$i])
  echo $str[$i++] . "\n";
?>
