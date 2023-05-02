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
    public function register($email, $fName, $lName, $password)
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('INSERT INTO user (email, first_name, last_name, password) VALUES (:email, :first_name, :last_name, :password)');
        $req->execute(array(
            'email' => $email,
            'first_name' => $fName,
            'last_name' => $lName,
            'password' => $password
        ));
    }
}