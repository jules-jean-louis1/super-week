<?php

namespace App\Model;
use App\Model\Database;
class UserModel extends Database
{
    public function findAll()
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('SELECT * FROM user');
        $req->execute();
        $users = $req->fetchAll(\PDO::FETCH_ASSOC);
        return $users;
    }
    public function findOneById($id)
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('SELECT * FROM user WHERE id = :id');
        $req->bindParam(':id', $id);
        $req->execute();
        $user = $req->fetch(\PDO::FETCH_ASSOC);
        return $user;
    }
}