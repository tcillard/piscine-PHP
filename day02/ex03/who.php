#!/usr/bin/php
<?php
  setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1');
  date_default_timezone_set('Europe/Paris');
  $utm = fopen("/var/run/utmpx", "r");
  fread($utm, 1256);
  while (($line = fread($utm, 628)))
  {
    $who_struct = unpack("a256user/a4termid/a32tty/ipid/iname/I2time/a256hostname/i16nothing/", $line);
    if ($who_struct['name'] == '7')
    {
      echo $who_struct['user'] . " ";
      echo $who_struct['tty'] . "  ";
      echo strftime("%a %d %H:%M",$who_struct['time1']);
      echo "\n";
    }
 }
  fclose($utm);
?>
