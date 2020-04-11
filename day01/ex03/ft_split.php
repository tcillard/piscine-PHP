<?php
function ft_split($str)
{
  $j = 0;
  $i_tab = 0;
  while ($str[$j] == ' ')
    $j++;
  $last_word = $j;
  while ($str[$j])
  {
    $j_tab = 0;
    if ($str[$j] == ' ' || !($str[$j + 1]))
    {
      if (!($str[$j + 1]))
        $j++;
      $tab[$i_tab] = substr($str, $last_word, $j - $last_word);
      while ($str[$j] && $str[$j] == ' ')
        $j++;
      $i_tab++;
      $last_word = $j;
    }
    else
      $j++;
  }
  sort($tab);
  return $tab;
}
?>
