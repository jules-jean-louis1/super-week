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
    public function AuthContoller()
    {
        $userModel = new MyModel();
        $users = $userModel->register($email, $fName, $lName, $password, $confirmPassword);
    }
}