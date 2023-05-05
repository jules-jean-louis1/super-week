<?php

namespace App\Model;

interface ModelInterface
{
    public function findAll();
    public function findOneById(int $id);
}