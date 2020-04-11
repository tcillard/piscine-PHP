#!/usr/bin/php
<?php
function  syntax_error()
{
  echo "Syntax Error\n";
}

function  is_operator($op)
{
  if ($op == '*' || $op == '+' || $op == '-' || $op == '/' || $op == '%')
    return 1;
  return 0;
}

function  record_digit(&$nb, $str, &$i)
{
  $start = $i;
  while (ctype_digit($str[$i]))
    $i++;
  $nb = substr($str, $start, $i - 1);
}

function  skip_white_space($str, &$i)
{
  while ($str[$i] == ' ' && $str[$i])
    $i++;
}

function  check_sign($str, &$i, &$sign)
{
  if ($str[$i] == '-' || $str[$i] == '+')
  {
    if ($str[$i] == '-')
      $sign = 1;
    $i++;
  }
}

function  print_result($nb1, $nb2, $op)
{
  if ($op == '+')
    echo $nb1 + $nb2;
  else if ($op == '-')
    echo $nb1 - $nb2;
  else if ($op == '*')
    echo ($nb1 * $nb2);
  else if ($op == '/')
  {
    if ($nb2 == 0)
      return syntax_error();
    echo $nb1 / $nb2;
  }
  else if ($op == '%')
  {
    if ($nb2 == 0)
      return syntax_error;
    echo $nb1 % $nb2;
  }
  echo "\n";
}

if ($argc != 2)
{
	echo "Incorrect Parameters\n";
  return ;
}
$str = trim($argv[1]);
$i = 0;
$sign = 0;
check_sign($str, $i, $sign);
if (!ctype_digit($str[$i]))
  return syntax_error();
record_digit($nb1, $str, $i);
if ($sign)
  $nb1 = $nb1 * -1;
$sign = 0;
skip_white_space($str, $i);
if (!is_operator($str[$i]))
  return syntax_error();
$op = $str[$i++];
skip_white_space($str, $i);
check_sign($str, $i, $sign);
if (!ctype_digit($str[$i]))
  return syntax_error();
record_digit($nb2, $str, $i);
skip_white_space($str, $i);
if ($str[$i])
  return syntax_error();
if ($sign == 1)
  $nb2 = $nb2 * -1;
print_result($nb1, $nb2, $op);
?>
