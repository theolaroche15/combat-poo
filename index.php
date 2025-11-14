<?php
include_once __DIR__ . '/config/autoload.php';
require_once __DIR__ . '/config/db.php';

$heroesManager = new HeroesManager($db);
$heroes = $heroesManager->findAllAlive();
// Est-ce que POST['name'] existe
if (isset($_POST['name'])) {
  // Si oui, créer un HeroesManager avec la db

  // Appeler la methode add() du manager avec un Hero en argument
  $hero = new Hero($_POST['name']);
  $heroesManager->add($hero);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jeu de combat</title>
</head>
<body>
  <form method="post">
    <input type="text" name="name" id="name">
        Nom de votre personnage
    </input>
  </form>

  <?php

  if (count($heroes) > 0) {
    ?>

    <h1>Heros disponibles :</h1>

    <div>
      <?php foreach ($heroes as $hero) { ?>

        <p><?= $hero->getName() ?></p>
        <p><?= $hero->getHealthPoints() ?></p>

        <form action="fight.php" method="post">
          <input type="hidden" name="heroid" value="<?= $hero->getId() ?>">
          <button type="submit">Choisir</button>
        </form>

      <?php } ?>
    </div>

    <?php
  }

  ?>
</body>
</html>