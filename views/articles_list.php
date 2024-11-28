<?php
  $headTitle = "Liste des articles";

  if(!isset($articlesList) || !$articlesList){
    $mainContent = "Erreur 404";
    exit;
  }

  ob_start();
?>

<section>
  <h1>Liste des articles</h1>
  <?php foreach($articlesList as $article): ?>
    <article>
      <h2><?= $article->title ?> - Par <?= $article->author ?></h2>
      <p>
        <?= $article->content ?>
      </p>
    </article>
  <?php endforeach; ?>
</section>

<?php 
$mainContent = ob_get_clean();