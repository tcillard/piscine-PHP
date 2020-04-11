<?php
class  Color
{
  public $red = 0;
  public $green = 0;
  public $blue = 0;
  public static $verbose = FALSE;

  private function _valide_color(&$color)
  {
    if ($color < 0)
      $color = 0;
    else if ($color > 255)
      $color = 255;
  }
  private function _convert_color($color)
  {
    $color = intval($color);
    $this->red = $color & 255;
    $color = $color >> 8;
    $this->green = $color & 255;
    $color = $color >> 8;
    $this->blue =  $color & 255;
  }
  function __construct(array $att)
  {
    if (array_key_exists('rgb', $att))
      $this->_convert_color($att['rgb']);
    else if (array_key_exists('red', $att) && array_key_exists('green', $att) && array_key_exists('blue', $att))
    {
      $this->red = intval($att['red']);
      $this->green = intval($att['green']);
      $this->blue = intval($att['blue']);
    }
    $this->_valide_color($this->red);
    $this->_valide_color($this->green);
    $this->_valide_color($this->blue);
    if (Color::$verbose)
    {
      $pattern = array('# ([0-9]{3}[, ])#', '# ([0-9]{2}[, ])#', '# ([0-9][, ])#');
      $replace = array(' $1', '  $1', '   $1');
      echo preg_replace($pattern, $replace, "Color( red: " . $this->red . ", green: " . $this->green . ", blue: " . $this->blue . " ) constructed.\n");
    }
  }
  function __destruct()
  {
    if (Color::$verbose)
    {
      $pattern = array('# ([0-9]{3}[, ])#', '# ([0-9]{2}[, ])#', '# ([0-9][, ])#');
      $replace = array(' $1', '  $1', '   $1');
      echo preg_replace($pattern, $replace, "Color( red: " . $this->red . ", green: " . $this->green . ", blue: " . $this->blue . " ) destructed.\n");
    }
  }
  function __toString()
  {
    $pattern = array('# ([0-9]{3}[, ])#', '# ([0-9]{2}[, ])#', '# ([0-9][, ])#');
    $replace = array(' $1', '  $1', '   $1');
    $ret = preg_replace($pattern, $replace, "Color( red: " . $this->red . ", green: " . $this->green . ", blue: " . $this->blue . " )");
    return $ret;
  }
  static function doc()
  {
    return (file_get_contents("Color.doc.txt"));
  }
  public function add(Color $instance)
  {
    return new Color(array('red' => $this->red + $instance->red, 'green' => $this->green + $instance->green, 'blue' => $this->blue + $instance->blue));
  }
  public function sub(Color $instance)
  {
    return new Color(array('red' => $this->red - $instance->red, 'green' => $this->green - $instance->green, 'blue' => $this->blue - $instance->blue));
  }
  public function mult($fact)
  {
    return new Color(array('red' => $this->red * $fact, 'green' => $this->green * $fact, 'blue' => $this->blue * $fact));
  }
}
?>
