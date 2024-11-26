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

require_once "./utils/Defines.php";

$article = new Article(BDD::connect());

$article_test = [
  "title" => "Test",
  "content" => "Contenu de test",
  "author" => "webdevoo"
];

/**
 * Utilisation classique de la méthode add(), de la classe Article
 */
$article->add(
  $article_test["title"],
  $article_test["content"],
  $article_test["author"],
);