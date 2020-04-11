#!/usr/bin/php
<?php
  function  echo_link_uper($str)
  {
    $i = 0;
    while ($str[$i])
    {
      if (preg_match('#<a#i', $str[$i]))
      {
        while ($str[$i] && !preg_match('#</a#i', $str[$i]))
        {
          if (preg_match('#title=|>#i', $str[$i]) && $str[$i+1] && !preg_match('# *<#', $str[$i+1]))
          {
            echo $str[$i++];
            echo strtoupper($str[$i++]);
          }
          else
            echo $str[$i++];
        }
      }
      else if ($str[$i])
        echo $str[$i++];
    }
  }

  if ($argc == 1)
    exit;
  $file = fopen($argv[1], "r");
  while (($line = fgets($file)) != false)
  {
    if (preg_match('#<a#i', $line))
      {
        $str = preg_split('#(<[^ ]*)|(>)|(title=)|(</a>)#i', $line, 0, PREG_SPLIT_DELIM_CAPTURE|PREG_SPLIT_NO_EMPTY);
        echo_link_uper($str);
      }
    else
      echo $line;
  }
  fclose($file);
?>
