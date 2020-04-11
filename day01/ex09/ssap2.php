#!/usr/bin/php
<?php
function insensitive_sort($a, $b)
{
  $i = 0;
  $a = mb_strtolower($a, "UTF-8");
  $b = mb_strtolower($b, "UTF-8");
  while ($a[$i] && $b[$i])
  {
    if ((ctype_alpha($a[$i]) && ctype_alpha($b[$i]) != 1)
    || (ctype_digit($a[$i]) && ctype_digit($b[$i]) != 1 && ctype_alpha($b[$i]) != 1))
      return -1;
    else if ((!ctype_alpha($a[$i]) && ctype_alpha($b[$i]))
    || (!ctype_digit($a[$i]) && ctype_digit($b[$i]) && ctype_alpha($b[$i])))
      return 1;
    elseif ($a[$i] > $b[$i])
      return 1;
    else if ($a[$i] < $b[$i])
      return -1;
    $i++;
  }
  if (!$a[i])
    return 1;
  else if (!$b[$i])
    return -1;
  return 0;
}

$str = implode(' ', $argv);
$str = explode(' ', $str);
array_shift($str);
usort($str, "insensitive_sort");
$i = 0;
while ($str[$i])
  echo $str[$i++] . "\n";
?>
