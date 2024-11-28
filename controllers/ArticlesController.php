<?php

namespace Controllers;

use Models\Article;

class ArticlesController{

  private static $globalTemplatePath = ROOT."/templates/global.php";

  public static function index(){
    self::getList();
  }

  public static function getList(){
    $articlesList = Article::getList();
    require_once ROOT."/views/articles_list.php";
    require_once self::$globalTemplatePath;
  }

  public static function getById(int $id){
    $article = Article::getById($id);
    
    require_once self::$globalTemplatePath;
  }

}