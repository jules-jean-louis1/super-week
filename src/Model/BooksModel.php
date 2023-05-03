<?php

namespace App\Model;
use App\Model\Database;
class BooksModel extends Database
{
    public function findAll()
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('SELECT * FROM books');
        $req->execute();
        $books = $req->fetchAll(\PDO::FETCH_ASSOC);
        return $books;
    }
}