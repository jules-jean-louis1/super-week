<?php

namespace App\Controller;
use App\Model\MyModel;
class MyController
{
    public function List()
    {
        $userModel = new MyModel();
        $users = $userModel->findAll();
        echo json_encode($users);
    }
}