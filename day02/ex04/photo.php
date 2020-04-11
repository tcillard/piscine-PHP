#!/usr/bin/php
<?php
  $ch = curl_init($argv[1]);
  $str = file_get_contents($argv[1]);
  if (preg_match('#<img.*src=#i', $str))
    {
      $str = preg_split('#img.*src=#i', $str, PREG_SPLIT_DELIM_CAPTURE|PREG_SPLIT_NO_EMPTY);
      print_r($str);
    }

?>
