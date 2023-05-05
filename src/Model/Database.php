<?php

namespace App\Model;

use PDO;

class Database
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

    /**
     * Method for BDD
     * @return PDO
     */
    public function getBdd()
    {
        return $this->bdd;
    }
}
