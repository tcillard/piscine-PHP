#!/usr/bin/php
<?php
while (true)
{
  echo "Entrez un nombre: ";
  $number = trim(fgets(STDIN));
  if (feof(STDIN))
    exit;
  if (is_numeric($number))
  {
    $number = intval($number);
    if ($number % 2)
      echo "Le chiffre " . $number . " est Pair\n";
    else
      echo "Le chiffre " . $number . " est Impaire\n";
  }
  else
  {
    echo "'" . $number . "' n'est pas un chiffre\n";
  }
}
?>
