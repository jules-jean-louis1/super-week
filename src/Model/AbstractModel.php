<?php

namespace App\Model;

abstract class AbstractModel extends AbstractDatabase
{
    protected string $table;
    protected int $id;
    protected string $requestById;
    public function __construct()
    {
        parent::__construct();
    }
    public function findAll()
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare($this->table);
        $req->execute();
        $users = $req->fetchAll(\PDO::FETCH_ASSOC);
        return $users;
    }
    public function findOneById(int $id)
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare($this->requestById);
        $req->bindParam(':id', $id);
        $req->execute();
        $user = $req->fetch(\PDO::FETCH_ASSOC);
        return $user;
    }
}