<?php

class Hero {
  private $id = null;
  private $name;
  private $healthPoints;

  function __construct($name, $healthPoints = 100)
  {
    $this->setName($name);
    $this->setHealthPoints($healthPoints);
  }

  function getId()
  {
    return $this->id;
  }

  function setId($id)
  {
    $this->id = $id;
  }

  function getName()
  {
    return $this->name;
  }

  function setName($name)
  {
    $this->name = $name;
  }

  function getHealthPoints()
  {
    return $this->healthPoints;
  }

  function setHealthPoints($healthPoints)
  {
    $this->healthPoints = $healthPoints;
  }

  function hit()
  {

  }
}

$hero = new Hero('Arthur', 'Renaud');