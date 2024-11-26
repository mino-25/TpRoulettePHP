<?php

namespace Models;

class Autoloader{

  public static function register(){
    spl_autoload_register(array(__CLASS__, "autoload"));
  }

  public static function autoload($class){
    if(strpos($class,__NAMESPACE__."\\") === 0){
      $class = str_replace(__NAMESPACE__."\\", "", $class);
      require_once ROOT."/models/$class.php";
    }
  }

}