<?php

namespace App\Model;

use PDO;

abstract class AbstractDatabase implements DatabaseInterface
{
    private $bdd;

    public function __construct()
    {
        // Connexion a la base de données LOCAL
        try {
            $this->bdd = new PDO('mysql:host=localhost;dbname=super-week;charset=utf8', 'root', '');
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
            exit;
        }
    }

    /*public function __construct()
    {
        // Connexion a la base de données Plesk
        try {
            $this->bdd = new PDO('mysql:host=localhost;dbname=jules-jean-louis_super-week;charset=utf8', 'super-week', 'yXl7j9@60');
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
            exit;
        }
    }*/

    public function getBdd(): PDO
    {
        return $this->bdd;
    }
}
