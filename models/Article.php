<?php

namespace Models;

class Article{

  // Les mots clés d'accès sont : public, protected et private.
  protected int $id;
  protected string $title;
  protected string $content;
  protected string $author;
  protected string $created_date;
  protected string $modification_date;

  private static $bdd;

  public function __construct($bdd = null){

    if(!is_null($bdd)){
      self::setBdd($bdd);
    }
    
  }

  /**
   * Accesseur = Getter
   * Mutateur = Setter
   */
  public static function getId(): int{
    return self::$id;
  }

  public static function setId(int $id): void{
    self::$id = $id;
  }
  
  public static function getTitle(): string{
    return self::$title;
  }
  
  public static function setTitle(string $title): void{
    self::$title = $title;
  }
  
  public static function getContent(): string{
    return self::$content;
  }
  
  public static function setContent(string $content): void{
    self::$content = $content;
  }
  
  public static function getAuthor(): string{
    return self::$author;
  }
  
  public static function setAuthor(string $author): void{
    self::$author = $author;
  }
  
  public static function getCreatedDate(): \Datetime{
    $date = new \Datetime(self::$created_date);
    return $date;
  }
  
  public static function setCreatedDate(string $created_date): void{
    self::$created_date = $created_date;
  }
  
  public static function getModificationDate(): \Datetime{
    $date = new \Datetime(self::$modification_date);
    return $date;
  }
  
  public static function setModificationDate(string $modification_date): void{
    self::$modification_date = $modification_date;
  }

  public static function add(
    string $title,
    string $content,
    string $author
  ){

    try{

      $req = self::$bdd->prepare("INSERT INTO articles(title, content, author) VALUES(:title, :content, :author)");
      $req->bindValue(":title", $title, \PDO::PARAM_STR);
      $req->bindValue(":content", $content, \PDO::PARAM_STR);
      $req->bindValue(":author", $author, \PDO::PARAM_STR);

      if(!$req->execute()){
        Utils::launchException("Une erreur s'est produite lors de l'ajout d'un article.");
      }

    }catch(\Exception $e){
      Utils::readException($e);
    }

  }

  //Créer les méthodes BDD
  public static function setBdd($bdd){
    self::$bdd = $bdd;
  }
}