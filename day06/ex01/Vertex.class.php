<?php
require_once('Color.class.php');
class  Vertex
{
  private $_x = 0.00;
  private $_y = 0.00;
  private $_z = 0.00;
  private $_w = 1.00;
  private $_color = 0;
  static  $verbose = False;

  private function _print_vertex($where)
  {
    echo "Vertex( x: " . sprintf("%.2f", $this->_x) . ", y: " . sprintf("%.2f", $this->_y) . ", z:" . sprintf("%.2f", $this->_z) . ", w:" . sprintf("%.2f", $this->_w);
    if ($this->_color)
      echo " ," . $this->_color;
    echo " ) " . $where . "\n";
  }
  function  __construct($tab)
  {
    $this->_color = new Color(array('red' => 255, 'green' => 255, 'blue' => 255));
    if (array_key_exists("x", $tab) & array_key_exists("y", $tab) & array_key_exists("z", $tab))
    {
      $this->_x = $tab['x'];
      $this->_y = $tab['y'];
      $this->_z = $tab['z'];
      if (array_key_exists("w", $tab))
        $this->_w = $tab['w'];
      if (array_key_exists("color", $tab))
        $this->_color = $tab['color'];
      if (Vertex::$verbose)
        $this->_print_vertex("constructed");
    }
  }
  function  __destruct()
  {
    if (self::$verbose)
      $this->_print_vertex("destructed");
  }
  function  __toString()
  {
    $str = "Vertex( x: " . sprintf("%.2f", $this->_x) . ", y: " . sprintf("%.2f", $this->_y) . ", z:" . sprintf("%.2f", $this->_z) . ", w:" . sprintf("%.2f", $this->_w);
    if ($this->_color && Vertex::$verbose)
      $str = $str . " ," . $this->_color;
    $str = $str . " )";
    return ($str);
  }
  static function doc()
  {
    return (file_get_contents('Vertex.doc.txt'));
  }
  function  get_value($value)
  {
    if ($value == 'x')
      return ($this->_x);
    else if ($value == 'y')
      return ($this->_y);
    else if ($value == 'z')
      return ($this->_z);
    else if ($value == 'w')
      return ($this->_w);
    else if ($value == 'color')
      return ($this->_color);
  }
  function  set_value($value)
  {
    if (array_key_exists('x', $value))
      $this->_x = floatval($value['x']);
    if (array_key_exists('y', $value))
      $this->_y = $value['y'];
    if (array_key_exists('z', $value))
      $this->_z = $value['z'];
    if (array_key_exists('w', $value))
      $this->_w = $value['w'];
  }
  function  set_color(Color $color)
  {
    $this->_color = $color;
  }
}
?>
