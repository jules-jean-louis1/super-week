<?php

namespace App\Model;

use App\Model\Database;
class MyModel extends Database
{
    public function findAll()
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('SELECT * FROM user');
        $req->execute();
        $users = $req->fetchAll(\PDO::FETCH_ASSOC);
        return $users;
    }
}