<?php
class Tyrion extends Lannister
{
  function __construct()
  {
    parent::__construct();
    echo "MY name is Tyrion\n";
  }
  function getSize()
  {
    echo "Short";
  }
  function __destruct()
  {
    parent::houseMotto();
  }
}
?>
