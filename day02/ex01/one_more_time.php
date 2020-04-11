#!/usr/bin/php
<?php
  function  format_error()
  {
    echo "Wrong Format\n";
    exit ;
  }
  function  check_day($day)
  {
    if (!preg_match('#^[lL]undi$|^[mM]ardi$|^[mM]ercredi$|^[jJ]eudi$|^[vV]endredi$|^[sS]amedi$|^[dD]imanche$#', $day))
      format_error();
  }
  function  treat_num_day(&$num)
  {
    if (!preg_match('#^[1-9]$|^[0-2][0-9]$|^3[0-1]$#', $num))
      format_error();
  }
  function  treat_month(&$month)
  {
    $pattern = '#^[jJ]anvier$|^[fF][ée]vrier$|^[mM]ars$|^[aA]vril$|^[mM]ai$|^[jJ]uin$|^[jJ]uillet$|^[aA]o[ûu]t$|^[sS]eptembre$|^[oO]ctobre$|^[nN]ovembre$|^[dD][ée]cembre$#';
    $pattern_array = array('#^[jJ]anvier$#', '#^[fF][ée]vrier$#', '#^[mM]ars$#', '#^[aA]vril$#', '#^[mM]ai$#', '#^[jJ]uin$#', '#^[jJ]uillet$#', '#^[aA]o[ûu]t$#', '#^[sS]eptembre$#', '#^[oO]ctobre$#', '#^[nN]ovembre$#', '#^[dD][ée]cembre$#');
    $num = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12');
    if (!preg_match($pattern, $month))
      format_error();
    $month = preg_replace($pattern_array, $num, $month);
  }
  function  treat_year(&$year)
  {
    if (!preg_match('#^19[7-9][0-9]$|^[2-9][0-9][0-9][0-9]$#', $year))
      format_error();
  }
  function  treat_hour(&$hour)
  {
    if (!preg_match('#^[0-1][0-9]:[0-5][0-9]:[0-5][0-9]$|^2[0-3]:[0-5][0-9]:[0-9]$#', $hour))
      format_error();
    $hour = preg_split("#:#", $hour);
    $hour[0] = intval($hour[0]);
    $hour[1] = intval($hour[1]);
    $hour[2] = intval($hour[2]);
  }
  date_default_timezone_set('Europe/Paris');
  $str = preg_split("# #", $argv[1]);
  check_day($str[0]);
  treat_num_day($str[1]);
  treat_month($str[2]);
  treat_year($str[3]);
  treat_hour($str[4]);
  print_r($str[4]);
  echo mktime($str[4][0], $str[4][1], $str[4][2], $str[2], $str[1], $str[3]) . "\n";
?>
