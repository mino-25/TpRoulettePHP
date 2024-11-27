<?php

// PROJET FIL ROUGE : Blog - Thème voyage - Sous-catégories : Culinaire / Art / Actus Sportives + Possibilité de reviews - Si possible, devis voyage.
/**
 * Galerie photo / formulaire via lien externes ?
 * Culinaire
 * Actus sportive
 * Voyage
 * Art
 * Reviews
 * Création de devis
 */

ini_set("date.timezone", "Europe/Paris");
require_once "./utils/Defines.php";
require_once "./models/Autoloader.php";
use Models\Autoloader;

/**
 * Use autoloader to import all models
 */
Autoloader::register();

use Models\BDD;
use Models\Router;
use Models\Article;
use Controllers\ArticlesController;

$article = new Article(BDD::connect());

$article_test = [
  "title" => "Test",
  "content" => "Contenu de test",
  "author" => "webdevoo"
];

/**
 * Utilisation classique de la méthode add(), de la classe Article
 */
// $article->add(
//   $article_test["title"],
//   $article_test["content"],
//   $article_test["author"],
// );

// var_dump($article::getList());
// echo "<hr/>";
// var_dump($article::getById(1));

// $article_updated = [
//   "id" => 1,
//   "title" => "Test modifié",
//   "content" => "Contenu modifié",
//   "author" => "WebdevooUpdated",
//   "created_date" => new \Datetime("now")
// ];

// $article::update(
//   $article_updated["id"],
//   $article_updated["title"],
//   $article_updated["content"],
//   $article_updated["author"],
//   $article_updated["created_date"]->sub(\DateInterval::createFromDateString("1 hour"))->format("Y/m/d H:i:s"),
// );

$router = new Router();

$uri = $_SERVER["REQUEST_URI"];

switch (true) {
  case ($uri === "/"):
    $router->get("/", function () {
      echo "Page d'accueil";
    });
    break;
  case ($uri === "/articles"):
    $router->get("/articles", ArticlesController::getList());
    break;
  case (preg_match("/^\/articles\/(\d+)$/", $uri )):
    $router->get($uri, function (int $id) {
      if (!is_null($id)) {
        var_dump(Article::getById($id));
      }
    });
    break;
    default:
      echo "404";
      break;
}

$router->run();
