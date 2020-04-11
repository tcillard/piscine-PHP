#!/usr/bin/php
<?php
 $str = trim($argv[1], " \t");
 $str = preg_replace('/[ \t]{1,}/', ' ', $str);
 echo $str . "\n";
?>
