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
    public function register($email, $fName, $lName, $password, $confirmPassword)
    {
        $bdd = $this->getBdd();
        $req1 = $bdd->prepare('SELECT * FROM user WHERE email = :email');
        $req1->execute(array(
            'email' => $email
        ));
        $user = $req1->fetch();
        if ($user) {
            return false;
        } else {
            if ($password == $confirmPassword) {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $req2 = $bdd->prepare('INSERT INTO user (email, fName, lName, password) VALUES (:email, :fName, :lName, :password)');
                $req2->execute(array(
                    'email' => $email,
                    'fName' => $fName,
                    'lName' => $lName,
                    'password' => $password
                ));
                return true;
            } else {
                return false;
            }
        }
    }
}