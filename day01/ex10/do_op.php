#!/usr/bin/php
<?php
if ($argc != 4)
{
  echo "Incorrect Parameters\n";
  exit;
}
$nb1 = trim($argv[1]);
$op = trim($argv[2]);
$nb2 = trim($argv[3]);
if ($op == '+')
  echo $nb1 + $nb2;
else if ($op == '-')
  echo $nb1 - $nb2;
else if ($op == '*')
  echo ($nb1 * $nb2);
else if ($op == '/')
  echo $nb1 / $nb2;
else if ($op == '%')
  echo $nb1 % $nb2;
echo "\n";
?>
