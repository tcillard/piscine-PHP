<?php
function ft_is_sort($str)
{
  $i = 1;
  while ($str[$i + 1])
  {
    if ($str[$i] > $str[$i + 1])
      return FALSE;
      $i++;
  }
  return TRUE;
}
?>
