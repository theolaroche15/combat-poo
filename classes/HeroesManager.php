<?php

class HeroesManager {
  private $db;

  function __construct($db) {
    $this->db = $db;
  }

  function add(Hero $hero)
  {
    $stmt = $this->db->prepare('INSERT INTO heroes (health_point, name) VALUES (:health_point, :name)');
    $stmt->execute([
      'health_point'=>$hero->getHealthPoints(),
      'name'=>$hero->getName(),
    ]);
    $id = $this->db->lastInsertId();
    $hero->setId($id);
  }

  // Récupérer tous les heros vivants
  function findAllAlive()
  {
    // Requete SQL pour récup les héros dont les points de vie sont superieurs à 0
    $stmt = $this->db->query('SELECT * FROM heroes WHERE health_point > 0');

    // Execution de la requete et récupération des données dans $data
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Créer un tableau vide qui contiendra tous les objets Hero instanciés
    $heroes = [];

    // Faire une boucle sur $data : chaque élément dans $data sera appelé $heroData
    // $heroData contient les données de chaque colonne sous forme de tableau associatif de chaque héro
    foreach ($data as $heroData)
    {
      // Pour chaque élément dans $data, instancier un Hero (créer un nouvel objet correspondant a une classe)
      // avec les données de cet élément
      $hero = new Hero($heroData['name'], $heroData['health_point']);

      // Ajouter l'ID du héros récupéré
      $hero->setId($heroData['id']);

      // Ajouter l'objet Hero instancié dans $heroes
      array_push($heroes, $hero);
    }

    // Retourner le tableau de heros
    return $heroes;
  }
  function find($id)
  {
    $stmt = $this->db->prepare('SELECT * FROM heroes WHERE id = ?');
    $stmt->execute([$id]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($data) 
    {
      return null;
    }
    return new Hero($data['name'], $data['health_point']);
  }
}