<?php

namespace App\Model;

use App\Model\Database;
class MyModel extends Database
{
    public function findOneById($id)
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('SELECT * FROM user WHERE id = :id');
        $req->bindParam(':id', $id);
        $req->execute();
        $user = $req->fetch(\PDO::FETCH_ASSOC);
        return $user;
    }
    public function verifyEmail($email)
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('SELECT * FROM user WHERE email = :email');
        $req->bindParam(':email', $email);
        $req->execute();
        $users = $req->fetchAll(\PDO::FETCH_ASSOC);
        if (count($users) > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function register($email, $fName, $lName, $password)
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('INSERT INTO user (email, first_name, last_name, password) VALUES (:email, :first_name, :last_name, :password)');
        $password = password_hash($password, PASSWORD_DEFAULT);
        $req->execute([
            ':email' => $email,
            ':first_name' => $fName,
            ':last_name' => $lName,
            ':password' => $password
        ]);
    }
    public function login(string $email, string $password)
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('SELECT * FROM user WHERE email = :email');
        $req->execute([
            ':email' => $email
        ]);
        $user = $req->fetch(\PDO::FETCH_ASSOC);
        if ($user === false) {
            return false;
        } else {
            if (password_verify($password, $user['password'])) {
                return $user;
            } else {
                return false;
            }
        }
    }
    public function addBook(string $title, string $description, int $userId)
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('INSERT INTO book (title, content, id_user) VALUES (:title, :content, :id_user)');
        $req->execute([
            ':title' => $title,
            ':content' => $description,
            ':id_user' => $userId
        ]);
    }
}