<?php

namespace App\Controller;
use App\Model\MyModel;
class UserController
{
    public function getInfoById($id)
    {
        $userModel = new MyModel();
        $user = $userModel->findOneById($id);
        return $user;
    }
}