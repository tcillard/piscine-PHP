<?php
class Tyrion extends Lannister
{
  function sleepWith($with)
  {
    if (get_parent_class($with) != 'Lannister')
      echo "Let's do this.\n";
    else
     echo "Not even if I'm drunk !\n";
  }
}
?>
