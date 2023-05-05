<?php

namespace App\Model;

class BooksModel extends AbstractModel
{
    protected string $table = "SELECT `book`.id, `book`.title, `book`.content , `user`.first_name, `user`.last_name FROM `book`
                                    INNER JOIN `user` ON `user`.`id` = book.id_user";
    protected int $id;
    protected string $requestById = "SELECT `book`.id, `book`.title, `book`.content , `user`.first_name, `user`.last_name FROM `book`
                                    INNER JOIN `user` ON `user`.`id` = book.id_user WHERE `book`.`id` = :id";
    public function __construct()
    {
        parent::__construct();
    }
    public function findAll()
    {
        return parent::findAll();
    }
    public function getInfoById($id)
    {
        return parent::findOneById($id, $this->requestById);
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