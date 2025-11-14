<?php
declare(strict_types=1);

try {
    $db = new PDO('mysql:host=localhost;dbname=livecode_combat_poo', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}
