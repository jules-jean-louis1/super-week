<?php

namespace App\Model;
use App\Model\Database;
class BooksModel extends Database
{
    public function findAll()
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('SELECT `book`.id, `book`.title, `book`.content , `user`.first_name, `user`.last_name FROM `book`
                                    INNER JOIN `user` ON `user`.`id` = book.id_user');
        $req->execute();
        $books = $req->fetchAll(\PDO::FETCH_ASSOC);
        return $books;
    }
    public function getInfoById($id)
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('SELECT `book`.id, `book`.title, `book`.content , `user`.first_name, `user`.last_name FROM `book`
                                    INNER JOIN `user` ON `user`.`id` = book.id_user WHERE `book`.`id` = :id');
        $req->execute(['id' => $id]);
        $book = $req->fetch(\PDO::FETCH_ASSOC);
        return $book;
    }
}