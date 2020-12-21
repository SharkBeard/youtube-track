<?php
namespace App\Operations;

class Operation
{
  protected $args;

  public static function run()
  {
    return (new static(func_get_args()))->process();
  }

  public function __construct($args)
  {
    $this->args = $args;
    foreach ($args[0] as $key => $value)
      $this->{$key} = $value;
  }
}
