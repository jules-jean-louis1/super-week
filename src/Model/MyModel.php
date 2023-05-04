<?php

namespace App\Model;

use App\Model\Database;
class MyModel extends Database
{
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