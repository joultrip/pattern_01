<?php

class Func 
{
  public static function view($page, $model='', $model2=[], $model3=[], $model4=[])
  {
    require_once 'views/layout.php';
  }



  public static function  show($stuff)
  {
    echo '<pre>';
    print_r($stuff);
    echo '</pre>';

  }

}